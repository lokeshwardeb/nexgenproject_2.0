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
    
      $data['message'] = $message;
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