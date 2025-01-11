<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "Welcome to your inbox";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();
// $controllers->create_new_meeting();
// $controllers->meetings_handler();

?>

<main>
    <div class="dashboard_main_section">
        <div class="row">
            <div class="col-md-3 " style="background-color: white !important;">
                <div class="integrate_desktop_sidebar">
                    <?php

                    require __DIR__ . '/inc/_sidebar_msg.php';
                    // require __DIR__ . '/inc/_sidebar.php';

                    ?>
                </div>

                <div class="integrate_mobile_sidebar">
                    <?php

                    include __DIR__ . '/inc/_mobile_sidebar_msg.php';

                    ?>
                </div>

            </div>
            <div class="col-md-9 cus_bg_main_section_color">
                <div class="main_content_section scrollbar_container">

                    <div class="the_running_main_content montserrat_font">

                        <div class="details_container">

                            <div class="details_container_info">

                                <div class="container">
                                    <div class="title_section">
                                        <div class="section_title fs-4 text-center mt-4 inter-font">
                                            <!-- Message Hub -->
                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section mt-4">
                                    <div class="container m-4 pt-4  pe-5">
                                      <div class="meetings_main_section">
                                        <div class="meetings_content">
                                            <div class="container">
                                                <div class="meetings_title fs-4 justify-content-center d-flex m-auto border-bottom border-dark  pb-3 inter-font">
                                                    NexGenProjects for messages
                                                </div>

                                                <div class="msg_main_section m-4 p-4">
                                                    <div class="section_title text-secondary text-center">
                                                        Send and Receive Messages at one place. 
                                                        <br>
                                                        Send messages and get connected with your team members from anywhere !!
                                                    </div>


                                                    <div class="msg_contents">
                                                        <?php
                                                        if(isset($_GET['msg_user_id'])){
                                                            include __DIR__. '/inc/inbox_msg_inc.php';
                                                            // include __DIR__. '/inc/personal_inbox_messages.views.php';
                                                        }

                                                        ?>
                                                    </div>


                                                    <!-- <iframe src="https://github.dev/lokeshwardeb/lokeshwarfashionhouse" frameborder="0"></iframe> -->
                                                </div>

                                                <!-- <hr class="bg-dark"/> -->

                                            </div>
                                        </div>
                                      </div>
                                    </div>
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