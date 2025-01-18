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

if(empty($_GET['project_id']) || !isset($_GET['project_id'])){
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

if($result_get_project_info){
    if($result_get_project_info->num_rows > 0){
        // that means the project already exists
        while($row_get_project_info = $result_get_project_info->fetch_assoc()){
            $get_project_name = $row_get_project_info['project_name'];
            $get_repo_name = $row_get_project_info['project_github_repo_name'];
        }
    }
}

$repo_name_is_blank = false;

// check if the project repo name exists or not
if($get_repo_name == ''){
    // that means the repo name is blank
    $repo_name_is_blank = true;
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
                                      <div class="meetings_main_section">
                                        <div class="meetings_content">
                                            <div class="container">
                                                <div class="meetings_title fs-3  border-bottom border-dark  pb-2 inter-font">
                                                <span class="text-primary">CodeBridge</span> connects your team <br/> with <span class="fw-bold text-primary ">GitHub</span> <span class="text-primary">repositories</span> and  <br/> empowers seamless <span class="text-primary fw-bold ">collaborative</span> code management.
                                                </div>

                                                <div class="show_project_name_section fs-5 mt-2 pt-2 mb-4 pb-4 ">
                                                    <div class="project_name_info">
                                                        <div class="show_project_name_info">
                                                            <span class="section_title">Project Name : </span>
                                                            <span class="section_content"><?php echo $get_project_name; ?></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="task_main_section m-4 p-4">
                                                    <div class="task_btn_section">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-12">
                                                                <a href="/add_new_task">
                                                                    <!-- <button type="submit" class="btn btn-primary" >Add new task</button> -->
                                                                </a>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                            <?php 
                                                            
                                                            // check if the project github repo is exists or not
                                                            if($repo_name_is_blank || $repo_name_is_blank == true){
                                                                // that means the repo name is blank and it should not show the entry point link button

                                                                echo '
                                                                <div class="text-danger fw-bold " >
                                                                    The github repo for this project are not exists !!
                                                                </div>

                                                                <div class="mt-4 mb-4" >
                                                                    <a href="/all_projects" >
                                                                        <button class="btn btn-primary  ">
                                                                            Return to Projects
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                                ';

                                                                return;

                                                            }
                                                            
                                                            
                                                            // echo $get_project_id; 
                                                            
                                                            
                                                            
                                                            ?>
                                                                <a href="/code_bridge_entry_point?project_id=<?php echo $get_project_id; ?>" target="_blank" >
                                                                    <button class="btn btn-outline-primary">Enter CodeBridge with this project</button>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <a href="">

                                                                </a>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12"></div>
                                                        </div>
                                                    </div>
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


                    
                </div>
            </div>
        </div>
    </div>
</main>

<?php

require_once __DIR__ . '/inc/_footer.php';

require_once __DIR__ . '/inc/_footer_scripts.php';

?>