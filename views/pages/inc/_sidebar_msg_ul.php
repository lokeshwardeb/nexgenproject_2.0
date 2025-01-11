<?php
// check the url

$get_url = parse_url($_SERVER['REQUEST_URI'])['path'];


?>

<ul class="nav">
    <li class="text-center m-auto">
        <a href="/dashboard" class="nav-link text-center mb-4">
            <button type="button" class="btn <?php echo $dashboard_active_class_name ?> text-center sidebar_btn p-2 ">
                Dashboard
            </button>
        </a>
    </li>

    <li class="text-center m-auto">


    <?php

    $user_msg_nav_result = $controllers->get_all_data("users");
    if($user_msg_nav_result->num_rows > 0){
        while($user_msg_nav_row = $user_msg_nav_result->fetch_assoc()){
            echo '
            
            <a href="?msg_user_id='. $user_msg_nav_row['user_id'] .'" class="nav-link text-center mb-4">
            <button type="button" class="btn  text-center 

            ';

            if(isset($_GET['msg_user_id'])){
                $get_msg_navigate_user_id = $_GET['msg_user_id'];

            }else{
                $get_msg_navigate_user_id = '';
            }
            
            switch($get_msg_navigate_user_id){
                case $user_msg_nav_row['user_id'] :
                    echo 'sidebar_btn_active';
                    break;
                case '/meeting_hub':
                    echo 'sidebar_btn_active';
                    break;
                default:
                    break;
            }

            echo '
            sidebar_btn p-2 ">
                '. $user_msg_nav_row['user_name'] .'
            </button>
        </a>
            
            
            ';
        }
    }

    echo '
    
    
    ';


    ?>



        <a href="/meetings" class="nav-link text-center mb-4">
            <button type="button" class="btn  text-center <?php 

            if(isset($_GET['msg_user_id'])){
                $get_msg_navigate_user_id = $_GET['msg_user_id'];

            }else{
                $get_msg_navigate_user_id = '';
            }
            
            switch($get_url){
                case '/messages' . $get_msg_navigate_user_id :
                    echo 'sidebar_btn_active';
                    break;
                case '/meeting_hub':
                    echo 'sidebar_btn_active';
                    break;
                default:
                    break;
            }

            
            ?> sidebar_btn p-2 ">
                Meetings
            </button>
        </a>
    </li>


   

</ul>