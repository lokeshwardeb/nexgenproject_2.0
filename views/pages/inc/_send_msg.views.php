<?php


    require './vendor/autoload.php';

    require './config/conn.php';
    require './models/models.php';
    require './controllers/controllers.php';

    $controllers = new controllers;

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

      $message = $controllers->pure_data($_POST['message']);
      $message_sender_user_id = $controllers->pure_data($_POST['message_sender_user_id']);
      $get_project_id = $controllers->pure_data($_POST['project_id']);
      $message_sender_user_name = $controllers->pure_data($_POST['message_sender_user_name']);

      $channel_name = "project_repository";

      $event_name = "project_id_" . $get_project_id;

      // get the files if uploaded on the file repo
      if($_FILES['repo_upload_file']['name'] !=''){
        // that means the upload file was selected and it is not blank
        $file_name = $_FILES['repo_upload_file']['name'];
        $file_tmp_name = $_FILES['repo_upload_file']['tmp_name'];

        // file upload dir
        $file_upload_dir = './assets/uploads/project_files_repo_upload/';

        $uploaded_file_dir = $file_upload_dir . $file_name;

        // if(move_uploaded_file($file_tmp_name, $uploaded_file_dir)){
        //   $data['file_uploaded_path'] = $uploaded_file_dir;

        // }
        
        // upload files
        if(move_uploaded_file($file_tmp_name, $uploaded_file_dir)){
          $data['file_uploaded_path'] = $uploaded_file_dir;
          $data['file_name'] = $file_name;
        }else{
          $data['file_uploaded_path'] = '';
          $data['file_name'] = '';

        }
        // $data['file_name'] = $file_name;
      }




      // start the added the repository_msg_id and the code so that we can add it on the insertion

       // get the last id
       $result_repository_msg_last_id = $controllers->get_the_max_id("repository_msg_id", "projects_file_repository");

       //  $row_total = $result_repository_msg_last_id->fetch_assoc();

       while($row = $result_repository_msg_last_id->fetch_assoc()){

         $repository_msg_last_id = $row['max_id'];

       }

       //  $repository_msg_last_id = $row_total['repository_msg_id'];



   

        if($repository_msg_last_id == 0){
          $repository_msg_next_id = 1;
        }else{
         $repository_msg_next_id =  $repository_msg_last_id + 1;
        }


          // add the repository_msg_code
        $repository_msg_code = "pronex_repo_msg_" . $repository_msg_next_id;



       // end the added the repository_msg_id and the code so that we can add it on the insertion





      if($message != '' && $_FILES['repo_upload_file']['name'] == ''){
        // that means the message is not blank and the file is not uploaded

        //  // get the last id
        //  $result_repository_msg_last_id = $controllers->get_the_max_id("repository_msg_id", "projects_file_repository");

        // //  $row_total = $result_repository_msg_last_id->fetch_assoc();

        // while($row = $result_repository_msg_last_id->fetch_assoc()){

        // echo 'last id =' .  $repository_msg_last_id = $row['max_id'];

        // }

        // //  $repository_msg_last_id = $row_total['repository_msg_id'];



    
 
        //  if($repository_msg_last_id == 0){
        //    $repository_msg_next_id = 1;
        //  }else{
        //   $repository_msg_next_id =  $repository_msg_last_id + 1;
        //  }


        //    // add the repository_msg_code
        // echo $repository_msg_code = "pronex_repo_msg_" . $repository_msg_next_id;




        $result_insert_message = $controllers->insert("projects_file_repository", "`repository_msg_code`, `repository_msg`, `project_id`, `repository_msg_status`, `msg_sender_user_id`, `msg_sender_user_name`, `file_upload_status`", "'$repository_msg_code', '$message', '$get_project_id', 'file_and_message', '$message_sender_user_id', '$message_sender_user_name', 'file_not_uploaded'");
        
      }

      if($message == '' && $_FILES['repo_upload_file']['name'] != ''){
        // that means the message is blank and the file is uploaded

        //   // get the last id
        //   $repository_msg_last_id = $controllers->get_the_max_id("repository_msg_id", "projects_file_repository");

        //   $repository_msg_next_id = $repository_msg_last_id + $repository_msg_last_id;
  
        //   if($repository_msg_next_id == 0){
        //     $repository_msg_next_id = 1;
        //   }
 
 
        //     // add the repository_msg_code
        //  $repository_msg_code = "pronex_repo_msg_" . $repository_msg_next_id;
 


        $result_insert_message = $controllers->insert("projects_file_repository", "`repository_msg_code`, `repository_msg`, `project_id`, `repository_msg_status`, `msg_sender_user_id`, `msg_sender_user_name`, `file_upload_status`, `file_name`", "'$repository_msg_code', '$message', '$get_project_id', 'file_and_message', '$message_sender_user_id', '$message_sender_user_name', 'file_uploaded', '$file_name'");


      }

      // check if the message is blank or not
      if($message !='' && $_FILES['repo_upload_file']['name'] !=''){
        // that means the message and upload files is not blank and it should insert the message and its info's with files details into database

        // // differently add the files and messages on the repository

        // // firstly add the the message

        // // get the last id
        // $repository_msg_last_id = $controllers->get_the_max_id("repository_msg_id", "projects_file_repository");

        // $repository_msg_next_id = $repository_msg_last_id + $repository_msg_last_id;

        // if($repository_msg_next_id == 0){
        //   $repository_msg_next_id = 1;
        // }

        // str_shuffle()


        // add the repository_msg_code
        // $repository_msg_code = "pronex_repo_msg_" . $repository_msg_next_id;

        $result_insert_message = $controllers->insert("projects_file_repository", "`repository_msg_code`,`repository_msg`, `project_id`, `repository_msg_status`, `msg_sender_user_id`, `msg_sender_user_name`, `file_upload_status`", "'$repository_msg_code','$message', '$get_project_id', 'file_and_message', '$message_sender_user_id', '$message_sender_user_name', 'file_not_uploaded'");

        // after the add of the message add the file


        $result_insert_message = $controllers->insert("projects_file_repository", "`repository_msg_code`,`repository_msg`, `project_id`, `repository_msg_status`, `msg_sender_user_id`, `msg_sender_user_name`, `file_upload_status`, `file_name`", "'$repository_msg_code','$message', '$get_project_id', 'file_and_message', '$message_sender_user_id', '$message_sender_user_name', 'file_not_uploaded', '$file_name'");




        // $result_insert_message = $controllers->insert("projects_file_repository", "`repository_msg_code`,`project_id`, `repository_msg_status`, `msg_sender_user_id`, `msg_sender_user_name`, `file_upload_status`, `file_name`", "'$repository_msg_code', '$get_project_id', 'file_and_message', '$message_sender_user_id', '$message_sender_user_name', 'file_uploaded'");

        // $data['check_repo_msg_id'] = $repository_msg_code;

        






        // $result_insert_message = $controllers->insert("projects_file_repository", "`repository_msg`, `project_id`, `repository_msg_status`, `msg_sender_user_id`, `msg_sender_user_name`, `file_upload_status`, `file_name`", "'$message', '$get_project_id', 'file_and_message', '$message_sender_user_id', '$message_sender_user_name', 'file_uploaded', '$file_name'");


        // if($result_insert_message){
        //   // that means the data has been inserted successfully

        // }


      }
    
      $data['message'] = $message;
      // $data['delete_msg_status'] = '';
      // $data['delete_repository_msg_id'] = '';
      // $data['repository_msg_last_id'] = $repository_msg_last_id;
      // $data['repository_msg_id'] = $repository_msg_next_id;
      // $data['repository_msg_id'] = $repository_msg_last_id + 1;
      $data['message_sender_user_id'] = $message_sender_user_id;
      $data['message_sender_user_name'] = $message_sender_user_name;
      $data['message_status'] = "send";
    //   $data['message'] = 'jai sri ganesh pusher';
    //   $data['message'] = $message;
      // $pusher->trigger("my-channel", "my-event", $data);

      // echo '
      // <script>

      // send_notification("New file repository Message by '. $message_sender_user_name .'", " '. $message .' ");
      
      // </script>';



        // get the last id
        $result_repository_msg_last_id = $controllers->get_the_max_id("repository_msg_id", "projects_file_repository");

        //  $row_total = $result_repository_msg_last_id->fetch_assoc();
 
        while($row = $result_repository_msg_last_id->fetch_assoc()){
 
          $get_the_max_id = $row['max_id'];
 
        }

      $data['repository_msg_id'] = $get_the_max_id;

      $data['repository_msg_last_id'] = $get_the_max_id;





      $pusher->trigger($channel_name, $event_name, $data);

    //   echo $data['message'];





    // if(isset($_POST['send_file_repo_msg'])){
    //     $file_repo_repl_txt = $controllers->pure_data($_POST['file_repo_repl_txt']);
    //     $controllers->send_push_msg("my-channel", "my-event", "$file_repo_repl_txt");
    //     echo $file_repo_repl_txt;
    // }else{
    //     echo 'post not set';
    // }

    



    //   echo 'msg sent';

    //   $pusher->trigger($channel_name, $event_name, $data);
    
    //   $data['message'] = 'hello world';
    //   $pusher->trigger('my-channel', 'my-event', $data);



    // if(isset($_POST['send_file_repo_msg'])){
    //     $file_repo_repl_txt = $this->pure_data($_POST['file_repo_repl_txt']);

    //     // $this->send_push_msg("my-channel", "my-event", "$file_repo_repl_txt");

    //     echo 'file_repo_worked';

    //     // $this->send_push_msg();
    // }



?>