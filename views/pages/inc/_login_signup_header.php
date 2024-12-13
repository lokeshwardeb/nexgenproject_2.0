<?php
session_start();

if(!file_exists(__DIR__ . "/../../../config/conn.php")){
  echo '
  <script>
  location.href="/installation";
  </script>
  ';
  exit;
}

// if (file_exists("/config/conn.php")) {
//   require_once __DIR__ . '/../../../config/conn.php';
//   require_once __DIR__ . '/../../../models/models.php';
//   require_once __DIR__ . '/../../../controllers/controllers.php';

//   $controllers = new controllers;

// }

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';

$controllers = new controllers;


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>nexGenProjects </title>
  <link rel="shortcut icon" href="/assets/img/nexGenProject_logo.jpeg" type="image/x-icon">

  <!-- <title>Double Slider Sign in/up Form</title> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <!-- <link rel="stylesheet" href="./style.css"> -->

  <link rel="stylesheet" href="/assets/css/login.css">

  <!-- <link rel="stylesheet" href="/assets/css/bootstrap.min.css"> -->


  <!-- custom js files -->
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
  <script src="/assets/js/sweet_alert_js_2.js"></script>
  <script src="/assets/js/alert.js"></script>

</head>

<body>