<?php
// GitHub OAuth configuration
// $client_id = 'YOUR_CLIENT_ID'; // Replace with your GitHub OAuth App's Client ID
$client_id = 'Ov23liStIlYecXq37qKz'; // Replace with your GitHub OAuth App's Client ID
$redirect_url = 'http://localhost:8080/callback.php'; // Your Callback URL
// $redirect_url = 'http://localhost/callback.php'; // Your Callback URL
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitHub.dev Access</title>
</head>
<body>
    <h1>GitHub.dev Private Repository Access</h1>
    <a href="https://github.com/login/oauth/authorize?client_id=<?= $client_id ?>&scope=repo&redirect_uri=<?= $redirect_url ?>">
        <button>Login with GitHub</button>
    </a>
</body>
</html>
