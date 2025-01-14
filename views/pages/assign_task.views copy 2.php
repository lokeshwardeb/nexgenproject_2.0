<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();

$get_task_id = $controllers->pure_data($_GET['task_id']);

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
                                            Assign Task
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

                                            <div class="assign_task_section mt-4 ">
                                                <div class="section_title">
                                                    <div class="fs-5">
                                                        Task assigned to the user(s) below :
                                                    </div>
                                                    <div class="fs-6">
                                                        Please make check mark for the users you want to assign the task
                                                    </div>
                                                </div>
                                                <div class="assign_task_form lux_roman mt-4 fw-bold ">
                                                    <form action="" method="post">

                                                        <input type="text" name="task_id"
                                                            value="<?php echo $get_task_id ?>">

                                                        <div class="row">
                                                            <?php

                                                            $result_get_task_info = $controllers->create_sql_query("SELECT user_name, user_id, task_assigned_id, task_id, task_assigned_user_id, task_assigned_datetime, task_last_submission_datetime FROM users u INNER JOIN task_assigned_users tau ON u.user_id = tau.task_assigned_user_id WHERE tau.task_id = '$get_task_id';");
                                                            // $result_get_task_info = $controllers->get_all_data("task_assigned_users");

                                                            if($result_get_task_info){
                                                                if($result_get_task_info->num_rows > 0){
                                                                    // that means the data is exists
                                                                    while($row_task_info = $result_get_task_info->fetch_assoc()){
                                                                        $user_id = $row['user_id'];
                                                                        $user_name = $row['user_name'];
                                                                        
                                                                        $task_assigned_id = $row_task_info['task_assigned_id'];
                                                                        $task_id = $row_task_info['task_id'];
                                                                        $task_assigned_user_id = $row_task_info['task_assigned_user_id'];
                                                                        $task_assigned_datetime = $row_task_info['task_assigned_datetime'];
                                                                        $task_last_submission_datetime = $row_task_info['task_last_submission_datetime'];
                                                                    }
                                                                }else{
                                                                    // that means data not exists to the software
                                                                    $user_id = "";
                                                                    $user_name = "";

                                                                    $task_assigned_id = "";
                                                                    $task_id = "";
                                                                    $task_assigned_user_id = "";
                                                                    $task_assigned_datetime = "";
                                                                    $task_last_submission_datetime = "";
                                                                }
                                                            }else{
                                                                // that means the query not runs
                                                                $user_id = "";
                                                                $user_name = "";

                                                                $task_assigned_id = "";
                                                                $task_id = "";
                                                                $task_assigned_user_id = "";
                                                                $task_assigned_datetime = "";
                                                                $task_last_submission_datetime = "";
                                                            }


                                                            $result_get_all_users = $controllers->get_all_data("users");

                                                            if($result_get_all_users){
                                                                if($result_get_all_users->num_rows > 0){
                                                                    // that means the users exists on the software
                                                                    while($row_get_users = $result_get_all_users->fetch_assoc()){

                                                                        // the get main user id is the all users id which will travers one by one
                                                                        
                                                                        $get_main_user_id = $row_get_users['user_id'];
                                                                        $get_main_user_name = $row_get_users['user_id'];

                                                                        echo '
                                                                        
                                                                            <div class="col-md-4 col-sm-12">
                                                                        <div class="mb-3">
                                                                            <div class="form-check">
                                                                                <input';

                                                                                // $row_users = 
                                                                            

                                                                            echo ' class="form-check-input" name="assign_users[]" type="checkbox"
                                                                                                value="' . $task_assigned_id . '" id="flexCheckDefault'. $task_assigned_id .'">
                                                                                            <label class=" text-primary form-check-label"
                                                                                                for="flexCheckDefault'. $task_assigned_id .'">
                                                                                                ' . $user_name . '
                                                                                            </label>

                                                                                            

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                        ';
                                                                    }
                                                                }
                                                            }




                                                            // echo '
                                                                        
                                                            //             <div class="col-md-4 col-sm-12">
                                                            //         <div class="mb-3">
                                                            //             <div class="form-check">
                                                            //                 <input';

                                                            // // $row_users = 
                                                            

                                                            // echo ' class="form-check-input" name="assign_users[]" type="checkbox"
                                                            //                     value="' . $task_assigned_id . '" id="flexCheckDefault">
                                                            //                 <label class=" text-primary form-check-label"
                                                            //                     for="flexCheckDefault">
                                                            //                     ' . $user_name . '
                                                            //                 </label>

                                                                            

                                                            //             </div>
                                                            //         </div>
                                                            //     </div>
                                                            //             ';



                                                            // $result_get_users = $controllers->get_all_data("users");
                                                            
                                                            // if ($result_task_assign_join) {
                                                            //     if ($result_task_assign_join->num_rows) {
                                                            //         // that means the task users exists on the software
                                                            //         while ($row_task_assign = $result_task_assign_join->fetch_assoc()) {



                                                            //             // $result_assigned_users_check = $controllers->get_all_data("task_assigned_users", "`user_");
                                                            
                                                            //             // if($result_assigned_users_check){
                                                            //             //     if($result_assigned_users_check->num_rows > 0){
                                                            //             //         while($row_assigned_check = $result_assigned_users_check->fetch_assoc()){
                                                            //             //             $controllers->
                                                            //             //         }
                                                            //             //     }
                                                            //             // }
                                                            

                                                            //         }
                                                            //     } else {
                                                            //         // that means the user does not exists on the software
                                                            //     }
                                                            // }


                                                            ?>

                                                        </div>

                                                        <div class="mb-3 mt-4 pt-4 ">
                                                            <div class="task_assigned_datetime_section ">
                                                                <div class="section_title fs-4 mb-4 text-primary ">
                                                                    Task Assigned Datetime
                                                                </div>
                                                                <div class="section_content">
                                                                    <input type="datetime-local" class="form-control"
                                                                        name="project_submission_datatime_for_'. $row_users['user_id'] .'  " />
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="mb-3 mt-4 ">
                                                            <div class="task_assigned_datetime_section">
                                                                <div class="section_title fs-4 mb-4 text-primary ">
                                                                    Task Submission Datetime
                                                                </div>
                                                                <div class="section_content">
                                                                    <input type="datetime-local" class="form-control"
                                                                        name="project_submission_datatime_for_'. $row_users['user_id'] .'  " />
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="mb-3 mt-4 ">
                                                            <button type="submit" class="btn btn-primary mt-4  "
                                                                name="save_assigned_users">Save
                                                                assigned users</button>
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
        </div>
    </div>
</main>

<?php

require_once __DIR__ . '/inc/_footer.php';

require_once __DIR__ . '/inc/_footer_scripts.php';

?>