<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();

$controllers->check_get_project_id();



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
                                        <div class="section_title fs-2 text-center mt-4 inter-font">
                                            Welcome to the projects hub
                                        </div>
                                        <div class="section_title fs-4 text-center mt-4 inter-font">

                                            <?php

                                            $project_id = $_GET['project_id'];

                                            $result_check_projects = $controllers->get_all_data("projects", "`project_id` = '$project_id'");

                                            if ($result_check_projects) {
                                                if ($result_check_projects->num_rows > 0) {
                                                    while ($row = $result_check_projects->fetch_assoc()) {
                                                        $project_name = $row['project_name'];
                                                        $project_desc = $row['project_desc'];
                                                        $project_submission_datetime = date("d M Y m:i:s a", strtotime($row['project_submission_datetime']));
                                                    }
                                                }
                                            }

                                            ?>

                                            <div class="project_name_section">
                                                Project Name : <?php echo $project_name ?> <br />

                                            </div>



                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section mt-4">
                                    <div class="projects_content">
                                        <div class="container">
                                            <div class="project_info fs-5 inter-font mt-4 mb-4 pb-4 ">
                                                <div class="project_name_info mb-3 ">
                                                    Project Name : <span
                                                        class="lux_roman text-primary fw-bold"><?php echo $project_name ?></span>
                                                </div>
                                                <div class="project_desc_info mb-3 ">
                                                    Project Description : <span
                                                        class="lux_roman text-primary fw-bold"><?php echo $project_desc ?></span>
                                                </div>
                                                <!-- <br/> -->
                                                <div class="project_submission_datetime mb-3 ">
                                                    Project Submission Datetime : <span
                                                        class="lux_roman text-primary fw-bold"><?php echo $project_submission_datetime ?></span>
                                                </div>
                                                <!-- <br/> -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="task_assigned_status mt-5 mb-4">
                                        <div class="task_status text-center mt-4 fw-bold">This project task has been
                                            assigned to you</div>

                                        <div class="assigned_task fw-bold text-center mt-5 fs-5 pt-4">
                                            Your assigned task : <span class="text-primary">Complete the design</span>
                                        </div>



                                    </div>

                                    <div class="project_nav_bar mt-5 ms-4">
                                        <div class="row mt-4 pt-4">
                                            <div class="col-md-3 col-sm-12">
                                                <a href="/projects_file_repository?project_id=<?php echo $project_id ?>">
                                                    <button class="btn btn-outline-dark">
                                                        Files Repository
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <a href="/project_discussions?project_id=<?php echo $project_id ?>">
                                                    <button class="btn btn-outline-dark">
                                                        Discussions
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <a href="">
                                                    <button class="btn btn-outline-dark">
                                                        Activity log
                                                    </button>
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <a href="">
                                                    <button class="btn btn-outline-dark">
                                                        Task
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <?php

                                // $result_total_page = $controllers->get_all_data("projects");
                                
                                // if ($result_total_page) {
                                //     if ($result_total_page->num_rows > 0) {
                                //         $total_page_records = $result_total_page->num_rows;
                                //         $limit = 3;
                                //         $total_page = ceil($total_page_records - $limit);
                                
                                //         for ($i = 0; $i <= $total_page; $i++) {
                                
                                //         }
                                

                                //     }
                                // }
                                

                                ?>

                                <!-- pagination section starts here -->

                                <div class="pagination_section m-auto">
                                    <div class="container">
                                        <nav aria-label="...">
                                            <ul class="pagination">
                                                <!-- <li class="page-item disabled">
                                                    <a class="page-link">Previous</a>
                                                </li> -->
                                                <?php

                                                // $result_total_page = $controllers->get_all_data("projects");
                                                

                                                // if ($result_total_page) {
                                                //     if ($result_total_page->num_rows > 0) {
                                                //         $total_page_records = $result_total_page->num_rows;
                                                //         // $limit = 3;
                                                //         $total_page = ceil($total_page_records / $limit);
                                                
                                                //         if($current_page_no > 1){
                                                //             echo '
                                                //             <li class="page-item ">
                                                //             <a class="page-link" href="?page='. ($current_page_no - 1) .'">Previous</a>
                                                //         </li>
                                                //             ';
                                                //         }elseif($current_page_no == 1){
                                                //             echo '
                                                
                                                //             <li class="page-item disabled">
                                                //             <a class="page-link">Previous</a>
                                                //         </li>
                                                
                                                //             ';
                                                //         }
                                                
                                                //         for ($i = 1; $i <= $total_page; $i++) {
                                                
                                                //             if($current_page_no == $i){
                                                //                 $active_pagination = 'active';
                                                //             }else{
                                                //                 $active_pagination = '';
                                                //             }
                                                
                                                //             echo '
                                                //             <li class="page-item '. $active_pagination .'"><a class="page-link" href="?page='. $i .'">'. $i .'</a></li>
                                                //             ';
                                                //         }
                                                
                                                //         if($total_page > $current_page_no){
                                                //             echo '
                                                //             <li class="page-item">
                                                //             <a class="page-link" href="?page='. ($current_page_no + 1) .'">Next</a>
                                                //         </li>
                                                //             ';
                                                //         }elseif($total_page == $current_page_no){
                                                //             echo '
                                                //             <li class="page-item disabled">
                                                //             <a class="page-link" href="#">Next</a>
                                                //         </li>
                                                //             ';
                                                //         }
                                                

                                                //     }else{
                                                //         echo 'empty table';
                                                //     }
                                                // }
                                                

                                                ?>

                                                <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item active" aria-current="page">
                                                    <a class="page-link" href="#">2</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li> -->
                                                <!-- <li class="page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li> -->
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                                <!-- pagination section ends here -->


                                <!-- pagination section starts here -->
                                <!-- <div class="pagination_section m-auto">
                                    <div class="container">
                                    <nav aria-label="...">
                                        <ul class="pagination">
                                            <li class="page-item disabled">
                                                <a class="page-link">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    </div>
                                </div> -->
                                <!-- pagination section ends here -->





                                <!-- <div class="status_container">
                                    <h3>Status:</h3>
                                    <p>Current project: <a href="">xyz</a></p>
                                    <p>Your team is working on : <a href="">xyz</a></p>
                                </div>
                                <div class="process_container">
                                    <h3>Process:</h3>
                                    <p>Project complete: <a href="">50%</a></p>
                                </div> -->
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
                                    <div class="ongoing_task_section mt-4 pt-4 pb-4">
                                        <div class="section_title pt-5 mt-5 fs-4">
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