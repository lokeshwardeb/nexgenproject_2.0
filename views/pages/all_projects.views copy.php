<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();

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
                                            All Projects
                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section mt-4">
                                    <div class="projects_content">
                                        <div class="container">
                                            <div class="row">
                                                <?php

                                                if(isset($_GET['page'])){
                                                    
                                                    $current_page_no = $_GET['page'];

                                                }else{
                                                    $current_page_no = 1;
                                                }

                                                // $limit = 3;
                                                $limit = 4;

                                                $offset = ($current_page_no - 1) * $limit;


                                                $result_all_projects = $controllers->create_sql_query("SELECT * FROM `projects` ORDER BY `project_id` DESC LIMIT {$offset}, {$limit}");

                                                if($result_all_projects){
                                                    if($result_all_projects->num_rows > 0){
                                                        while($row = $result_all_projects->fetch_assoc()){

                                                            // border-start border-5 border-primary cus_project_main_box

                                                            echo '
                                                            
                                                            
                                                <div
                                                class="col-12 p-2 m-4 mt-2 mb-2 project_main_col_content  project_col_main ">
                                                <div class="project_main  d-flex  ">
                                                    <div class="project_no  ps-4 ms-4 me-4">'. $row['project_id'] .'</div>
                                                    <div class="project_name me-4">'. $row['project_name'] .'</div>
                                                    <div class="project_details ps-4 pe-4 me-4">
                                                        <a href="/projects_hub?project_id='. $row['project_id'] .'">
                                                            <i class="fa-solid fa-eye"></i>

                                                        </a>
                                                    </div>
                                                    <div class="project_edit me-4">
                                                        <a href="">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                                            
                                                            ';
                                                        }
                                                    }
                                                }




                                                ?>
<!-- 
                                                <div
                                                    class="col-12 p-2 m-4 border-start border-5 border-primary project_col_main cus_project_main_box">
                                                    <div class="project_main  d-flex  ">
                                                        <div class="project_no  ps-4 ms-4 me-4">1</div>
                                                        <div class="project_name me-4">Jai Sri Ganesh</div>
                                                        <div class="project_details ps-4 pe-4 me-4">
                                                            <a href="">
                                                                <i class="fa-solid fa-eye"></i>

                                                            </a>
                                                        </div>
                                                        <div class="project_edit me-4">
                                                            <a href="">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div> -->
                                               
                                               
                                                <!-- <div
                                                    class="col-12 p-2 m-4 border-start border-5 border-primary project_col_main cus_project_main_box">
                                                    <div class="project_main  d-flex  ">
                                                        <div class="project_no  ps-4 ms-4 me-4">1</div>
                                                        <div class="project_name me-4">Jai Sri Ganesh</div>
                                                        <div class="project_details ps-4 pe-4 me-4">
                                                            <a href="">
                                                                <i class="fa-solid fa-eye"></i>

                                                            </a>
                                                        </div>
                                                        <div class="project_edit me-4">
                                                            <a href="">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div> -->

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

                                        $result_total_page = $controllers->get_all_data("projects");
                                        

                                        if ($result_total_page) {
                                            if ($result_total_page->num_rows > 0) {
                                                $total_page_records = $result_total_page->num_rows;
                                                // $limit = 3;
                                                $total_page = ceil($total_page_records / $limit);

                                                if($current_page_no > 1){
                                                    echo '
                                                    <li class="page-item ">
                                                    <a class="page-link" href="?page='. ($current_page_no - 1) .'">Previous</a>
                                                </li>
                                                    ';
                                                }elseif($current_page_no == 1){
                                                    echo '
                                                    
                                                    <li class="page-item disabled">
                                                    <a class="page-link">Previous</a>
                                                </li>

                                                    ';
                                                }

                                                for ($i = 1; $i <= $total_page; $i++) {

                                                    if($current_page_no == $i){
                                                        $active_pagination = 'active';
                                                    }else{
                                                        $active_pagination = '';
                                                    }

                                                    echo '
                                                    <li class="page-item '. $active_pagination .'"><a class="page-link" href="?page='. $i .'">'. $i .'</a></li>
                                                    ';
                                                }

                                                if($total_page > $current_page_no){
                                                    echo '
                                                    <li class="page-item">
                                                    <a class="page-link" href="?page='. ($current_page_no + 1) .'">Next</a>
                                                </li>
                                                    ';
                                                }elseif($total_page == $current_page_no){
                                                    echo '
                                                    <li class="page-item disabled">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                                    ';
                                                }


                                            }else{
                                                echo 'empty table';
                                            }
                                        }


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