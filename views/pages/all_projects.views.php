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
                                            <div class=" mt-4 pt-4 ">
                                                <table class="table cus_hover mt-4 mb-4 " style="width:100%"
                                                    id="datatable_info_table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Project Name</th>
                                                            <th scope="col">View</th>
                                                            <th scope="col">Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php



                                                        $result_all_projects = $controllers->get_all_data("projects", " 1 ORDER BY `projects`.`project_id` DESC ");

                                                        if ($result_all_projects) {
                                                            if ($result_all_projects->num_rows > 0) {
                                                                $sl_no = 1;
                                                                while ($row = $result_all_projects->fetch_assoc()) {

                                                                    // border-start border-5 border-primary cus_project_main_box
                                                        
                                                                    echo '
                                                             <tr class="project_main_col_content">
                                                                <th scope="row">' . $sl_no . '</th>
                                                                <td>' . $row['project_name'] . '</td>
                                                                <td>
                                                                     <div class="project_details ps-4 pe-4 me-4">
                                                                        <a href="/projects_hub?project_id=' . $row['project_id'] . '">
                                                                            <i class="fa-solid fa-eye"></i>

                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="project_edit me-4">
                                                                        <a href="">
                                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            
                                                
                                                            
                                                            ';

                                                                    $sl_no++;

                                                                }
                                                            }
                                                        }




                                                        ?>

                                                    </tbody>
                                                </table>

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