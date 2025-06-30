<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "Meetings";
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

                    require __DIR__ . '/inc/_sidebar.php';

                    ?>
                </div>

                <div class="integrate_mobile_sidebar">
                    <?php

                    include __DIR__ . '/inc/_mobile_sidebar.php';

                    ?>
                </div>

            </div>
            <div class="col-md-9 cus_bg_main_section_color">
                <div class="main_content_section scrollbar_container">

                    <div class="the_running_main_content montserrat_font">

                        <div class="details_container">

                            <div class="details_container_info">


                                <div class="main_content_navbar">
                                    <?php

                                    require_once __DIR__ . '/inc/_main_content_navbar.php';

                                    ?>
                                </div>


                                <div class="container">
                                    <div class="title_section">
                                        <div class="section_title fs-4 text-center mt-4 inter-font">
                                            Meetings
                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section mt-4">
                                    <div class="container m-4 pt-4  pe-5">
                                        <div class="meetings_main_section">
                                            <div class="meetings_content">
                                                <div class="container">
                                                    <div class="meetings_title fs-3 border-bottom border-dark  pb-2 inter-font">
                                                        Connect, collaborate and <br /> celebrate with team from anywhere
                                                    </div>

                                                    <div class="meeting_btn_section">
                                                        <div class="container mt-4 pt-4 ms-4 ps-4">
                                                            <form action="" method="post">
                                                                <!--
                                                                     we are commenting out this feature, because we are not using this feature right now.
                                                                     Cause the daily.co needs the payment to use the service.
                                                                     So we are not using this feature right now.
                                                                     Because we are not ready to pay for the service right now.
                                                                     So we are commenting out this feature right now.

                                                                     Wheareas, we are using the agora.io for the meeting service.
                                                                     and we are implementing the agora.io service in the meeting_hub.views.php file.
                                                                     so that we can use the agora.io service for the meeting service.
                                                                     and continue the meeting service using the agora.io service.
                                                                 
                                                                -->
                                                                <!-- <div class="row">
                                                                    <div class="col-md-6 col-sm-12">

                                                                        <?php

                                                                        $result_get_meeting_status = $controllers->get_all_data("meetings", "`meeting_status` = 'running'");

                                                                        if ($result_get_meeting_status) {
                                                                            if ($result_get_meeting_status->num_rows > 0) {
                                                                                // that means the meeting is running and it should enable the meeting
                                                                                while ($row = $result_get_meeting_status->fetch_assoc()) {
                                                                                    echo '
                                                                        <a  href="/meeting_hub?meeting_code=' . $row['meeting_code'] . '">
                                                                        <button name="join_meeting" type="button" id="join_meeting" class="btn btn-primary">Join meeting</button>
                                                                        </a>
                                                                    ';
                                                                                }
                                                                            } else {
                                                                                echo '
                                                                    <a  href="#">
                                                                    <button name="join_meeting" id="join_meeting" disabled class="btn btn-primary">Join meeting</button>
                                                                    </a>
                                                                    ';
                                                                            }
                                                                        }

                                                                        $controllers->create_new_meeting();


                                                                        ?>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <?php

                                                                        $result_get_meeting_status_new_meeting = $controllers->get_all_data("meetings", "`meeting_status` = 'running'");

                                                                        if ($result_get_meeting_status_new_meeting) {
                                                                            if ($result_get_meeting_status_new_meeting->num_rows > 0) {
                                                                                // that means there a meeting already exists so the new meeting creation is not allowed
                                                                                echo '
                                                                    <button name="new_meeting" disabled class="btn btn-primary">New meeting</button>
                                                                    
                                                                    ';
                                                                            } else {
                                                                                // that means the meeting is not exists on database
                                                                                echo '
                                                                    <button name="new_meeting" class="btn btn-primary">New meeting</button>
                                                                    
                                                                    ';
                                                                            }
                                                                        }





                                                                        ?>

                                                                    </div>
                                                                </div> -->

                                                                <!-- 
                                                                Here we are commenting out the above code and using the below code to create a new meeting and join the existing meeting.
                                                                Because we are using agora.io for the meeting service.
                                                                And we are implementing the agora.io service in the meeting_hub.views.php file.
                                                                
                                                                -->

                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <a href="/meeting_hub">
                                                                            <button name="join_meeting" type="button" id="join_meeting" class="btn btn-primary">Join meeting</button>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <a href="/create_new_meeting">
                                                                            <button name="new_meeting" id="new_meeting" class="btn btn-primary">New meeting</button>
                                                                        </a>
                                                                    </div>




                                                            </form>
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