<?php

// initializing the uri of the path 
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$Routes = [

    '/' => __DIR__ . '/views/pages/dashboard.views.php',
    '/login' => __DIR__ . '/views/pages/login.views.php',
    '/signup' => __DIR__ . '/views/pages/signup.views.php',
    '/dashboard' => __DIR__ . '/views/pages/dashboard.views.php',
    '/projects' => __DIR__ . '/views/pages/projects.views.php',
    '/logout' => __DIR__ . '/views/pages/logout.views.php',


];

if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    // that means the url is not exists and it should return on the error page
    require __DIR__ . '/views/pages/error.views.php';
}


?>