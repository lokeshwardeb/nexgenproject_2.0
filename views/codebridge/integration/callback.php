<?php
// GitHub OAuth configuration
// $client_id = 'YOUR_CLIENT_ID'; // Replace with your GitHub OAuth App's Client ID
// // $client_secret = 'YOUR_CLIENT_SECRET'; // Replace with your GitHub OAuth App's Client Secret
// $client_id = 'Ov23liStIlYecXq37qKz'; // Replace with your GitHub OAuth App's Client ID
// $client_secret = '893b17a9f9a520bbe872f47884550b802f6c17b8'; // Replace with your GitHub OAuth App's Client Secret

// require_once __DIR__ . '/../../pages/inc/_header.php';
// require_once '/views/pages/inc/_header.php';

$active_name  = "Codebridge";

require_once './views/pages/inc/_header.php';



$get_call_back_project_id = $controllers->pure_data($_GET['project_id']);

// exit;




$client_id = 'Ov23liBSEb1ZEuPKOmS5'; 
$client_secret = '491701b400ea67b95197231976f56bd9e66880b4'; 



if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Exchange code for access token
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://github.com/login/oauth/access_token");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $code
    ]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // echo '<pre>';
    // echo $response;
    // echo '</pre>';

    // exit;

    $data = json_decode($response, true);
    if (isset($data['access_token'])) {
        $access_token = $data['access_token'];

        // Redirect to private_repo.php with the token
        // header("Location: private_repo.php?token=$access_token");
        // header("Location: private_repo?token=$access_token&project_id=$get_call_back_project_id");
        header("Location: private_repo?token=$access_token&project_id=$get_call_back_project_id");
        exit();
    } else {
        echo "Error: Unable to retrieve access token.";
    }
} else {
    echo "Error: Authorization code not found.";
}
