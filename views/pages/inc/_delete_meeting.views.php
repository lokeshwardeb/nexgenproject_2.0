<?php

require './vendor/autoload.php';

require './config/conn.php';
require './models/models.php';
require './controllers/controllers.php';

$controllers = new controllers;


$meeting_code = $controllers->pure_data($_POST['meeting_code']);

$result_check = $controllers->get_all_data("meetings", "`meeting_code` = '$meeting_code'");

if($result_check){
    if($result_check->num_rows > 0){
        // that means the data is not blank and the data is exists

        // now delete the meeting
        $result_delete_meeting = $controllers->delete("meetings", "`meeting_code` = '$meeting_code'");

        if($result_delete_meeting){
            // that means the meetings has been deleted successfully
            echo "Meeting has been deleted successfully !!";
        }else{
            // that means there was something error while deleting the meeting
            echo "There was something error while deleting the meeting !!";
        }


    }
}






?>