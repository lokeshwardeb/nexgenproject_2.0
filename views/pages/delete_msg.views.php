<?php


    require './vendor/autoload.php';

    require './config/conn.php';
    require './models/models.php';
    require './controllers/controllers.php';

    $controllers = new controllers;


    // $message_sender_user_id = $controllers->pure_data($_POST['message_sender_user_id']);
    $repository_msg_id = $controllers->pure_data($_POST['repository_msg_id']);

    // echo '
    // <script>
    // console.log("received repo msg id =" + '. $repository_msg_id .'
    // </script>
    // ';


      // check the message sender user id on database
      $result_check_sql = $controllers->get_all_data("projects_file_repository", "`repository_msg_id` = '$repository_msg_id'");

      if($result_check_sql){
        if($result_check_sql->num_rows > 0){
          // that means the data exists and the message is already exists and it should continue the process

          // now delete the msg from the database
          $result_delete_msg = $controllers->delete("projects_file_repository", "`repository_msg_id` = '$repository_msg_id'");

          if($result_delete_msg){
            // that means the msg has been deleted successfully

            echo "Message has been deleted successfully !!";

            // $data['msg_deleted'] = true;

          }
        }
      }
  

    ?>