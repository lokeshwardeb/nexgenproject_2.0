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


// $message = $controllers->pure_data($_POST['message']);
// $message_sender_user_id = $controllers->pure_data($_POST['message_sender_user_id']);
$get_project_id = $controllers->pure_data($_POST['project_id']);
// $message_sender_user_name = $controllers->pure_data($_POST['message_sender_user_name']);

// event name and channel name
$channel_name = "project_repository";

$event_name = "project_id_" . $get_project_id;


// $message_sender_user_id = $controllers->pure_data($_POST['message_sender_user_id']);
echo $repository_msg_id = $controllers->pure_data($_POST['repository_msg_id']);
// $repository_msg_id = $controllers->pure_data($_POST['repository_msg_id']);

// echo '
// <script>
// console.log("received repo msg id =" + '. $repository_msg_id .'
// </script>
// ';


// check the message sender user id on database
$result_check_sql = $controllers->get_all_data("projects_file_repository", "`repository_msg_id` = '$repository_msg_id'");

if ($result_check_sql) {
  if ($result_check_sql->num_rows > 0) {
    // that means the data exists and the message is already exists and it should continue the process

    // now delete the msg from the database
    $result_delete_msg = $controllers->delete("projects_file_repository", "`repository_msg_id` = '$repository_msg_id'");

    if ($result_delete_msg) {
      // that means the msg has been deleted successfully

      echo "Message has been deleted successfully !!";
      // $data['message'] = '';
      $data['delete_repository_msg_status'] = "deleting successfully";

      $data['delete_msg_status'] = 'msg_deleted';



      // $data['msg_deleted'] = true;

    } else {
      // that means the msg has not been deleted successfully
      $data['delete_repository_msg_status'] = "there was something error while deleting";
      $data['delete_msg_status'] = 'msg_not_deleted';

    }
  }else{
    $data['delete_repository_msg_status'] = "the table was not found";
    $data['delete_msg_status'] = 'msg_table_not_found';

  }
}


// $data['message'] = $message;
$data['message'] ='';
$data['delete_repository_msg_id'] = $repository_msg_id;
// $data['delete_repository_msg_id'] = $repository_msg_id;
// $data['delete_msg_status'] = 'hi';
// $data['delete_msg_status'] = true;
// $data['message_sender_user_id'] = $message_sender_user_id;
// $data['message_sender_user_name'] = $message_sender_user_name;
$data['message_status'] = "send";
// $data['message'] ='';

//   $data['message'] = 'jai sri ganesh pusher';
//   $data['message'] = $message;
// $pusher->trigger("my-channel", "my-event", $data);

// echo '
// <script>

// send_notification("New file repository Message by '. $message_sender_user_name .'", " '. $message .' ");

// </script>';



$pusher->trigger($channel_name, $event_name, $data);


?>