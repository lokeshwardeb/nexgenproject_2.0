<?php


// require_once __DIR__ . '../../pages/inc/_header.php';
require_once './views/pages/inc/_header.php';



if (!isset($_GET['token'])) {
    die("Access token not provided.");
}
if (!isset($_GET['project_id'])) {
    die("Project Id not provided.");
}


$get_project_id = $controllers->pure_data($_GET['project_id']);

$get_repo_name = '';



$result_check_project_github_repo = $controllers->get_all_data("projects", " `project_id` = '$get_project_id' ");

if($result_check_project_github_repo){
    if($result_check_project_github_repo->num_rows > 0){
        // that means the project exists to the software
        while($project_github_repo_row = $result_check_project_github_repo->fetch_assoc()){
            $get_repo_name = $project_github_repo_row['project_github_repo_name'];
        }
    }
}




$access_token = $_GET['token'];
$repo_owner = 'lokeshwardeb'; 
$repo_name = $get_repo_name; 



// $repo_owner = 'lokeshwardeb'; // Replace with the owner of the private repo
// // $repo_name = 'testing_checking_github_dev'; // Replace with the name of the private repo
// $repo_name = 'nexgenproject_2.0'; // Replace with the name of the private repo
// $repo_name = 'lokeshwarfashionhouse'; // Replace with the name of the private repo
// $repo_owner = 'your-repo-owner'; // Replace with the owner of the private repo
// $repo_name = 'your-private-repo'; // Replace with the name of the private repo

// Check repository access
$ch = curl_init("https://api.github.com/repos/$repo_owner/$repo_name");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "User-Agent: NexGenProject"
    // "User-Agent: testing_o_auth"
    // "User-Agent: Your-App-Name"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$repo = json_decode($response, true);


    // echo '<pre>';
    // echo $response;
    // echo '</pre>';

    // exit;

if (isset($repo['private']) && $repo['private'] === true) {
    // Generate GitHub.dev link
    $github_dev_link = "https://github.dev/$repo_owner/$repo_name";

    echo '
    <script>
        window.location.href="'. $github_dev_link .'";
    </script>
    ';

    // echo "<h1>GitHub.dev Link</h1>";
    // echo "<a href='$github_dev_link' target='_blank'>Open in GitHub.dev</a>";
} else {
    echo "You do not have access to this repository.";
}
?>
