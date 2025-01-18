<?php
// GitHub OAuth configuration
// $client_id = 'YOUR_CLIENT_ID'; // Replace with your GitHub OAuth App's Client ID
// $client_id = 'Ov23liStIlYecXq37qKz'; // Replace with your GitHub OAuth App's Client ID
// $redirect_url = 'http://localhost:8080/callback.php'; // Your Callback URL
// $redirect_url = 'http://localhost:8000/callback.php'; // Your Callback URL
// $redirect_url = 'http://localhost:8000/callback'; // Your Callback URL
// $redirect_url = '/callback.php'; // Your Callback URL
// $redirect_url = 'http://localhost/callback.php'; // Your Callback URL




require_once './views/pages/inc/_header.php';


if (!isset($_GET['project_id'])) {
    die("Project Id not provided.");
}


$get_project_id = $controllers->pure_data($_GET['project_id']);


$result_check_project_github_repo = $controllers->get_all_data("projects", " `project_id` = '$get_project_id' ");

if($result_check_project_github_repo){
    if($result_check_project_github_repo->num_rows > 0){
        // that means the project exists to the software
        while($project_github_repo_row = $result_check_project_github_repo->fetch_assoc()){
            $get_repo_name = $project_github_repo_row['project_github_repo_name'];
        }
    }
}






$client_id = "Ov23liBSEb1ZEuPKOmS5";

$redirect_url = 'http://localhost:8000/callback?project_id=' . $get_project_id; // Your Callback URL




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitHub.dev Access</title>
</head>
<body>
    <!-- <h1>GitHub.dev Private Repository Access</h1> -->
    <h1>Enter CodeBridge Project Private Repository </h1>
    <a href="https://github.com/login/oauth/authorize?client_id=<?= $client_id ?>&scope=repo&redirect_uri=<?= $redirect_url ?>">
        <button class="btn btn-dark mt-4" >Login with GitHub</button>
    </a>
</body>
</html>
