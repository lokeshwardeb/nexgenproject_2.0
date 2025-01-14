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
$message_receiver_user_id = $controllers->pure_data($_POST['message_receiver_user_id']);
// $get_project_id = $controllers->pure_data($_POST['project_id']);
$message_sender_user_name = $controllers->pure_data($_POST['message_sender_user_name']);

$channel_name = "personal_inbox_msg";

$event_name = "personal_inbox_send_msg_from_" . $message_sender_user_id . "_to_" . $message_receiver_user_id;



$get_delete_msg_id = $controllers->pure_data($_POST['delete_msg_id']);
$get_delete_file_uploaded_path = $controllers->pure_data($_POST['file_uploaded_path']);
$data['delete_personal_msg_id'] = $get_delete_msg_id;


// firstly check if the file exists on the uploaded path
if(file_exists($get_delete_file_uploaded_path)){
  // if exists then remove it from the software

  unlink($get_delete_file_uploaded_path);

  
  // echo "Message has been deleted successfully !!";
  // // $data['message'] = '';
  // $data['delete_repository_msg_status'] = "deleting successfully";

  // $data['delete_msg_status'] = 'msg_deleted';




}




// now delete the msg from the software
$result_delete_msg = $controllers->delete("personal_inbox_msg", "`msg_id` = '$get_delete_msg_id'");

if($result_delete_msg){
  // that means the file has been deleted successfully
  
  echo "Message has been deleted successfully !!";
  // $data['message'] = '';
  $data['delete_repository_msg_status'] = "deleting successfully";
 

  $data['delete_msg_status'] = 'msg_deleted';


}else{
    // that means the msg has not been deleted successfully
    $data['delete_repository_msg_status'] = "there was something error while deleting";
    $data['delete_msg_status'] = 'msg_not_deleted';
}







// // start the added the msg_id and the code so that we can add it on the insertion

// // get the last id
// $result_msg_last_id = $controllers->get_the_max_id("msg_id", "personal_inbox_msg");

// //  $row_total = $result_msg_last_id->fetch_assoc();

// while ($row = $result_msg_last_id->fetch_assoc()) {

//   $msg_last_id = $row['max_id'];
// }

// //  $msg_last_id = $row_total['msg_id'];





// if ($msg_last_id == 0) {
//   $msg_next_id = 1;
// } else {
//   $msg_next_id = $msg_last_id + 1;
// }


// // add the msg_code
// $msg_code = "pronex_repo_msg_" . $msg_next_id;



// // end the added the msg_id and the code so that we can add it on the insertion








$data['message'] = $message;
// $data['delete_msg_status'] = '';
// $data['delete_msg_id'] = '';
// $data['msg_last_id'] = $msg_last_id;
// $data['msg_id'] = $msg_next_id;
// $data['msg_id'] = $msg_last_id + 1;
$data['message_sender_user_id'] = $message_sender_user_id;
$data['message_sender_user_name'] = $message_sender_user_name;
$data['message_status'] = "send";

$data['delete_personal_msg_id'] = $get_delete_msg_id;


//   $data['message'] = 'jai sri ganesh pusher';
//   $data['message'] = $message;
// $pusher->trigger("my-channel", "my-event", $data);

// echo '
// <script>

// send_notification("New file repository Message by '. $message_sender_user_name .'", " '. $message .' ");

// </script>';



// // get the last id
// $result_msg_last_id = $controllers->get_the_max_id("msg_id", "project_discussions");

// //  $row_total = $result_msg_last_id->fetch_assoc();

// while ($row = $result_msg_last_id->fetch_assoc()) {

//   $get_the_max_id = $row['max_id'];
// }

// $data['msg_id'] = $get_the_max_id;

// $data['msg_last_id'] = $get_the_max_id;





$pusher->trigger($channel_name, $event_name, $data);
