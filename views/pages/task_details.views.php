<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();

$get_task_id = $_GET['task_id'];

$get_current_user_id = $_SESSION['user_id'];


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

            <?php

            $result_get_task_info = $controllers->get_all_data("tasks", "`task_id` = '$get_task_id'");

            if ($result_get_task_info) {
                if ($result_get_task_info->num_rows > 0) {
                    while ($task_details_row = $result_get_task_info->fetch_assoc()) {
                        $task_id = $task_details_row['task_id'];
                        $task_project_id = $task_details_row['project_id'];
                        $task_name = $task_details_row['task_name'];
                        $task_desc = $task_details_row['task_desc'];
                        $task_file_name = $task_details_row['task_file_name'];
                        $task_file_upload_status = $task_details_row['task_file_upload_status'];
                        // $datetime = $task_details_row['datatime'];
                    }
                } else {
                    // that means the row does not exists and the value of the variables should be blank
                    $task_id = "";
                    $task_project_id = "";
                    $task_file_name = "";
                    $task_file_upload_status = "";
                    // $datetime = "";
                }
            } else {
                $task_id = "";
                $task_project_id = "";
                $task_file_name = "";
                $task_file_upload_status = "";
                // $datetime = "";
            }


            ?>

            <div class="col-md-9 cus_bg_main_section_color">
                <div class="main_content_section scrollbar_container">

                    <div class="the_running_main_content montserrat_font">

                        <div class="details_container">

                            <div class="details_container_info">

                                <div class="container">
                                    <div class="title_section">
                                        <div class="section_title fs-4 text-center mt-4 inter-font">
                                            Task Details
                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section ">
                                    <div class="container m-4   pe-5">
                                        <div class="task_main_section">
                                            <div class="task_info_section">
                                                <div class="task_info">
                                                    <div class="task_name fs-4 m-2 ">
                                                        <span class="title_section   ">
                                                            Task Project :
                                                        </span>
                                                        <span class="desc_section text-primary fw-bold ">
                                                            <?php

                                                            // get the project name using project it
                                                            $result_get_project_name = $controllers->get_all_data("projects", " `project_id` = '$task_project_id' ");

                                                            if ($result_get_project_name) {
                                                                if ($result_get_project_name->num_rows > 0) {
                                                                    // that means the project is exists
                                                                    while ($row_project_name = $result_get_project_name->fetch_assoc()) {
                                                                        echo $row_project_name['project_name'];
                                                                    }
                                                                }
                                                            }


                                                            ?>
                                                        </span>

                                                    </div>
                                                    <div class="task_name fs-4 m-2 mb-4 ">
                                                        <span class="title_section fs-4 ">
                                                            Task Name :
                                                        </span>
                                                        <span class="desc_section text-primary fw-bold ">
                                                            <?php echo $task_name ?>
                                                        </span>

                                                    </div>
                                                    <div class="task_des m-5 p-4 bg-light text-dark ">
                                                        <span class="title_section fs-4 p-4 ">
                                                            Task Desc :
                                                        </span>
                                                        <div class=" m-4 ps-4 fs-5 fw-bold desc_section">
                                                            Task descript
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="task_file_section m-4 ">
                                                <?php

                                            // set the directory name and the file name
                                            $dir = "./assets/uploads/task_file_upload/";
                                            $make_file_name = $dir . $task_file_name;

                                            // check if the file is exists or not on the software
                                            if(file_exists($make_file_name)){
                                                echo '
                                                <div class="task_file">
                                                    <embed
                                                        src="/assets/uploads/task_file_upload/'. $task_file_name .'"
                                                        type="application/pdf" width="100%" height="650px">
                                                </div>

                                                   <div class="task_file_download_btn p-4 m-4">
                                                    <a href="/assets/uploads/task_file_upload/'. $task_file_name .'"
                                                        download="">
                                                        <button type="button"
                                                            class="btn btn-primary  d-flex justify-content-center m-auto  ">Download
                                                            File</button>
                                                    </a>
                                                </div>

                                                ';
                                            }else{
                                                echo '
                                                <div class="mt-5 pt-5 text-center text-danger fw-bold" >
                                                    No task file has been found for this Task
                                                </div>
                                                ';
                                            }

                                            ?>

                                                <!-- <div class="task_file">
                                                    <embed
                                                        src="/assets/uploads/task_file_upload/<?php echo $task_file_name; ?>"
                                                        type="application/pdf" width="100%" height="650px">
                                                </div>

                                                <div class="task_file_download_btn p-4 m-4">
                                                    <a href="/assets/uploads/task_file_upload/<?php echo $task_file_name; ?>"
                                                        download="">
                                                        <button type="button"
                                                            class="btn btn-primary  d-flex justify-content-center m-auto  ">Download
                                                            File</button>
                                                    </a>
                                                </div> -->

                                            </div>


                                            <div class="task_manage_section m-4 p-4 ">
                                                <div class="container ">
                                                    <div class="row  ">
                                                        <div class="col-md-6 mb-4 col-sm-12">
                                                            <a href="">
                                                                <button class="btn btn-outline-dark">View assigned users
                                                                    to this task</button>
                                                            </a>

                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <a href="/assign_task?task_id=<?php echo $task_id; ?>">
                                                                <button class="btn btn-outline-dark  ">Assign this task
                                                                    to users</button>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 mb-4 col-sm-12">
                                                            <a href="/update_task?task_id=<?php echo $task_id; ?>">
                                                                <button class="btn btn-outline-dark  ">Update
                                                                    task</button>
                                                            </a>
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
        </div>
    </div>
</main>

<?php

require_once __DIR__ . '/inc/_footer.php';

require_once __DIR__ . '/inc/_footer_scripts.php';

?>