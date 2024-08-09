<?php
session_start();

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';

$controllers = new controllers;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nexGenProjects || <?php echo $active_name ?></title>

    <!-- favicon files -->
    <link rel="shortcut icon" href="/assets/img/nexGenProject_logo.jpeg" type="image/x-icon">

    <!-- bootstrap css files -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- owl carosel css files -->
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">

    <!-- sweetalert js files -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="/assets/js/alert.js"></script>

    
    <!-- font awesome css files -->
    <link rel="stylesheet" href="/assets/css/all.min.css">
    
    <!-- font awesome js files -->
    <script src="/assets/js/all.min.js"></script>

    <!-- fonts css files -->
    <link rel="stylesheet" href="/assets/css/fonts.css">

    <!-- custom css files -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/utilities.css">
    <link rel="stylesheet" href="/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/css/dashboard.css">

    

</head>
<body>
 