<?php

// initializing the uri of the path 
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$Routes = [

    '/' => __DIR__ . '/views/pages/dashboard.views.php',
    '/login' => __DIR__ . '/views/pages/login.views.php',
    '/signup' => __DIR__ . '/views/pages/signup.views.php',
    '/dashboard' => __DIR__ . '/views/pages/dashboard.views.php',
    '/projects' => __DIR__ . '/views/pages/projects.views.php',
    '/all_projects' => __DIR__ . '/views/pages/all_projects.views.php',
    '/create_new_project' => __DIR__ . '/views/pages/create_new_project.views.php',
    '/projects_hub' => __DIR__ . '/views/pages/projects_hub.views.php',
    '/projects_file_repository' => __DIR__ . '/views/pages/projects_files_repository.views.php',
    '/logout' => __DIR__ . '/views/pages/logout.views.php',


];

if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    // that means the url is not exists and it should return on the error page
    require __DIR__ . '/views/pages/error.views.php';
}


?>