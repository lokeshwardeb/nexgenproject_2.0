<?php
session_start();

// "/config/conn.php"

if (!file_exists(__DIR__ . "/../../../config/conn.php")) {
    echo '
    <script>
    location.href="/installation";
    </script>
    ';
    exit;
}


// if (file_exists("config/conn.php")) {
//     require_once __DIR__ . '/../../../config/conn.php';
//     require_once __DIR__ . '/../../../models/models.php';
//     require_once __DIR__ . '/../../../controllers/controllers.php';



// $controllers = new controllers;

// }

require_once __DIR__ . '/../../../config/conn.php';
require_once __DIR__ . '/../../../models/models.php';
require_once __DIR__ . '/../../../controllers/controllers.php';



$controllers = new controllers;

require './vendor/autoload.php';


// require_once __DIR__ . '/../../../config/conn.php';
// require_once __DIR__ . '/../../../models/models.php';
// require_once __DIR__ . '/../../../controllers/controllers.php';

// require __DIR__ . '/vendor/autoload.php';
// require './vendor/autoload.php';


// $controllers = new controllers;


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
    <link rel="stylesheet" href="/assets/css/messages.css">

    <!-- botpress ai js files -->
    <!-- <script src="https://cdn.botpress.cloud/webchat/v2/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/3175fb81-1692-4bba-9916-12f850a4bda5/webchat/v2/config.js"></script> -->

    <!-- pusher js files -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

    <!-- daily js files -->
    <script crossorigin src="https://unpkg.com/@daily-co/daily-js"></script>

    <!-- meetings js files -->
    <script src="/assets/js/meetings.js"></script>

    <!-- jquery js files -->
    <script src="/assets/js/jquery.js"></script>

    <!-- botpress ai js files -->
    <script src="https://cdn.botpress.cloud/webchat/v2/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/3175fb81-1692-4bba-9916-12f850a4bda5/webchat/v2/config.js"></script>


    <!-- datatable js -->
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <!-- datatable button and features js -->


    <!-- DataTables Buttons extension for export functionality -->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>



    <!-- check whether the replace state exits or not -->
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</head>

<body>