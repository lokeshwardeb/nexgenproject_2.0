<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "Welcome to your inbox";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();
// $controllers->create_new_meeting();
// $controllers->meetings_handler();

?>

<main>
    <div class="dashboard_main_section">
        <div class="row">
            <div class="col-md-3 " style="background-color: white !important;">
                <div class="integrate_desktop_sidebar">
                    <?php

                    require __DIR__ . '/inc/_sidebar_msg.php';
                    // require __DIR__ . '/inc/_sidebar.php';

                    ?>
                </div>

                <div class="integrate_mobile_sidebar">
                    <?php

                    include __DIR__ . '/inc/_mobile_sidebar_msg.php';

                    ?>
                </div>

            </div>
            <div class="col-md-9 cus_bg_main_section_color">
                <div class="main_content_section scrollbar_container">

                    <div class="the_running_main_content montserrat_font">

                        <div class="details_container">

                            <div class="details_container_info">

                                <div class="container">
                                    <div class="title_section">
                                        <div class="section_title fs-4 text-center mt-4 inter-font">
                                            <!-- Message Hub -->
                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section mt-4">
                                    <div class="container m-4 pt-4  pe-5">
                                      <div class="meetings_main_section">
                                        <div class="meetings_content">
                                            <div class="container">
                                                <?php

                                                    $get_msg_user_id = (isset($_GET['msg_user_id']) ? $controllers->pure_data($_GET['msg_user_id']) : '' );

                                                    // get all the data with the user
                                                    $result_get_msg_user_info = $controllers->get_all_data("users", " `user_id` = '$get_msg_user_id' ");

                                                    if($result_get_msg_user_info){
                                                        if($result_get_msg_user_info->num_rows > 0){
                                                            // that means the user exists on the software
                                                            while($row_msg_user_info = $result_get_msg_user_info->fetch_assoc()){
                                                                $get_msg_user_name = $row_msg_user_info['user_name'];
                                                            }
                                                        }else{
                                                            $get_msg_user_name = '';
                                                        }
                                                    }



                                                 if(!isset($_GET['msg_user_id'])){
                                                        echo '
                                                                 <div class="msg_title fs-4 justify-content-center d-flex m-auto border-bottom border-dark  pb-3 inter-font">
                                                                     NexGenProjects for messages
                                                                </div>
                                                        ';
                                                    }else{
                                                        // that means the msg user id is given and it should show that user name
                                                        echo '
                                                        <div class="msg_title fs-4 justify-content-end d-flex m-auto border-bottom border-dark  pb-3 inter-font">
                                                            '. $get_msg_user_name .'
                                                       </div>
                                               ';
                                                    }



                                                ?>

                                           

                                                <div class="msg_main_section">
                                                    <?php

                                                    if(!isset($_GET['msg_user_id'])){
                                                        echo '
                                                        <div class="section_title text-secondary text-center">
                                                        Send and Receive Messages at one place. 
                                                        <br>
                                                        Send messages and get connected with your team members from anywhere !!
                                                    </div>
                                                        ';
                                                    }


                                                    ?>


                                                    <div class="msg_contents">
                                                        <?php
                                                        if(isset($_GET['msg_user_id'])){

                                                            include __DIR__ . '/inc/_personal_inbox_msg_components.php';

                                                            // include __DIR__. '/inc/inbox_msg_inc.php';
                                                            // include __DIR__. '/inc/personal_inbox_messages.views.php';
                                                        }

                                                        ?>
                                                    </div>


                                                    <!-- <iframe src="https://github.dev/lokeshwardeb/lokeshwarfashionhouse" frameborder="0"></iframe> -->
                                                </div>

                                                <!-- <hr class="bg-dark"/> -->

                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                             


                                


                                
                            </div>

                        </div>





                    </div>


                    
                </div>
            </div>
        </div>
    </div>
</main>

<?php

require_once __DIR__ . '/inc/_footer.php';

require_once __DIR__ . '/inc/_footer_scripts.php';

?>