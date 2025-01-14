<?php
// require_once __DIR__ . '/../config/conn.php';
// require_once __DIR__ . '/../models.php';

// require __DIR__ . '/../models/models.php';

class controllers extends models
{



    public function add_new_task()
    {
        if (isset($_POST['add_new_task'])) {
            $task_name = $this->pure_data($_POST['task_name']);
            $task_desc = $this->pure_data($_POST['task_desc']);

            $project_id = $this->pure_data($_POST['project_id']);


            $task_file = $_FILES['task_file']['name'];
            $task_file_tmp_name = $_FILES['task_file']['tmp_name'];

            $task_file_ext = pathinfo($task_file, PATHINFO_EXTENSION);

            //   $task_file_ext = pathinfo($task_file, PATHINFO_EXTENSION);


            // making the task file upload status to false, which means the task file has not uploaded yet
            $task_file_upload_status = false;


            // set the task file upload directory

            // $task_file_upload_dir = __DIR__ . '/assets/uploads/task_file_upload/';
            // $task_file_upload_dir = '/assets/uploads/task_file_upload/';
            $task_file_upload_dir = __DIR__ . '/../assets/uploads/task_file_upload/';

            // make the upload file name, directory and extension together

            $upload_task_file = $task_file_upload_dir . $task_file;



            // $task_file = $_FILES['task_file']['name'];

            // check if the data is blank or not
            if ($task_name == '' || $task_desc == '' || $project_id == '') {
                // that means all the data is blank and it should be through an error 
                echo '
                <script>
                danger_alert("Please fillup all the data !!", "You have to fillup all the data !! Data cannot be blank !!");
                </script>
                ';
                return;
            }

            // check if the task already exists or not
            $result_check = $this->get_all_data("tasks", "`project_id` = '$project_id' AND `task_name` = '$task_name' AND `task_desc` = '$task_desc'");



            if ($result_check) {

                if ($result_check->num_rows > 0) {

                    // that means the same task is already exists on the software

                    echo '
                    <script>
                    danger_alert("The task already exists !!", "Same task already exists on the software");
                    </script>
                    ';

                    return;
                }


            }


            // check if the task file has been uploaded or not

            if ($task_file != '') {
                // that means the file is uploaded and it should be upload to the server
                if ($task_file_ext == 'pdf') {
                    // that means the file is pdf and it should upload and continue the process

                    // check if the file directory exists or not, if not exist then create one
                    if (!file_exists($task_file_upload_dir)) {

                        mkdir($task_file_upload_dir);
                    }

                    if (move_uploaded_file($task_file_tmp_name, $upload_task_file)) {
                        // that means the file has been uploaded successfully

                        // firstly make the status true, which means the file has been uploaded successfully
                        $task_file_upload_status = true;

                        // now update the database with the file name as the task file has been uploaded here



                    }
                } else {
                    // that means the file is not pdf so it should return the process and through an error
                    echo '
                    
                    <script>
                    
                    danger_alert("Error !!", "The uploaded file is not pdf !! Please upload an pdf file !!");

                    </script>
                    
                    
                    ';

                    return;

                }
            }


            // check if the task file has been uploaded or not, if uploaded then add to db with the task file name
            if ($task_file_upload_status) {
                // that means the task file has been uploaded

                // insert the data to the database
                $task_result = $this->insert("tasks", " `project_id`, `task_name`, `task_desc`, `task_file_name`, `task_file_upload_status` ", " '$project_id', '$task_name', '$task_desc', '$task_file', 'task_file_uploaded'");


            } else {
                // that means the task file has not uploaded and it should not add the file name 
                $task_result = $this->insert("tasks", " `project_id`, `task_name`, `task_desc`", " '$project_id', '$task_name', '$task_desc'");

            }



            // insert the data to the database
            // $task_result = $this->insert("tasks", "`task_name`, `task_desc`", "'$task_name', '$task_desc'");

            // now show the alert msg
            if ($task_result) {
                echo '
                <script>
                    success_alert("The task has been added successfully !!");
                </script>
                ';
            } else {
                echo '
                 <script>
                    danger_alert("There has been error while adding the task");
                 </script>
                ';
            }



        }
    }

    public function assign_task()
{
    if (isset($_POST['save_assigned_users'])) {
        $get_task_id = $this->pure_data($_POST['task_id']);
        $task_assigned_datetime = $this->pure_data($_POST['task_assigned_datetime']);
        $task_submission_datetime = $this->pure_data($_POST['task_submission_datetime']);

        // Step 1: Get the currently assigned users for this task
        $currently_assigned_users = [];
        $result_assigned_users = $this->get_all_data("task_assigned_users", "`task_id` = '$get_task_id'");
        if ($result_assigned_users && $result_assigned_users->num_rows > 0) {
            while ($row = $result_assigned_users->fetch_assoc()) {
                $currently_assigned_users[] = $row['task_assigned_user_id'];
            }
        }

        // Step 2: Get the selected users from the form
        $selected_users = isset($_POST['assign_users']) ? $_POST['assign_users'] : [];

        // Step 3: Insert/Update newly selected users
        foreach ($selected_users as $user) {
            if (in_array($user, $currently_assigned_users)) {
                // Update existing assignment
                $result_update_assigned_user = $this->update(
                    "task_assigned_users",
                    "`task_assigned_datetime` = '$task_assigned_datetime', `task_last_submission_datetime` = '$task_submission_datetime'",
                    "`task_id` = '$get_task_id' AND `task_assigned_user_id` = '$user'"
                );

                if (!$result_update_assigned_user) {
                    echo '<script>danger_alert("Error !!", "Failed to update assignment for user ID ' . $user . '.");</script>';
                    return;
                }
            } else {
                // Insert new assignment
                $result_insert_assigned_user = $this->insert(
                    "task_assigned_users",
                    "`task_id`, `task_assigned_user_id`, `task_assigned_datetime`, `task_last_submission_datetime`",
                    "'$get_task_id', '$user', '$task_assigned_datetime', '$task_submission_datetime'"
                );

                if (!$result_insert_assigned_user) {
                    echo '<script>danger_alert("Error !!", "Failed to assign user ID ' . $user . '.");</script>';
                    return;
                }
            }
        }

        // Step 4: Remove unselected users
        foreach ($currently_assigned_users as $user) {
            if (!in_array($user, $selected_users)) {
                $result_delete_assigned_user = $this->delete(
                    "task_assigned_users",
                    "`task_id` = '$get_task_id' AND `task_assigned_user_id` = '$user'"
                );

                if (!$result_delete_assigned_user) {
                    echo '<script>danger_alert("Error !!", "Failed to remove user ID ' . $user . '.");</script>';
                    return;
                }
            }
        }

        // Success alert after processing all updates
        echo '<script>success_alert("Success !!", "Task assignments updated successfully.");</script>';
    }
}


    // public function assign_task()
    // {
    //     if (isset($_POST['save_assigned_users'])) {

    //         $get_task_id = $this->pure_data($_POST['task_id']);
    //         $task_assigned_datetime = $this->pure_data($_POST['task_assigned_datetime']);
    //         $task_submission_datetime = $this->pure_data($_POST['task_submission_datetime']);



    //         // check if the checkbox is selected or not
    //         if (isset($_POST['assign_users']) && is_array($_POST['assign_users'])) {
    //             // that means the checkbox is selected and it send post request and it is an array

    //             // $assign_users = $this->pure_data($_POST['assign_users']);

    //             foreach ($_POST['assign_users'] as $user) {
    //                 // check if the assigned user already exists for that task on the software
    //                 $result_check_user = $this->get_all_data("task_assigned_users", " `task_id` = '$get_task_id' AND `task_assigned_user_id` = '$user' ");

    //                 if ($result_check_user) {
    //                     if ($result_check_user->num_rows > 0) {

    //                         // that means the user is exists on the software and it should be update with the new value or with the new information

    //                         // $result_insert_assigned_user = $this->insert("task_assigned_users", " `task_id`, `task_assigned_user_id`, `task_assigned_datetime`, `task_last_submission_datetime` ", " '$get_task_id', '$user', '$task_assigned_datetime', '$task_submission_datetime' ");

    //                         $result_update_assigned_user = $this->update("task_assigned_users", " `task_id` = '$get_task_id', `task_assigned_user_id` = '$user', `task_assigned_datetime` = '$task_assigned_datetime', `task_last_submission_datetime` = '$task_submission_datetime' ", " `task_id` = '$get_task_id' ");

    //                         if($result_update_assigned_user){
    //                             // that means the user has been updated successfully
    //                             echo '
    //                             <script>
    //                                 success_alert("Success !!", "The user(s) has been assigned successfully with updated informations !!");
    //                             </script>
    //                             ';
    //                             return;
    //                         }else{
    //                             echo '
                                
    //                             <script>
    //                                 danger_alert("Error !!", "There was something error while updating with assgined users with new updated informations !!");
    //                             </script>
                                
    //                             ';
    //                             return;
    //                         }


    //                         // return;


    //                     }



    //                     // if the user is not exist then it should add the user with the task on the software

    //                     $result_insert_assigned_user = $this->insert("task_assigned_users", " `task_id`, `task_assigned_user_id`, `task_assigned_datetime`, `task_last_submission_datetime` ", " '$get_task_id', '$user', '$task_assigned_datetime', '$task_submission_datetime' ");

    //                     if ($result_insert_assigned_user) {
    //                         // that means the user has been assigned succesfully
    //                         echo '
    //                         <script>
    //                             success_alert("Success !!", "The user has been assigned successfully !!");
    //                         </script>
    //                         ';
    //                     } else {
    //                         // that means there was something error while inserting the assignments on the software

    //                         echo '
    //                         <script>
    //                             danger_alert("Success !!", "The user has been assigned successfully !!");
    //                         </script>
    //                         ';

    //                     }


    //                 }

    //             }
    //         }

    //         // now if the checkbox is not selected and it is an array that this logic should execute below :
    //             // if($_POST[''])


    //     }
    // }


    public function update_task()
    {
        if (isset($_POST['update_task'])) {
            //   echo 'the db task id is : ' .  $task_id = $this->pure_data($_POST['task_id']);
            $task_id = $this->pure_data($_POST['task_id']);
            $task_name = $this->pure_data($_POST['task_name']);
            $task_desc = $this->pure_data($_POST['task_desc']);

            $project_id = $this->pure_data($_POST['project_id']);


            $task_file = $_FILES['task_file']['name'];
            $task_file_tmp_name = $_FILES['task_file']['tmp_name'];

            $task_file_ext = pathinfo($task_file, PATHINFO_EXTENSION);

            //   exit;

            //   $task_file_ext = pathinfo($task_file, PATHINFO_EXTENSION);


            // making the task file upload status to false, which means the task file has not uploaded yet
            $task_file_upload_status = false;


            // set the task file upload directory

            // $task_file_upload_dir = __DIR__ . '/assets/uploads/task_file_upload/';
            // $task_file_upload_dir = '/assets/uploads/task_file_upload/';
            $task_file_upload_dir = __DIR__ . '/../assets/uploads/task_file_upload/';

            // make the upload file name, directory and extension together

            $upload_task_file = $task_file_upload_dir . $task_file;



            // $task_file = $_FILES['task_file']['name'];

            // check if the data is blank or not
            if ($task_name == '' || $task_desc == '' || $project_id == '') {
                // that means all the data is blank and it should be through an error 
                echo '
                <script>
                danger_alert("Please fillup all the data !!", "You have to fillup all the data !! Data cannot be blank !!");
                </script>
                ';
                return;
            }

            // check if the task already exists or not
            $result_check = $this->get_all_data("tasks", "`project_id` = '$project_id' AND `task_name` = '$task_name' AND `task_desc` = '$task_desc'");



            if ($result_check) {

                if ($result_check->num_rows < 0) {

                    // that means the task is not exist on the software

                    echo '
                    <script>
                    danger_alert("The task not exists !!", "Please make sure that the task is exists on the software !!");
                    </script>
                    ';

                    return;
                }


            }


            // check if the task file has been uploaded or not

            if ($task_file != '') {
                // that means the file is uploaded and it should be upload to the server
                if ($task_file_ext == 'pdf') {
                    // that means the file is pdf and it should upload and continue the process

                    // check if the file directory exists or not, if not exist then create one
                    if (!file_exists($task_file_upload_dir)) {

                        mkdir($task_file_upload_dir);
                    }

                    if (move_uploaded_file($task_file_tmp_name, $upload_task_file)) {
                        // that means the file has been uploaded successfully

                        // firstly make the status true, which means the file has been uploaded successfully
                        $task_file_upload_status = true;

                        // now update the database with the file name as the task file has been uploaded here



                    }
                } else {
                    // that means the file is not pdf so it should return the process and through an error
                    echo '
                    
                    <script>
                    
                    danger_alert("Error !!", "The uploaded file is not pdf !! Please upload an pdf file !!");

                    </script>
                    
                    
                    ';

                    return;

                }
            }



            // check if the task file has been uploaded or not, if uploaded then add to db with the task file name
            if ($task_file_upload_status) {
                // that means the task file has been uploaded

                // insert the data to the database
                $task_result = $this->update("tasks", " `project_id` = '$project_id', `task_name` = '$task_name', `task_desc` ='$task_desc', `task_file_name` = '$task_file', `task_file_upload_status` = 'task_file_uploaded'", "`task_id` = '$task_id'");


                // $task_result = $this->insert("tasks", " `project_id`, `task_name`, `task_desc`, `task_file_name`, `task_file_upload_status` ", " '$project_id', '$task_name', '$task_desc', '$task_file', 'task_file_uploaded'");


            } else {
                // that means the task file has not uploaded and it should not add the file name 
                $task_result = $this->update("tasks", " `project_id` = '$project_id', `task_name` = '$task_name', `task_desc` = '$task_desc' ", "`task_id` = '$task_id' ");

                // $task_result = $this->insert("tasks", " `project_id`, `task_name`, `task_desc`", " '$project_id', '$task_name', '$task_desc'");

            }



            // insert the data to the database
            // $task_result = $this->insert("tasks", "`task_name`, `task_desc`", "'$task_name', '$task_desc'");

            // now show the alert msg
            if ($task_result) {
                echo '
                <script>
                    success_alert("The task has been added successfully !!");
                </script>
                ';
            } else {
                echo '
                 <script>
                    danger_alert("There has been error while adding the task");
                 </script>
                ';
            }



        }
    }

    public function create_new_meeting()
    {
        if (isset($_POST['new_meeting'])) {

            $letter = 'abcdefghijklmnopqrstuvwxyz0123456789';

            $meeting_code_shuffle = str_shuffle($letter);

            $result_get_meeting = $this->get_all_data("meetings");

            $result_get_meeting_status = $this->get_all_data("meetings", "`meeting_status` = 'running'");

            if ($result_get_meeting_status) {
                if ($result_get_meeting_status->num_rows > 0) {
                    // that means there already a meeting exist and it should not create a new meeting as only one running meeting is allowed
                    echo '
                    <script>
                    danger_alert("Already a meeting is running !!", "A meeting is already running, please join the meeting !!");
                    </script>
                    ';

                    return;

                }
            }

            if ($result_get_meeting) {
                if ($result_get_meeting->num_rows > 0) {

                    $result_upcoming_meeting_id = $this->get_the_max_id("meeting_id", "meetings");

                    while ($row = $result_upcoming_meeting_id->fetch_assoc()) {
                        $upcoming_meeting_id = $row['max_id'];
                    }

                } else {

                    $upcoming_meeting_id = 1;

                }
            }

            // $upcoming_meeting_id = $this->get_the_max_id("meeting_id", "meetings");

            echo $meeting_code = (string) $meeting_code_shuffle . '_id_' . $upcoming_meeting_id;



            $result_create_meeting = $this->insert("meetings", "`meeting_code`, `meeting_status`", "'$meeting_code', 'running'");

            if ($result_create_meeting) {
                echo '
                <script>
                success_alert("Meeting has been created successfully !!", "Reloading the page in 5 seconds ....");
                </script>
                ';

                // unset($_POST['new_meeting']);

                // reload in 5 seconds
                echo '
                <script>
                setTimeout(function(){
                    //  window.location.reload(); 
                    location.href="/meetings";
                    }, 5000); 
                </script>
                ';

                return;

            }




            // echo '

            // <a  href="/meeting_hub?meeting_id=">
            // <button name="join_meeting" id="join_meeting" class="btn btn-primary">Join meeting</button>
            // </a>

            // ';
        }
    }


    public function meetings_handler()
    {

        if (isset($_GET['meeting_code'])) {
            $meeting_code = $this->pure_data($_GET['meeting_code']);

            $username = $_SESSION['username'];

            $result_get_meetings_status = $this->get_all_data("meetings", "`meeting_code` = '$meeting_code'");
            if ($result_get_meetings_status) {
                if ($result_get_meetings_status->num_rows > 0) {
                    // that means the meeting exists with the code
                    while ($row = $result_get_meetings_status->fetch_assoc()) {
                        $meeting_status = $row['meeting_status'];
                        if ($meeting_status == 'running') {
                            // that means the meeting is running and it should start the meeting
                            echo '
                            <script>
                            start_meeting("' . $username . '", "' . $meeting_code . '");
                            </script>
                            ';
                        }
                    }
                } else {
                    // that means the meeting not exists on database
                    echo '
                    <script>
                    danger_alert("The meeting does not exists !!", "This meeting does not exists on our software !! Please create a new meeting or join the existing meeting !!");

                    setInterval(() => {
                        location.href = "/meetings";
                    }, 10000);

                    </script>
                    ';




                }
            }
        }

    }

    public function add_new_documentation()
    {
        if (isset($_POST['add_new_documentation'])) {
            $documentation_name = $this->pure_data($_POST['documentation_name']);
            $documentation_desc = $this->pure_data($_POST['documentation_desc']);

            $documentation_file = $_FILES['documentation_file']['name'];
            $documentation_file_tmp = $_FILES['documentation_file']['tmp_name'];
            $documentation_file_extension = pathinfo($documentation_file, PATHINFO_EXTENSION);

            $upload_dir = './assets/uploads/documentations_upload/';

            $upload_file = $upload_dir . $documentation_file;

            if ($documentation_name == '' || $documentation_desc == '' || $documentation_file == '') {
                // that means the data is empty and it should through an error
                echo '
                
                <script>
                
                danger_alert("Please fillup all the data !!", "You have to fillup all the data !! Data cannot be blank !!");

                </script>

                ';

                return;

            }


            // check if the data already exists on the database
            $check_result = $this->get_all_data("documentations", "`documentation_name` = '$documentation_name' AND `documentation_desc` = '$documentation_desc'");

            if ($check_result) {
                if ($check_result->num_rows > 0) {
                    // that means the data already exists on the database and it should through an error
                    echo '
                    <script>
                    danger_alert("Documentation already exists !!", "Your submitted documentation already exists on our software !!");
                    </script>
                    ';

                    return;

                }
            }


            // check if the file is supported or not (only pdf is supported)
            if ($documentation_file_extension != 'pdf') {
                echo '
                <script>
                
                danger_alert("The file is not supported !!", "Please upload .pdf files !! Only pdf file is supported !!");

                </script>
                ';

                return;

            }


            // check if the directory exists or not, if not exists then create one
            if (!file_exists($upload_dir)) {
                // that means the directory not exists and it should create one
                mkdir($upload_dir);
            }



            // now if the data not exits on the database then add the new data to the database
            $add_new_documentation_result = $this->insert("documentations", "`documentation_name`, `documentation_desc`, `documentation_file_name`", "'$documentation_name', '$documentation_desc', '$documentation_file'");

            // now if the data added successfully on the database then upload the file on the software
            if (move_uploaded_file($documentation_file_tmp, $upload_file)) {
                // that means the files has been uploaded successfully 
                echo '
                <script>
                
                success_alert("Success !!", "Your new documentation has been added successfully !!");

                </script>
                ';
            } else {
                echo '
                <script>
                
                danger_alert("Error !!", "There has been some issues while uploading with your documentation !! Please try again later !! If you are facing the same problem again and again then please immediately contact the developer of the software !!");

                </script>
                ';

                // // if there an error occurs then delete the added data from the database
                // $delete_added_data_result = $this->delete("documentations", "`documentation_name` = '$documentation_name' AND `documentation_desc` = '$documentation_desc' AND `documentation_file_name` = '$documentation_file'");

                // if($delete_added_data_result){
                //     // that means the added data has been deleted successfully
                //     echo '
                //     <script>
                //     success_alert("Success !!", "We have deleted the added data successfully !!");
                //     </script>
                //     ';
                // }

                // $this->delete();



            }



        }
    }


    public function send_push_msg($channel_name, $event_name, $message)
    {
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            '4f9b2dd81bc8677892ac',
            '9409f799504b5a4d9728',
            '1843504',
            $options
        );

        $data['message'] = $message;
        $pusher->trigger($channel_name, $event_name, $data);

        //   $data['message'] = 'hello world';
        //   $pusher->trigger('my-channel', 'my-event', $data);
    }

    public function send_file_repo_msg()
    {
        if (isset($_POST['send_file_repo_msg'])) {
            $file_repo_repl_txt = $this->pure_data($_POST['file_repo_repl_txt']);

            $this->send_push_msg("my-channel", "my-event", "$file_repo_repl_txt");

            echo 'file_repo_worked';

            // $this->send_push_msg();
        }
    }



    // public function send_sms()
    // {
    //     $ch = curl_init('https://textbelt.com/text');
    //     $data = array(
    //         // 'phone' => '5555555555',
    //         'phone' => '01779548241',
    //         'message' => 'Hello world',
    //         'key' => 'textbelt',
    //     );

    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //     $response = curl_exec($ch);
    //     curl_close($ch);
    // }

    public function check_get_project_id()
    {
        if (!isset($_GET['project_id'])) {
            // that means the project id is not set and it should redirect the user
            echo '
            <script>
            location.href="/all_projects";
            </script>
            ';
        }
    }

    public function login_check()
    {
        if (!isset($_SESSION['username'])) {
            // that means the user is not loggedin and it should redirect the user
            echo '
            <script>
            location.href="/login";
            </script>
            ';
        }
    }

    public function create_new_project()
    {
        if (isset($_POST['create_new_project'])) {
            $project_name = $this->pure_data($_POST['project_name']);
            $project_desc = $this->pure_data($_POST['project_desc']);
            $project_submission_datetime = $this->pure_data($_POST['project_submission_datetime']);

            // check if the data was blank or not 
            if ($project_name == '' || $project_desc == '' || $project_submission_datetime == '') {
                echo '
                <script>
                danger_alert("Please fillup all the data !!", "The data cannot be blank !!");
                </script>
                ';

                return;
            }

            // check if the project was already exists or not 
            $result_check = $this->get_all_data("projects", "`project_name` = '$project_name' AND `project_desc` = '$project_desc' AND `project_submission_datetime` = '$project_submission_datetime'");


            if ($result_check) {
                if ($result_check->num_rows > 0) {
                    // that means the project already exists on the database
                    echo '
                    <script>
                    danger_alert("Project already exists !!", "Your project already exists on our software !!");
                    </script>
                    ';

                    return;

                }
            }

            $result_create_new_project = $this->insert("projects", "`project_name`, `project_desc`, `project_submission_datetime`", "'$project_name', '$project_desc', '$project_submission_datetime'");

            if ($result_create_new_project) {
                // that means the project has been created successfully
                echo '
                <script>
                success_alert("Success !!", "The new project has been created successfully !!");
                </script>
                ';
            } else {
                // that means the project has been created successfully
                echo '
                <script>
                danger_alert("Error !!", "There was something error while creating you project !!");
                </script>
                ';
            }


        }
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            $username = $this->pure_data($_POST['login_username']);
            // $email = $this->pure_data($_POST['email']);
            $password = $this->pure_data($_POST['login_password']);

            // $username = $this->pure_data($_POST['username']);
            // // $email = $this->pure_data($_POST['email']);
            // $password = $this->pure_data($_POST['password']);

            // check if the data is blank or not
            if ($username == '' || $password == '') {
                // that means the data is blank
                echo '
                <script>
                danger_alert("Please fillup all the login data !!", "The data cannot be blank !!");
                </script>
                ';

                return;

            }

            // check if the user exists or not
            $result_check_user = $this->get_all_data("users", "`user_name` = '$username'");

            if ($result_check_user) {
                if ($result_check_user->num_rows > 0) {
                    // that means the user exists
                    while ($row = $result_check_user->fetch_assoc()) {
                        $get_user_name = $row['user_name'];
                        $get_user_id = $row['user_id'];
                        $get_email = $row['email'];
                        $get_password = $row['password'];

                        // check if the password is correct or not
                        if (password_verify($password, $get_password)) {
                            // that means the password is correct and it should continue the login process

                            $_SESSION['username'] = $username;
                            $_SESSION['user_id'] = $get_user_id;
                            $_SESSION['email'] = $get_email;
                            $_SESSION['login_status'] = true;
                            $_SESSION['is_loggedin'] = 'loggedin';

                            echo '
                            
                            <script>
                            success_alert("Success !!", "Loggedin successfully !!");
                            </script>

                            ';

                            echo '
                            <script>
                            
                            location.href="/dashboard"

                            </script>
                            ';

                        } else {
                            echo '
                            
                            <script>
                            danger_alert("Error !! The password doesnot match !! Please give the correct credentials to login !!");
                            </script>

                            ';
                        }
                    }

                } else {
                    // that means the user does ot exist
                    echo '
                    
                    <script>
                    danger_alert("Error !! User doesnot exists !!")
                    </script>

                    ';
                }
            }

        }
    }

    public function signup()
    {
        if (isset($_POST['signup'])) {
            $username = $this->pure_data($_POST['signup_username']);
            $email = $this->pure_data($_POST['signup_email']);
            $password = $this->pure_data($_POST['signup_password']);
            $cpassword = $this->pure_data($_POST['signup_cpassword']);

            // check if all data is blank or not
            if ($username == '' || $email == '' || $password == '' || $cpassword == '') {
                // that means all data is not filled up
                echo '
                
                <script>
                danger_alert("Please fillup all the data !! ", "You have to fill up all the data !!");
                </script>
                
                ';

                return;
            }

            // check if the password and cpassword are matched or not
            if ($password != $cpassword) {
                // that means the password and cpassword are not matched and it should through an error and return from the method

                echo '
                
                <script>
                danger_alert("Password doesnot match !!", "Please give the correct credentials");
                </script>

                ';

                return;

            }

            // check if the user already exists on database
            $result_check_user = $this->get_all_data("users", "`user_name` = '$username'");

            if ($result_check_user) {
                if ($result_check_user->num_rows > 0) {
                    // that means the user already exists

                    echo '
                    <script>
                    danger_alert("User already exists !!", "Please login with you credentials !!");
                    </script>
                    ';

                    return;

                }
            }

            // if the password and cpassword is matched and it the user is not exists on the database then it should continue the signup process

            // secure the password with the password hash algorithm
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $result_signup = $this->insert("users", "`user_name`, `email` , `password`", "'$username', '$email', '$hash'");

            if ($result_signup) {
                // that means the user has been signup successfully
                echo '
                <script>
                success_alert("Success !!", " User has been signup successfully !!");
                </script>
                ';
            } else {
                // that means there was error while signup the user
                echo '
                <script>
                danger_alert("Error !!", " There was something error while signup your account !!");
                </script>
                ';
            }




        }
    }

}




?>