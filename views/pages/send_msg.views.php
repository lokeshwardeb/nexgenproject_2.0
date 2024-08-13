<?php


    require './vendor/autoload.php';

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

      $message = $_POST['message'];
      $message_sender_user_id = $_POST['message_sender_user_id'];
    
      $data['message'] = $message;
      $data['message_sender_user_id'] = $message_sender_user_id;
      $data['message_status'] = "send";
    //   $data['message'] = 'jai sri ganesh pusher';
    //   $data['message'] = $message;
      $pusher->trigger("my-channel", "my-event", $data);

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