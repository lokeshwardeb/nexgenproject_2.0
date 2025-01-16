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



// generate the event name
$communicated_user_ids = [$message_sender_user_id, $message_receiver_user_id];

sort($communicated_user_ids);

$get_event_name = "personal_inbox_send_msg_" . implode("_", $communicated_user_ids);



$event_name = $get_event_name;





// personal_inbox_send_msg_from_3_to_2
// $make_event_name = (string) "personal_inbox_send_msg_from_" . $message_receiver_user_id . "_to_" . $message_sender_user_id;
// $make_event_name = (string) "personal_inbox_send_msg_from_" . $message_sender_user_id . "_to_" . $message_receiver_user_id;
// $make_event_name = "personal_inbox_send_msg_from_" . $message_sender_user_id . "_to_" . $message_receiver_user_id;




// $event_name = $make_event_name;

// get the files if uploaded on the file repo
if ($_FILES['personal_inbox_msg_upload_file']['name'] != '') {
  // that means the upload file was selected and it is not blank
  $file_name = $_FILES['personal_inbox_msg_upload_file']['name'];
  $file_tmp_name = $_FILES['personal_inbox_msg_upload_file']['tmp_name'];

  // file upload dir
  $file_upload_dir = './assets/uploads/personal_inbox_upload/';


  // check if the directory is exist or not
  if(!file_exists($file_upload_dir)){
    // if not exists then create the directory

    mkdir($file_upload_dir);


  }


  // $file_upload_dir = './assets/uploads/project_files_repo_upload/';

  $uploaded_file_dir = $file_upload_dir . $file_name;

  $msg_file_upload_status = false;

  // if(move_uploaded_file($file_tmp_name, $uploaded_file_dir)){
  //   $data['file_uploaded_path'] = $uploaded_file_dir;

  // }

  // upload files
  if (move_uploaded_file($file_tmp_name, $uploaded_file_dir)) {
    $data['file_uploaded_path'] = $uploaded_file_dir;
    $data['file_name'] = $file_name;

    $msg_file_upload_status = true;

  } else {
    $data['file_uploaded_path'] = '';
    $data['file_name'] = '';
  }
  // $data['file_name'] = $file_name;
}




// // start the added the msg_id and the code so that we can add it on the insertion

// get the last id
$result_msg_last_id = $controllers->get_the_max_id("msg_id", "personal_inbox_msg");

//  $row_total = $result_msg_last_id->fetch_assoc();

while ($row = $result_msg_last_id->fetch_assoc()) {

  $msg_last_id = $row['max_id'];
}

//  $msg_last_id = $row_total['msg_id'];





if ($msg_last_id == 0) {
  $msg_next_id = 1;
} else {
  $msg_next_id = $msg_last_id + 1;
}

// $msg_next_id;



// // add the msg_code
// $msg_code = "pronex_repo_msg_" . $msg_next_id;



// // end the added the msg_id and the code so that we can add it on the insertion



if($message != ''){
  // that means the message is not blank
  $result_insert_message = $controllers->insert("personal_inbox_msg", " `msg_sender_id`, `msg_receiver_id`, `msg` ", " '$message_sender_user_id', '$message_receiver_user_id', '$message' ");

}

if($_FILES['personal_inbox_msg_upload_file']['name'] != ''){
  // that means the message file is not blank

  if($msg_file_upload_status || $msg_file_upload_status == true){
    // that means the file has been uploaded successfully

  $result_insert_message = $controllers->insert("personal_inbox_msg", " `msg_sender_id`, `msg_receiver_id`, `file_name`, `file_upload_status` ", " '$message_sender_user_id', '$message_receiver_user_id', '$file_name', 'file_uploaded' ");


  // $result_insert_message = $controllers->insert("personal_inbox_files", " `file_name`, `file_sender_id`, `file_receiver_id` ", " '$file_name', '$message_sender_user_id', '$message_receiver_user_id' ");



    
  }

  // $result_insert_message = $controllers->insert("personal_inbox_files", " `file_name`, `file_sender_id`, `file_receiver_id` ", " '$file_name', '$message_sender_user_id', '$message_receiver_user_id' ");
  

  // $result_insert_message = $controllers->insert("personal_inbox_msg", " `msg_sender_id`, `msg_receiver_id`, `msg` ", " `$message_sender_user_id', '$message_receiver_user_id', '$message' ");

}





$data['message'] = $message;
$data['get_event_name'] = $event_name;

// here the $msg_next_id will be the main msg id as it encounters the msg id which will be added on the msg insertion time
$data['personal_msg_id'] = $msg_next_id;
$data['personal_inbox_msg_id'] = $msg_next_id;
// $data['delete_msg_status'] = '';
// $data['delete_msg_id'] = '';
// $data['msg_last_id'] = $msg_last_id;
// $data['msg_id'] = $msg_next_id;
// $data['msg_id'] = $msg_last_id + 1;
$data['message_sender_user_id'] = $message_sender_user_id;
$data['message_receiver_user_id'] = $message_receiver_user_id;
$data['message_sender_user_name'] = $message_sender_user_name;
$data['message_status'] = "send";
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
