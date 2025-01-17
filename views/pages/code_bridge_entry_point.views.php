<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();
// $controllers->create_new_meeting();
// $controllers->meetings_handler();

$get_project_id = $controllers->pure_data($_GET['project_id']);

if (empty($_GET['project_id']) || !isset($_GET['project_id'])) {
    // that means the project id is not set and it should be redirect to all projects
    echo '
    <script>
        window.location.href="/all_projects";
    </script>
    ';
}

// firstly declare the get_project_name variable with blank value
$get_project_name = "";

$result_get_project_info = $controllers->get_all_data("projects", " `project_id` = '$get_project_id' ");

if ($result_get_project_info) {
    if ($result_get_project_info->num_rows > 0) {
        // that means the project already exists
        while ($row_get_project_info = $result_get_project_info->fetch_assoc()) {
            $get_project_name = $row_get_project_info['project_name'];
        }
    }
}



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

                                <div class="container">
                                    <div class="title_section">
                                        <div class="section_title fs-4 text-center mt-4 inter-font">
                                            CodeBridge Hub
                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section mt-4">
                                    <div class="container m-4 pt-4  pe-5">
                                        <div class="codebridge_integration_main_section mt-4 pt-4">
                                            <div class="codebridge_integration">
                                                <div class="container">
                                                    <div
                                                        class="d-flex m-auto justify-content-center text-center integration_section">
                                                        <div class="nexgenproject_integration">
                                                            <div class="nexgenproject_logo">
                                                                <img height="150px" width="150px" class="img-fluid"
                                                                    src="/assets/img/nexGenProject_logo.jpeg" alt="">
                                                            </div>
                                                            <div
                                                                class=" mt-4 fs-4 lux_roman fw-bold nexgenproject_brand_name">
                                                                NexgenProject
                                                            </div>
                                                        </div>
                                                        <div class="plus_integration">

                                                            <div class="ms-4 me-4 fs-1 pt-5  plus_brand_name">
                                                                +
                                                            </div>
                                                        </div>
                                                        <div class="github_integration">
                                                            <div class="github_logo">
                                                                <img height="150px" width="150px" class="img-fluid"
                                                                    src="/assets/img/github_logo.png" alt="">
                                                            </div>
                                                            <div class=" mt-4 fs-4 lux_roman fw-bold github_brand_name">
                                                                Github
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="info_section mt-4 pt-4">
                                                        <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id; ?>" >
                                                        <div
                                                            class="information_main_section inter-font fw-bold fs-5 text-center ">
                                                            <div class="text-danger">
                                                                Authorizing the CodeBridge with the NexgenProject and
                                                                Github
                                                            </div>

                                                            <div class="wait_Info text-primary mt-4 ">
                                                                Please wait some time
                                                            </div>

                                                            <div
                                                                class=" m-auto justify-content-center reloading_section text-primary mt-4 d-flex m-4 pt-4 ">
                                                                <div class="reloading_info me-4 d-flex ">
                                                                    Redirecting in <div class="ms-2 me-2" id="countdown"></div> sec
                                                                </div>

                                                                <div class="reloading_contents">
                                                                    <div class="spinner-grow spinner-grow-sm "
                                                                        role="status">
                                                                        <span class="visually-hidden">Loading...</span>
                                                                    </div>
                                                                    <div class="spinner-grow spinner-grow-sm "
                                                                        role="status">
                                                                        <span class="visually-hidden">Loading...</span>
                                                                    </div>
                                                                    <div class="spinner-grow spinner-grow-sm "
                                                                        role="status">
                                                                        <span class="visually-hidden">Loading...</span>
                                                                    </div>
                                                                    <div class="spinner-grow spinner-grow-sm "
                                                                        role="status">
                                                                        <span class="visually-hidden">Loading...</span>
                                                                    </div>
                                                                    <div class="spinner-grow spinner-grow-sm "
                                                                        role="status">
                                                                        <span class="visually-hidden">Loading...</span>
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



                                <script>

                                    let project_id = $("#project_id").val();



                                    let countdownTime = 10; // Total countdown time in seconds
                                    $('#countdown').fadeIn(500).text(countdownTime); // Set initial countdown value

                                    // Start countdown
                                    let countdownInterval = setInterval(function () {
                                        countdownTime--; // Decrease the countdown time by 1
                                        $('#countdown').text(countdownTime); // Update the countdown text

                                        // If countdown reaches 0, stop the interval and hide everything
                                        if (countdownTime <= 0) {
                                            clearInterval(countdownInterval); // Stop the countdown
                                            // $('#github-icon').fadeOut(500);
                                            // $('#software-icon').fadeOut(500);
                                            $('#countdown').fadeOut(500);

                                            window.location.href = "/dashboard"

                                        }
                                    }, 1000); // Execute every 1 second (1000 milliseconds)

                                    setTimeout(function () {



                                        // $('#github-icon').fadeOut(500);  // Fade out the GitHub icon
                                        // $('#software-icon').fadeOut(500);  // Fade out the software icon
                                    }, 10000);  // 10 seconds
                                </script>





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