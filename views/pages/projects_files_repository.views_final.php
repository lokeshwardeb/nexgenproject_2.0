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

$controllers->send_file_repo_msg();

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
                                            Welcome to the projects file repository
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
                                                Project Name: <?php echo $project_name ?> <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section mt-4">
                                    <div class="projects_content">
                                        <div class="container">
                                            <div class="project_info fs-5 inter-font mt-4 mb-4 pb-4 ">
                                                <div class="project_name_info mb-3 ">
                                                    Project Name: <span
                                                        class="lux_roman text-primary fw-bold"><?php echo $project_name ?></span>
                                                </div>
                                                <div class="project_desc_info mb-3 ">
                                                    Project Description: <span
                                                        class="lux_roman text-primary fw-bold"><?php echo $project_desc ?></span>
                                                </div>
                                                <div class="project_submission_datetime mb-3 ">
                                                    Project Submission Datetime: <span
                                                        class="lux_roman text-primary fw-bold"><?php echo $project_submission_datetime ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="go_back_btn">
                                        <div class="container">
                                            <a href="/projects_hub?project_id=<?php echo $project_id ?>">
                                                <button class="btn btn-sm btn-outline-dark">Go back to project
                                                    hub</button>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="files_repository_main_section mt-4 pt-4 mb-4 pb-4">


                                        <div class="main_file_repository_section">
                                            <div class="msg_main_section">
                                                <div class="container">
                                                    <div class="msg_container" id="messages">

                                                        <div class="received_msg shadow m-4">Message 1</div>

                                                        

<script>

// Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('4f9b2dd81bc8677892ac', {
    cluster: 'ap2'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function (data) {

    // var message_container =document.getElementById('messages');

    var message_container =document.createElement('div')
    message_container.id = "new_msg";


    var newDiv = document.createElement('div');

    newDiv.classList.add("received_msg", "shadow", "m-4");

    newDiv.textContent = data.message;

    // var message_container =document.getElementById('messages');

    // message_container.appendChild(newDiv)
    
    // alert(JSON.stringify(data));
});
</script>

                                                        <!-- <script>

                                                            // Enable pusher logging - don't include this in production
                                                            Pusher.logToConsole = true;

                                                            var pusher = new Pusher('4f9b2dd81bc8677892ac', {
                                                                cluster: 'ap2'
                                                            });

                                                            var channel = pusher.subscribe('my-channel');
                                                            channel.bind('my-event', function (data) {

                                                                var message_container =document.getElementById('messages');

                                                                var newDiv = document.createElement('div');

                                                                newDiv.classList.add("received_msg", "shadow", "m-4");

                                                                newDiv.textContent = data.message;

                                                                var message_container =document.getElementById('messages');

                                                                message_container.appendChild(newDiv)
                                                                
                                                                // alert(JSON.stringify(data));
                                                            });
                                                        </script> -->


                                                        <!-- <div class="received_msg shadow m-4">Message 2</div>
                                                        <div class="sended_msg shadow m-4">Message 3</div>
                                                        <div class="received_msg shadow m-4">Message 4</div>
                                                        <div class="sended_msg shadow m-4">Message 5</div>
                                                        <div class="received_msg shadow m-4">Message 6</div>
                                                        <div class="sended_msg shadow m-4">Message 7</div>
                                                        <div class="received_msg shadow m-4">Message 8</div>
                                                        <div class="sended_msg shadow m-4">Message 9</div>
                                                        <div class="received_msg shadow m-4">Message 10</div> -->
                                                        <!-- Add more messages if necessary -->
                                                    </div>

                                                    <div class="repl_section">
                                                        <form action="" method="post">
                                                            <textarea name="file_repo_repl_txt" id=""
                                                                placeholder="Write your file description"
                                                                class="form-control mt-4 mb-4" cols="30"
                                                                rows="5"></textarea>

                                                            <input type="file" name="file_repo_files_upload"
                                                                class="form-control" id="">

                                                            <button name="send_file_repo_msg" type="submit"
                                                                class="btn btn-outline-primary mt-4 btn-sm"  >Submit</button>

                                                        </form>
                                                    </div>


                                                   


                                                </div>
                                            </div>
                                        </div>

                                        <div class="file_run_main_onload_codes">
                                            <script>
                                                function scrollToBottom() {
                                                    var messages = document.getElementById('messages');
                                                    if (messages) {
                                                        messages.scrollTop = messages.scrollHeight;
                                                    }
                                                }

                                                window.onload = scrollToBottom;
                                            </script>
                                        </div>

                                    </div>



                                </div>

                                <div class="pagination_section m-auto">
                                    <div class="container">
                                        <nav aria-label="...">
                                            <ul class="pagination">
                                                <!-- Pagination logic here -->
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="container d-none">
                        <div class="welcome_section fs-5 mt-4">
                            Welcome again,
                            <div class="welcome_username ms-5 ps-4 text-primary">
                                <?php echo $_SESSION['username']; ?>
                            </div>
                        </div>

                        <div class="integrate_dashboard_nav">
                            <?php require __DIR__ . '/inc/_dashboard_nav.php'; ?>
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

<script>
    $(document).ready(function () {
        $("")
    });
</script>


<?php
require_once __DIR__ . '/inc/_footer.php';
require_once __DIR__ . '/inc/_footer_scripts.php';
?>

<style>
    .msg_container {
        /* max-height: 200px; Adjust as needed */
        max-height: 50vh;
        overflow-y: auto;
        padding: 10px;
        border: 1px solid #ccc;
        /* background-color: #ddd; */
        /* background-color: #f9f9f9; */
    }

    .received_msg {
        margin-bottom: 10px;
        padding: 8px;
        /* background-color: #e1ffc7; */
        background-color: #D9FDD3 !important;
        border-radius: 5px;



    }

    .sended_msg {
        margin-bottom: 10px;
        padding: 8px;
        /* background-color: #e1ffc7; */
        /* background-color: #D9FDD3 !important; */
        background-color: white !important;
        border-radius: 5px;



    }


    .details_container_info {
        height: auto !important;
    }


    /* scrollbar customization starts here */


    /* width */
    ::-webkit-scrollbar {
        width: 20px;
        /* width: 15px; */
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        /* background: red;  */
        background: var(--cus-primary-color);
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #b30000;
    }



    /* scrollbar customization ends here */
</style>