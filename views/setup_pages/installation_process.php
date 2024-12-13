<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "Dashboard";

// echo '

// <style>
// body{

// }
// </style>

// ';
if(file_exists(__DIR__ . "/../../config/conn.php")){
    echo '
    <script>
    location.href="/dashboard";
    </script>
    
    
    ';
}


require __DIR__ . '/../setup_pages/inc/_header_setup.php';

require __DIR__ . '/../setup_pages/functions/setup_controllers.php';

$setup_controllers = new setup_controllers;

$setup_controllers->save_server_configuration();




// $controllers->login_check();

?>

<style>
    body {
        background-color: var(--cus-main-section-bg-color) !important;
    }
</style>


<main>

    <div class="main_section">
        <div class="container">
            <div class="main_content p-4 bg-light mt-4">
                <div class="welcome_installatino_process text-center">
                    <div class="project_name d-flex">
                        <img  src="/assets/img/Logo.png" width="250px" class="img-fluid m-auto" alt="">
                    </div>
                    <div class="project_desc mt-4">
                        <div class="project_name_main fs-4">
                            NexGenProject
                        </div>
                        <div class="project_desc mt-2 fs-5">
                            Empowering teams, Elevating Projects
                        </div>
                        <div class="project_info mt-3 fs-6">
                            <div class="software_version">
                                <div class="soft_ver_title">Software Version : 2.0.0</div>
                            </div>
                            <div class="software_developed_by mt-4 pt-4">
                                <div class="soft_ver_title">Software Developed By : <a href="">Lokeshwar Deb Protik</a> </div>
                            </div>
                        </div>

                        <div class="project_content mt-4 mb-4">
                           <div class="software_install mt-4 pt-4">
                           <form action="/setup" method="post">
                           <div class="desc">
                                <button type="submit" name="install" class="btn btn-primary">Install</button>
                            </div>
                           </form>
                           </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</main>

<?php

require_once __DIR__ . '/../pages/inc/_footer.php';

require_once __DIR__ . '/../pages/inc/_footer_scripts.php';

?>