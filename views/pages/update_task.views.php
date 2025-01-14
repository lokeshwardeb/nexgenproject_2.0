<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();
$controllers->update_task();

$get_task_id = $controllers->pure_data($_GET['task_id']);

if(empty($_GET['task_id']) || !isset($_GET['task_id'])){
    echo '
    <script>
    window.location.href="/tasks";
    </script>
    ';
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
                                            Update task
                                        </div>
                                    </div>
                                </div>

                                <?php
                                
                                $result_get_task_info = $controllers->get_all_data("tasks", "`task_id` = '$get_task_id'");

                                if($result_get_task_info){
                                    if($result_get_task_info->num_rows > 0){
                                        // that means the task exists
                                        while($task_row = $result_get_task_info->fetch_assoc()){
                                            $task_name = $task_row['task_name'];
                                            $task_desc = $task_row['task_desc'];
                                            $task_project_id = $task_row['project_id'];
                                        }
                                    }else{
                                        $task_name = "";
                                        $task_desc = "";
                                        $task_project_id = "";
                                    }
                                }


                                ?>

                                <div class="main_content_section mt-4">
                                    <div class="projects_content lux_roman">
                                        <div class="container">
                                            <form action="" method="post" enctype="multipart/form-data" >
                                                <input type="text" name="task_id" value="<?php echo $get_task_id; ?>" >
                                            <div class="mb-3">
                                                    <select class="form-control" name="project_id" id="project_id">
                                                        <option value="">Select Project</option>
                                                        <?php

                                                        $result_get_projects = $controllers->get_all_data("projects", "1 ORDER BY projects.project_id DESC");

                                                        if($result_get_projects){
                                                            while($row = $result_get_projects->fetch_assoc()){

                                                                $get_db_project_id = $row['project_id'];

                                                                echo '<option ' . (($task_project_id == $get_db_project_id) ? "selected" : "") . ' value="' . $row['project_id'] . '">' . $row['project_name'] . '</option>';


                                                                // echo '<option '. ($task_project_id == $get_db_project_id) ? "selected" : "" .' value="'. $row['project_id'] .'">'. $row['project_name'] .'</option>';


                                                                // echo '<option value="'. $row['project_id'] .'">'. $row['project_name'] .'</option>';
                                                            }
                                                        }


                                                        ?>
                                                    </select>
                                                </div>    
                                            <div class="mb-3">
                                                    <input type="text" name="task_name" class="form-control" value="<?php echo $task_name; ?>" placeholder="Enter Task Name" >
                                                </div>
                                               
                                                <div class="mb-3">
                                                    <textarea name="task_desc" class="form-control" id="" placeholder="Enter Task Description" cols="30" rows="10"><?php echo $task_desc; ?></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="file" name="task_file" id="task_file" class="form-control" >
                                                    <div  class="text-danger mt-4 ms-4 mb-4">* Please upload pdf files only (Optional)</d>
                                                </div>
                                                <div class="mb-3">
                                                   <button type="submit" name="update_task" class="btn btn-outline-primary mt-4 mb-4" >Update task</button>
                                                </div>

                                            </form>
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