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

// require __DIR__ . '/../pages/inc/_header.php';
// require __DIR__ . '/../pages/inc/_login_signup_header.php';

require __DIR__ . '/../setup_pages/inc/_header_setup.php';

require __DIR__ . '/../setup_pages/functions/setup_controllers.php';

// if(file_exists(__DIR__ . "/../../config/conn.php")){
//     echo '
//     <script>
//     location.href="/dashboard";
//     </script>
    
    
//     ';
// }

// require __DIR__ . '/../pages/inc/_header.php';
// require __DIR__ . '/../setup_pages/functions/setup_controllers.php';

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
                <?php

                // if(isset($_POST['searchdata']) && $result['emp_gender'] == 'Male')

                if(isset($_POST['install']) || isset($_GET['step'])){
                    // install button was clicked
                    if (isset($_GET['step'])) {
                        $get_step = htmlspecialchars($_GET['step']);
    
                        if (isset($_POST['install']) || isset($_POST['start_setup']) && $get_step == 1) {
                            
                            require __DIR__ . '/inc/setup_1.php';
    
                        }else{
                            // that means it is not set the start_setup post request
                            echo '
                            <script>
                            location.href="/setup";
                            </script>
                            ';
                        }
    
                    } else {
                        require __DIR__ . '/inc/setup_welcome.php';
                    }
                }else{
                    // that means the install button was not clicked
                    echo '
                    <script>
                    location.href="/installation"
                    </script>
                    ';
                }





                ?>
            </div>
        </div>
    </div>


</main>

<?php

require_once __DIR__ . '/../pages/inc/_footer.php';

require_once __DIR__ . '/../pages/inc/_footer_scripts.php';

?>