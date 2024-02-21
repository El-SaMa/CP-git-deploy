<?php

// Secret for validating the webhook
$secret = "your_webhook_secret_here";

// GitHub delivers a hash signature with each payload
$signature = $_SERVER['HTTP_X_HUB_SIGNATURE'] ?? '';

if ($signature) {
    $hash = "sha1=" . hash_hmac('sha1', file_get_contents("php://input"), $secret);
    if (hash_equals($signature, $hash)) {
        // Trigger the update script
        shell_exec('php /path/to/git-auto-updater.php');
        echo "Update triggered";
    } else {
        // Log or handle the invalid signature case
        http_response_code(403);
        echo "Invalid signature";
    }
} else {
    // No signature provided with the request
    http_response_code(401);
    echo "No signature provided";
}
