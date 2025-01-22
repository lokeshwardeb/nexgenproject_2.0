<?php

$active_name = "Dashboard";


require __DIR__ . '/inc/_header.php';

// if(!file_exists("/config/conn.php")){
//     echo '
//      <script>
//      location.href="/installation";
//      </script>
//      ';

//      exit;
// }


    $controllers->login_check();



// if(file_exists("/config/conn.php")){
//     $controllers->login_check();
       
// }else{

//     echo '
//     <script>
//     location.href="/installation";
//     </script>
//     ';
// return;


// }

// echo "hi";


// if(file_exists("/config/conn.php")){
//     $active_name = "Dashboard";

// $controllers->login_check();
// }else{
//     // that means the configuration file is not found and it should be setup first
//     echo '
//     <script>
//     location.href="/setup";
//     </script>
//     ';
// }




// require __DIR__ . '/inc/_header.php';





// session_start();
// $_SESSION['username'] = 'jai sri ganesh';


// $active_name = "Dashboard";
// require __DIR__ . '/inc/_header.php';

// $controllers->login_check();

?>

<main>
    <div class="dashboard_main_section">
        <div class="row">
            <div class="col-md-3 " style="background-color: white !important;">
                <div class="integrate_desktop_sidebar">
                    <?php

                    require __DIR__ . '/inc/_sidebar.php';

                    ?>
                </div>

                <div class="integrate_mobile_sidebar">
                    <?php

                    include __DIR__ . '/inc/_mobile_sidebar.php';

                    ?>
                </div>

            </div>
            <div class="col-md-9 cus_bg_main_section_color" >
                <div class="main_content_section scrollbar_container">


                    <div class="the_running_main_content montserrat_font">
                        
                        <div class="details_container align-items-center">
                            <div class="details_container_info align-items-center">
                                <div class="welcome_container">
                                    <h1>Welcome <a href=""><?php echo $_SESSION['username'] ?></a></h1>
                                    <!-- <h1>Welcome <a href="">Mr X</a></h1> -->
                                </div>
                                <div class="status_container">
                                    <h3>Status:</h3>
                                    <p>Current project: <a href="">xyz</a></p>
                                    <p>Your team is working on : <a href="">xyz</a></p>
                                </div>
                                <div class="process_container">
                                    <h3>Process:</h3>
                                    <p>Project complete: <a href="">50%</a></p>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="container d-none">
                        <div class="welcome_section fs-5 mt-4">
                            Welcome again,
                            <div class="welcome_username ms-5 ps-4 text-primary">
                                <?php

                                // echo $_SESSION['email'];
                                
                                echo $_SESSION['username'];

                                ?>
                            </div>
                        </div>

                        <div class="integrate_dashboard_nav">
                            <?php

                            require __DIR__ . '/inc/_dashboard_nav.php';

                            ?>
                        </div>



                        <div class="main_section_contents fs-5">



                            <div class="container">
                                <div class="section_info mt-4 text-center pt-4">
                                    <div class="ongoing_task_section mt-4">
                                        <div class="section_title fs-4">
                                            Here is your ongoing task
                                        </div>
                                        <div class="section_content text-danger mt-2">
                                            Complete the design
                                        </div>
                                    </div>
                                    <div class="ongoing_task_section mt-4">
                                        <div class="section_title fs-4">
                                            Here is your project status
                                        </div>
                                        <div class="section_content text-primary mt-2">
                                            In process
                                        </div>
                                    </div>
                                    <div class="ongoing_task_section mt-4">
                                        <div class="section_title fs-4">
                                            Your team is working on
                                        </div>
                                        <div class="section_content text-danger mt-2">
                                            Complete the design
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

require_once __DIR__ . '/inc/_footer.php';

require_once __DIR__ . '/inc/_footer_scripts.php';

?>