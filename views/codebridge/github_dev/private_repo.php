<?php
if (!isset($_GET['token'])) {
    die("Access token not provided.");
}

$access_token = $_GET['token'];
$repo_owner = 'lokeshwardeb'; // Replace with the owner of the private repo
// $repo_name = 'testing_checking_github_dev'; // Replace with the name of the private repo
$repo_name = 'nexgenproject_2.0'; // Replace with the name of the private repo
// $repo_name = 'lokeshwarfashionhouse'; // Replace with the name of the private repo
// $repo_owner = 'your-repo-owner'; // Replace with the owner of the private repo
// $repo_name = 'your-private-repo'; // Replace with the name of the private repo

// Check repository access
$ch = curl_init("https://api.github.com/repos/$repo_owner/$repo_name");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "User-Agent: testing_o_auth"
    // "User-Agent: Your-App-Name"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$repo = json_decode($response, true);

if (isset($repo['private']) && $repo['private'] === true) {
    // Generate GitHub.dev link
    $github_dev_link = "https://github.dev/$repo_owner/$repo_name";
    echo "<h1>GitHub.dev Link</h1>";
    echo "<a href='$github_dev_link' target='_blank'>Open in GitHub.dev</a>";
} else {
    echo "You do not have access to this repository.";
}
?>
