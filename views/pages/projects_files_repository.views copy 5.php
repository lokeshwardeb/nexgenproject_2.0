<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();

// $controllers->check_get_project_id();

// $controllers->send_file_repo_msg();

?>

<script>
    // success_alert("jai sri ganesh", "jai sri ganesh");
</script>

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
        /* background-color: #D9FDD3 !important; */
        background-color: white !important;
        border-radius: 5px;
    }

    .sended_msg {
        margin-bottom: 10px;
        padding: 8px;
        /* background-color: #e1ffc7; */
        /* background-color: #D9FDD3 !important; */
        /* background-color: white !important; */
        background-color: #D9FDD3 !important;
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
                                                        <div class="received_msg shadow m-4">
                                                            <div>
                                                                <a href="./assets/uploads/project_files_repo_upload/Projects.jpg"
                                                                    download="">Message 2</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php

                                                    $user_id = $_SESSION['user_id'];

                                                    ?>

                                                    <div class="repl_section">
                                                        <form id="submit_form">
                                                            <textarea name="message" id="msg_to_send"
                                                                placeholder="Write your file description"
                                                                class="form-control mt-4 mb-4" cols="30"
                                                                rows="5"></textarea>
                                                            <input type="hidden" value="<?php echo $user_id ?>"
                                                                name="message_sender_user_id"
                                                                id="message_sender_user_id">
                                                            <input type="hidden"
                                                                value="<?php echo $_SESSION['user_id'] ?>"
                                                                name="current_user_id" id="current_user_id">
                                                            <input type="file" name="repo_upload_file"
                                                                class="form-control" id="repo_upload_file">
                                                            <button name="send_file_repo_msg" type="submit"
                                                                class="btn btn-outline-primary mt-4 btn-sm"
                                                                id="msg_submit">Submit</button>
                                                        </form>
                                                    </div>

                                                    <div class="file_run_main_onload_codes">
                                                        <script>
                                                            function scrollToBottom() {
                                                                var messages = document.getElementById('messages');
                                                                if (messages) {
                                                                    messages.scrollTop = messages.scrollHeight;
                                                                }
                                                            }

                                                            window.onload = scrollToBottom();
                                                        </script>
                                                    </div>

                                                    <script>
                                                        // Enable pusher logging - don't include this in production
                                                        Pusher.logToConsole = true;

                                                        var pusher = new Pusher('4f9b2dd81bc8677892ac', {
                                                            cluster: 'ap2'
                                                        });

                                                        var channel = pusher.subscribe('my-channel');
                                                        channel.bind('my-event', function (data) {

                                                            var get_msg_sender_user_id = data.message_sender_user_id;
                                                            var get_current_user_id = $("#current_user_id").val()

                                                            if (get_msg_sender_user_id == get_current_user_id) {
                                                                // that means the message is sent by my (current loggedin user)
                                                                $("#messages").append('<div class="sended_msg shadow m-4">' + data.message + '</div>')

                                                                // if (data.file_uploaded_path == '' || data.file_name == '') {
                                                                //     // if the data_uploaded_path is not set and if data file name is not set
                                                                //     $("#messages").append('<div><a href="'. data.file_uploaded_path .'" download="" >'. data.file_name .'</a></div>')
                                                                //     $("#repo_upload_file").val("");
                                                                // }

                                                                // var file_msg_new = $('<div class="file_msg" id="file_msg_1">Hi i am new msg</div>');
                                                                var file_msg_new = $('<div><a href="' + data.file_uploaded_path + '" download="" >' + data.file_name  +'</a></div>');

                                                                $("#messages").append(file_msg_new);

                                                                // $("#messages").append('<div><a href="'. data.file_uploaded_path .'" download="" >'. data.file_name .'</a></div>')
                                                                $("#repo_upload_file").val("");

                                                                scrollToBottom()
                                                                $("#msg_to_send").val("")

                                                            } else {
                                                                // that means the message is not sent by me (current loggedin user)
                                                                $("#messages").append('<div class="received_msg shadow m-4">' + data.message + '</div>')
                                                                scrollToBottom()
                                                            }
                                                        });
                                                    </script>

                                                    <script>
                                                        $(document).ready(function () {
                                                            $("#submit_form").on("submit", function (e) {
                                                                e.preventDefault();

                                                                var msg_to_send = $("#msg_to_send").val();
                                                                var message_sender_user_id = $("#message_sender_user_id").val()
                                                                var repo_upload_file = $("#repo_upload_file").val();

                                                                if (msg_to_send == '' && repo_upload_file == '') {
                                                                    // that means if the message and upload file both are blank then it should through an error
                                                                    danger_alert("Hey, your message is empty and you have not selected any file !!", "You have to write some message or select some files to upload and send !!")
                                                                } else {
                                                                    var formData = new FormData(this);
                                                                    // that means that the message is not blank
                                                                    $.ajax({
                                                                        type: "POST",
                                                                        url: "/send_msg",
                                                                        data: formData,
                                                                        contentType: false,
                                                                        processData: false,
                                                                        success: function (response) {
                                                                            success_alert("Message Sent", response);
                                                                            $("#msg_to_send").val("");
                                                                            $("#repo_upload_file").val("");

                                                                            scrollToBottom();
                                                                        },
                                                                        error: function (xhr, status, error) {
                                                                            console.log("Error: " + error);
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                        });
                                                    </script>


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
require __DIR__ . '/inc/_footer.php';
