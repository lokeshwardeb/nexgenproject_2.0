<?php
// require_once __DIR__ . '/../config/conn.php';
// require_once __DIR__ . '/../models.php';

// require __DIR__ . '/../models/models.php';

class controllers extends models
{

    public function add_new_documentation(){
        if(isset($_POST['add_new_documentation'])){
            $documentation_name = $this->pure_data($_POST['documentation_name']);
            $documentation_desc = $this->pure_data($_POST['documentation_desc']);
           
            $documentation_file = $_FILES['documentation_file']['name'];
            $documentation_file_tmp = $_FILES['documentation_file']['tmp_name'];
            $documentation_file_extension = pathinfo($documentation_file, PATHINFO_EXTENSION);

            $upload_dir = './assets/uploads/documentations_upload/';

            $upload_file = $upload_dir . $documentation_file;

            if($documentation_name == '' || $documentation_desc == '' || $documentation_file == ''){
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

            if($check_result){
                if($check_result->num_rows > 0){
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
            if($documentation_file_extension != 'pdf'){
                echo '
                <script>
                
                danger_alert("The file is not supported !!", "Please upload .pdf files !! Only pdf file is supported !!");

                </script>
                ';

                return;

            }


            // check if the directory exists or not, if not exists then create one
            if(!file_exists($upload_dir)){
                // that means the directory not exists and it should create one
                mkdir($upload_dir);
            }



            // now if the data not exits on the database then add the new data to the database
            $add_new_documentation_result = $this->insert("documentations", "`documentation_name`, `documentation_desc`, `documentation_file_name`", "'$documentation_name', '$documentation_desc', '$documentation_file'");

            // now if the data added successfully on the database then upload the file on the software
            if(move_uploaded_file($documentation_file_tmp, $upload_file)){
                // that means the files has been uploaded successfully 
                echo '
                <script>
                
                success_alert("Success !!", "Your new documentation has been added successfully !!");

                </script>
                ';
            }else{
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


    public function send_push_msg($channel_name, $event_name, $message){
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

    public function send_file_repo_msg(){
        if(isset($_POST['send_file_repo_msg'])){
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

    public function check_get_project_id(){
        if(!isset($_GET['project_id'])){
            // that means the project id is not set and it should redirect the user
            echo '
            <script>
            location.href="/all_projects";
            </script>
            ';
        }
    }

    public function login_check(){
        if(!isset($_SESSION['username'])){
            // that means the user is not loggedin and it should redirect the user
            echo '
            <script>
            location.href="/login";
            </script>
            ';
        }
    }

    public function create_new_project(){
        if(isset($_POST['create_new_project'])){
            $project_name = $this->pure_data($_POST['project_name']);
            $project_desc = $this->pure_data($_POST['project_desc']);
            $project_submission_datetime = $this->pure_data($_POST['project_submission_datetime']);

            // check if the data was blank or not 
            if($project_name == '' || $project_desc == '' || $project_submission_datetime == ''){
                echo '
                <script>
                danger_alert("Please fillup all the data !!", "The data cannot be blank !!");
                </script>
                ';

                return;
            }

            // check if the project was already exists or not 
            $result_check = $this->get_all_data("projects", "`project_name` = '$project_name' AND `project_desc` = '$project_desc' AND `project_submission_datetime` = '$project_submission_datetime'");


            if($result_check){
                if($result_check->num_rows > 0){
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

            if($result_create_new_project){
                // that means the project has been created successfully
                echo '
                <script>
                success_alert("Success !!", "The new project has been created successfully !!");
                </script>
                ';
            }else{
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