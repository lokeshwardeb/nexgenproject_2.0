<style>
    .msg_container {
        /* max-height: 200px; Adjust as needed */
        max-height: 50vh;
        overflow-y: auto;
        padding: 10px;
        border: 1px solid #ccc;
        /* background-color: #ddd; */
        /* background-color: #f9f9f9; */
    }

    .received_msg {
        margin-bottom: 10px;
        padding: 8px;
        /* background-color: #e1ffc7; */
        /* background-color: #D9FDD3 !important; */
        background-color: white !important;
        border-radius: 5px;
    }

    .sended_msg {
        margin-bottom: 10px;
        padding: 8px;
        /* background-color: #e1ffc7; */
        /* background-color: #D9FDD3 !important; */
        /* background-color: white !important; */
        background-color: #D9FDD3 !important;
        border-radius: 5px;
    }

    .details_container_info {
        height: auto !important;
    }

    /* scrollbar customization starts here */

    /* width */
    ::-webkit-scrollbar {
        width: 20px;
        /* width: 15px; */
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        /* background: red;  */
        background: var(--cus-primary-color);
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #b30000;
    }

    /* scrollbar customization ends here */
</style>

<?php

echo $get_current_user_id = $_SESSION['user_id'];
$get_current_user_name = $_SESSION['username'];

$get_msg_receiver_user_id = $controllers->pure_data($_GET['msg_user_id']);

// first set the msg receiver user name as a blank
$get_msg_receiver_user_name = "";

// now get the received user name by the received user id
$result_msg_receiver_user_name = $controllers->get_all_data("users", " `user_id` = '$get_msg_receiver_user_id' ");

if ($result_msg_receiver_user_name) {
    if ($result_msg_receiver_user_name->num_rows > 0) {
        // that means the user is exists on the software
        while ($row_recived_msg_user = $result_msg_receiver_user_name->fetch_assoc()) {
            $get_msg_receiver_user_name = $row_recived_msg_user['user_name'];
        }
    }
}



?>


<div class="files_repository_main_section mt-4 pt-4 mb-4 pb-4">


    <div class="main_file_repository_section">
        <div class="msg_main_section">
            <div class="container">
                <div class="msg_container" id="messages">
                    <?php

                    // $sql_inbox_msg_join = " SELECT pim.msg_id, pim.msg_sender_id, pim.msg_receiver_id, pim.msg, pim.msg_seen_by_receiver_status, pif.file_name FROM personal_inbox_msg pim LEFT JOIN personal_inbox_files pif ON pim.msg_receiver_id = pif.file_receiver_id WHERE (pim.msg_sender_id = '3' AND pim.msg_receiver_id = '1') OR (pim.msg_sender_id = '1' AND pim.msg_receiver_id = '3') ";
                    


                    // $sql_inbox_msg_join = " SELECT pim.msg_id, pim.msg_sender_id, pim.msg_receiver_id, pim.msg, pim.msg_seen_by_receiver_status, pif.file_name FROM personal_inbox_msg pim LEFT JOIN personal_inbox_files pif ON pim.msg_receiver_id = pif.file_receiver_id WHERE (pim.msg_sender_id = '$get_current_user_id' AND pim.msg_receiver_id = '$get_msg_receiver_user_id') OR (pim.msg_sender_id = '$get_msg_receiver_user_id' AND pim.msg_receiver_id = '$get_current_user_id') ";
                    


                    $sql_inbox_msg_join = " SELECT * FROM `personal_inbox_msg` WHERE (`msg_sender_id` = '$get_current_user_id' AND `msg_receiver_id` = '$get_msg_receiver_user_id') OR (`msg_sender_id` = '$get_msg_receiver_user_id' AND `msg_receiver_id` = '$get_current_user_id'); ";

                    $result_inbox_msg_join = $controllers->create_sql_query($sql_inbox_msg_join);

                    if ($result_inbox_msg_join) {
                        if ($result_inbox_msg_join->num_rows > 0) {
                            // that means the msg and msg file is exists
                    
                            while ($row_inbox_msg_join = $result_inbox_msg_join->fetch_assoc()) {
                                $db_msg_id = $row_inbox_msg_join['msg_id'];
                                $db_msg = $row_inbox_msg_join['msg'];
                                $db_msg_sender_id = $row_inbox_msg_join['msg_sender_id'];
                                $db_msg_receiver_id = $row_inbox_msg_join['msg_receiver_id'];
                                $db_msg_seen_by_receiver_status = $row_inbox_msg_join['msg_seen_by_receiver_status'];
                                $db_msg_file_name = $row_inbox_msg_join['file_name'];
                                $db_msg_file_upload_status = $row_inbox_msg_join['file_upload_status'];

                                // get the receiver user name
                    
                                // check if the msg was sended by the current user or not
                                if ($db_msg_sender_id == $get_current_user_id) {
                                    // that means this msg was send by the current user

                                    if($db_msg !='' || $db_msg_file_upload_status == ''){
                                        // that means the file has been uploaded successfully
                                        echo '
                                        <div class="parent_msg sended_msg shadow m-4 msg_id_241 " id="msg_id_241">
                                              <div class="msg_sender_user_name text-primary">' . $get_current_user_name . '</div>
                                                          <div class="main_msg_section d-flex">
                                                              <div class="msg">' . $db_msg . '</div>
                                                              <div class="delete_button"><button type="button" onclick="delete_msg(this)"
                                                                      data-repository_msg_id="241" class="btn ms-4  btn-sm btn-outline-danger">Delete
                                                                      Button</button></div>
                                                          </div>
                                          </div>
                                  ';
                                        

                                    }

                                    if($db_msg == '' || $db_msg_file_upload_status == 'file_uploaded'){
                                        // that means the file has been uploaded and it is a file
                                         // that means it is a file and it should show perfectly
                                         echo '
                                            
                                         <div class="parent_msg sended_msg shadow m-4 msg_id_301 " id="msg_id_301">
                                             <div class="msg_sender_user_name text-primary">c</div>
                                             <div class="main_msg_section d-flex">
                                                 <div class="msg_file msg"><a
                                                         href="./assets/uploads/personal_inbox_upload/'. $db_msg_file_name .'"
                                                         download="">
                                                         
                                                         <span>'. $db_msg_file_name .'</span>
                                                         
                                                         <i class="fa-solid fa-file ps-4 fs-4"></i>
                                                         
                                                     </a></div>
                                                 <div class="delete_button"><button type="button" onclick="delete_msg(this)"
                                                         data-file_uploaded_path="./assets/uploads/personal_inbox_upload/'. $db_msg_file_name .'"
                                                         data-repository_msg_id="301" class="btn ms-4  btn-sm btn-outline-danger">Delete
                                                         Button</button></div>
                                             </div>
                                         </div>
                     
                                                             ';
                                    }


                                } elseif ($db_msg_receiver_id == $get_msg_receiver_user_id) {
                                    // that means the msg was send from the receiver user (who is not the current user)
                    echo "received";
                                    // firstly, get the user name for that user
                                    $result_get_msg_received_user_info = $controllers->get_all_data("users", " `user_id` = '$get_msg_receiver_user_id' ");

                                    if ($result_get_msg_received_user_info) {
                                        if ($result_get_msg_received_user_info->num_rows > 0) {
                                            // that means the user is exists on the software
                    
                                            while ($row_msg_received_user = $result_get_msg_received_user_info->fetch_assoc()) {
                                                $msg_received_user_name = $row_msg_received_user['user_name'];
                                            }


                                        }
                                    }

                                    // check if the data is msg not blank
                                    if ($db_msg != '' || $db_msg_file_upload_status == '') {
                                        // that means it is msg and it should show perfectly
                                        // now show the msg box and the msg which has been received form the user
                                        echo '

                                        
                                    <div class="parent_msg received_msg shadow m-4 msg_id_239 " id="msg_id_239">
                                        <div class="msg_sender_user_name text-primary">' . $msg_received_user_name . '</div>
                                        <div class="msg">' . $db_msg . '</div>
                                    </div>
                                ';

                                    }

                                    // check if the data is file or not
                                    if ($db_msg_file_upload_status == 'file_uploaded' || $msg == '') {
                                        // that means it is a file and it should show perfectly
                                        echo '
                                            
                    <div class="parent_msg sended_msg shadow m-4 msg_id_301 " id="msg_id_301">
                        <div class="msg_sender_user_name text-primary">c</div>
                        <div class="main_msg_section d-flex">
                            <div class="msg_file msg"><a
                                    href="./assets/uploads/personal_inbox_upload/'. $db_msg_file_name .'"
                                    download="">
                                    
                                    <span>'. $db_msg_file_name .'</span>
                                    
                                    <i class="fa-solid fa-file ps-4 fs-4"></i>
                                    
                                </a></div>
                            <div class="delete_button"><button type="button" onclick="delete_msg(this)"
                                    data-file_uploaded_path="./assets/uploads/personal_inbox_upload/'. $db_msg_file_name .'"
                                    data-repository_msg_id="301" class="btn ms-4  btn-sm btn-outline-danger">Delete
                                    Button</button></div>
                        </div>
                    </div>

                                        ';
                                    }




                                }
                            }

                        } else {
                            // that means there has no msg and it should show the no msg found info
                            echo '
                            <div class="section_title text-secondary p-4 text-center" id="no_msg_section" >
                            No messages has been found
                            <br>
                            Send messages and get connected with ' . $get_msg_receiver_user_name . ' !!
                        </div>
                            ';
                        }
                    }

echo "check"


                    ?>


                    <!-- <div class="parent_msg sended_msg shadow m-4 msg_id_301 " id="msg_id_301">
                        <div class="msg_sender_user_name text-primary">c</div>
                        <div class="main_msg_section d-flex">
                            <div class="msg_file msg"><a
                                    href="./assets/uploads/project_files_repo_upload/stack_choosing_guidelines.pdf"
                                    download="">stack_choosing_guidelines.pdf <i class="fa-solid fa-file ps-4 fs-4"></i>
                                    Font Awesome fontawesome.com
                                </a></div>
                            <div class="delete_button"><button type="button" onclick="delete_msg(this)"
                                    data-file_uploaded_path="./assets/uploads/project_files_repo_upload/stack_choosing_guidelines.pdf"
                                    data-repository_msg_id="301" class="btn ms-4  btn-sm btn-outline-danger">Delete
                                    Button</button></div>
                        </div>
                    </div> -->



                    <!-- 
                    <div class="parent_msg received_msg shadow m-4 msg_id_239 " id="msg_id_239">
                        <div class="msg_sender_user_name text-primary">birt</div>
                        <div class="msg">jai sri ganesh</div>
                    </div>
                    <div class="parent_msg sended_msg shadow m-4 msg_id_241 " id="msg_id_241">
                        <div class="msg_sender_user_name text-primary">c</div>
                        <div class="main_msg_section d-flex">
                            <div class="msg">hi</div>
                            <div class="delete_button"><button type="button" onclick="delete_msg(this)"
                                    data-repository_msg_id="241" class="btn ms-4  btn-sm btn-outline-danger">Delete
                                    Button</button></div>
                        </div>
                    </div> -->








                    <!-- <div class="received_msg shadow m-4">Message 1</div>
                                                        <div class="received_msg shadow m-4">
                                                            <div>
                                                                <a href="./assets/uploads/project_files_repo_upload/Projects.jpg"
                                                                    download="">Message 2</a>
                                                            </div>
                                                        </div> -->
                </div>


                <div class="repl_section">
                    <form id="submit_form">
                        <textarea name="message" id="msg_to_send" placeholder="Write your file description"
                            class="form-control mt-4 mb-4" cols="30" rows="5"></textarea>
                        <input type="text" value="<?php echo $get_current_user_id; ?>" name="message_sender_user_id"
                            id="message_sender_user_id">
                        <input type="text" value="<?php echo $get_msg_user_id ?>" name="message_receiver_user_id"
                            id="message_receiver_user_id">

                        <!-- <input type="hidden" id="project_id" name="project_id" value="6"> -->
                        <!-- <input type="hidden" name="event_name" id="event_name" value="project_id_6"> -->

                        <input type="text" name="event_name" id="event_name"
                            value="personal_inbox_send_msg_from_<?php echo $_SESSION['user_id'] ?>_to_<?php echo $_GET['msg_user_id']; ?>">

                        <input type="text" value="<?php echo $get_current_user_id; ?>" name="current_user_id"
                            id="current_user_id">

                        <input type="hidden" value="c" name="message_sender_user_name" id="message_sender_user_name">


                        <input type="file" name="personal_inbox_msg_upload_file" class="form-control"
                            id="personal_inbox_msg_upload_file">
                        <button name="send_personal_inbox_msg" type="submit" class="btn btn-outline-primary mt-4 btn-sm"
                            id="msg_submit">Submit</button>
                    </form>
                </div>

                <div class="file_run_main_onload_codes">
                    <script>
                        function scrollToBottom() {
                            var messages = document.getElementById('messages');
                            if (messages) {
                                messages.scrollTop = messages.scrollHeight;
                            }
                        }

                        window.onload = scrollToBottom();
                    </script>
                </div>

                <script>
                    // Enable pusher logging - don't include this in production
                    Pusher.logToConsole = true;

                    var pusher = new Pusher('4f9b2dd81bc8677892ac', {
                        cluster: 'ap2'
                    });

                    var event_name = $("#event_name").val();

                    // var channel = pusher.subscribe('my-channel');
                    var channel = pusher.subscribe('personal_inbox_msg');
                    // var channel = pusher.subscribe('project_repository');

                    // pusher.trigger("my-channel", "my-event", { message: "hello world" });
                    // pusher.trigger("my-channel", "my-event", { message: "hello world" });


                    channel.bind(event_name, function (data) {
                        // channel.bind('my-event', function (data) {

                        // test
                        // alert(data.check_repo_msg_id);

                        //    alert(data.delete_msg_status)

                        // if(data.delete_msg_status !=''){

                        //     // pusher.bi


                        //     alert("hello world")

                        // }

                        // alert(data.repository_msg_last_id)



                        var get_msg_sender_user_id = data.message_sender_user_id;
                        var get_msg_receiver_user_id = data.message_receiver_user_id;
                        var get_current_user_id = $("#current_user_id").val()

                        if (get_msg_sender_user_id == get_current_user_id) {
                            // that means the message is sent by my (current loggedin user)
                            // add the message sender user_name
                            //  $("#messages").append('<div class="mt-4 ms-4  text-primary">'+ data.message_sender_user_name +'</div>')


                            // check if the delete data is exists or not



                            if (data.message != '') {



                                $("#messages").append('<div class="parent_msg sended_msg shadow m-4 msg_id_' + data.repository_msg_id + ' " id="msg_id_' + data.repository_msg_id + '"><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="main_msg_section d-flex"><div class="msg">' + data.message + '</div><div class="delete_button"><button type="button" onclick="delete_msg(this)" data-repository_msg_id="' + data.repository_msg_id + '"  class="btn ms-4  btn-sm btn-outline-danger">Delete Button</button></div></div></div></div>');




                            }

                            if (data.file_uploaded_path != undefined || data.file_name != undefined) {
                                // if the data_uploaded_path is not set and if data file name is not set

                                // main code demo

                                // $("#messages").append('<div class="parent_msg sended_msg shadow m-4"><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="msg_file msg"><a href="' + data.file_uploaded_path + '" download="" >' + data.file_name + ' <i class="fa-solid fa-file ps-4 fs-4"></i> </a></div>')



                                // $("#messages").append('<div class="parent_msg sended_msg shadow m-4 msg_id_' + data.repository_msg_id + ' " id="msg_id_' + data.repository_msg_id + '"><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="main_msg_section d-flex"><div class="msg">' + data.message + '</div><div class="delete_button"><button type="button" onclick="delete_msg(this)" data-repository_msg_id="' + data.repository_msg_id + '"  class="btn ms-4  btn-sm btn-outline-danger">Delete Button</button></div></div></div>');

                                $("#messages").append('<div class="parent_msg sended_msg shadow m-4 msg_id_' + data.repository_msg_id + ' " id="msg_id_' + data.repository_msg_id + '"><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="main_msg_section d-flex"><div class="msg_file msg"><a href="' + data.file_uploaded_path + '" download="" >' + data.file_name + ' <i class="fa-solid fa-file ps-4 fs-4"></i> </a></div><div class="delete_button"><button type="button" onclick="delete_msg(this)" data-file_uploaded_path="./assets/uploads/project_files_repo_upload/' + data.file_name + '" data-repository_msg_id="' + data.repository_msg_id + '"  class="btn ms-4  btn-sm btn-outline-danger">Delete Button</button></div></div></div></div>');




                                // $("#messages").append('<div class="parent_msg sended_msg shadow m-4"><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="msg_file msg"><a href="' + data.file_uploaded_path + '" download="" >' + data.file_name + ' <i class="fa-solid fa-file ps-4 fs-4"></i> </a></div>')




                                $("#personal_inbox_msg_upload_file").val("");
                            }

                            // send_notification('New file repository Message by : '+ data.message_sender_user_name , data.message, "/project_discussions?project_id=6");

                            // send_notification("New file repository Message by "+ $message_sender_user_name +", " '. $message .' ");



                            // // add the message sender user_name
                            // $("#messages").append('<div class="m-4">'+ data.message_sender_user_name +'</div>')



                            // $("#messages").append('<div class="sended_msg shadow m-4 p-4 "><a href="'+ data.file_uploaded_path +'" download="" >'+ data.file_name +' <i class="fa-solid fa-file ps-4 fs-4"></i> </a></div>')
                            //     // $("#messages").append('<div class="sended_msg shadow m-4""><a href="'+ data.file_uploaded_path +'" download="" >'+ data.file_name +'</a></div>')
                            //     $("#personal_inbox_msg_upload_file").val("");

                            // $("#messages").append('<div><a href="'+ data.file_uploaded_path +'" download="" >'+ data.file_name +'</a></div>')
                            // $("#personal_inbox_msg_upload_file").val("");

                            scrollToBottom()
                            $("#msg_to_send").val("")

                        } else {
                            // that means the message is not sent by me (current loggedin user)
                            if (data.message != '') {

                                $("#messages").append('<div class="parent_msg received_msg shadow m-4 msg_id_' + data.repository_msg_id + '" id="msg_id_' + data.repository_msg_id + '"><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="msg">' + data.message + '</div></div>')
                                // $("#messages").append('<div class="parent_msg received_msg shadow m-4"><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="msg">' + data.message + '</div></div>')

                                // $("#messages").append('<div class="parent_msg sended_msg shadow m-4 msg_id_' + data.repository_msg_id + ' " id="msg_id_' + data.repository_msg_id + '"><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="main_msg_section d-flex"><div class="msg">' + data.message + '</div></div></div>');


                                // send the notification
                                send_notification('New Message was sent on file repository by : ' + data.message_sender_user_name, data.message, "/project_discussions?project_id=6");



                                // $("#messages").append('<div class="received_msg shadow m-4">' + data.message + '</div>')

                            }
                            // $("#messages").append('<div class="received_msg shadow m-4">' + data.message + '</div>')
                            if (data.file_uploaded_path != undefined || data.file_name != undefined) {
                                // if the data_uploaded_path is not set and if data file name is not set




                                // $("#messages").append('<div class="parent_msg received_msg shadow m-4 msg_id_' + data.repository_msg_id + ' " id="msg_id_' + data.repository_msg_id + '" ><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="msg_file msg"><a href="' + data.file_uploaded_path + '" download="" >' + data.file_name + ' <i class="fa-solid fa-file ps-4 fs-4"></i> </a></div>')

                                $("#messages").append('<div class="parent_msg received_msg shadow m-4 msg_id_' + data.repository_msg_id + ' " id="msg_id_' + data.repository_msg_id + '" ><div class="msg_sender_user_name text-primary">' + data.message_sender_user_name + '</div><div class="msg_file msg"><a href="' + data.file_uploaded_path + '" download="" >' + data.file_name + ' <i class="fa-solid fa-file ps-4 fs-4"></i> </a></div>')


                                // $("#messages").append('<div class="received_msg shadow m-4 p-4 "><a href="'+ data.file_uploaded_path +'" download="" >'+ data.file_name +' <i class="fa-solid fa-file ps-4 fs-4"></i> </a></div>')
                                // $("#messages").append('<div class="sended_msg shadow m-4""><a href="'+ data.file_uploaded_path +'" download="" >'+ data.file_name +'</a></div>')
                                $("#personal_inbox_msg_upload_file").val("");

                                // send the file upload notification
                                send_notification('New File was uploaded on file repository by : ' + data.message_sender_user_name, data.message, "/project_discussions?project_id=6");
                            }

                            //  // add the message sender user_name
                            //  $("#messages").append('<div class="m-4">'+ data.message_sender_user_name +'</div>')

                            // send_notification('New Message was sent on file repository by : '+ data.message_sender_user_name , data.message, "/project_discussions?project_id=6");


                            scrollToBottom()
                        }



                        // check the pusher delete message status 

                        console.log("the delete msg is : " + data.delete_msg_status)

                        // var msg_id_element = $("#msg_id_" + delete_repository_msg_id);
                        var msg_id_element = $(".msg_id_" + delete_repository_msg_id);

                        console.log(msg_id_element)

                        if (data.delete_msg_status == 'msg_deleted') {

                            // alert("alert activated")
                            // that means the msg has been deleted successfully !

                            // get the id so that we can delete the msg

                            // alert(data.delete_repository_msg_id)

                            // check this alert on for debuging the delete repo msg error
                            // alert(data.delete_repository_msg_status)

                            // var get_repository_msg_id = self.getAttribute("data-repository_msg_id");

                            var delete_repository_msg_id = data.delete_repository_msg_id;

                            console.log(delete_repository_msg_id)

                            var del_msg_id = "msg_id_" + delete_repository_msg_id;
                            // var get_del_id = $("#" + del_msg_id);
                            var get_del_id = $("." + del_msg_id);




                            if (get_del_id.hasClass("sended_msg")) {
                                get_del_id.html("")
                                get_del_id.addClass("d-none")


                            } else if (get_del_id.hasClass("received_msg")) {
                                get_del_id.html("")
                                get_del_id.addClass("d-none")
                            }






                            // var del_msg_id = "msg_id_" + delete_repository_msg_id;

                            // $("#" + del_msg_id).addClass("d-none");
                            // $("#" + del_msg_id).html("")


                            // $("#" + del_msg_id).removeClass("sended_msg")
                            // $("#" + del_msg_id).removeClass("received_msg")
                            // if ($("#" + del_msg_id).hasClass("sended_msg")) {

                            //     $("#" + del_msg_id).removeClass("sended_msg");
                            //     $("#" + del_msg_id).addClass("d-none");
                            //     $("#" + del_msg_id).html("")



                            // } else if ($("#" + del_msg_id).hasClass("received_msg")) {

                            //     $("#" + del_msg_id).removeClass("sended_msg");
                            //     $("#" + del_msg_id).addClass("d-none");
                            //     $("#" + del_msg_id).html("")



                            // } 
                            // else {
                            //     // that means the sended_msg or the received_msg is not exists and it should remove the html only

                            //     // alert("something went wrong, the classes not exits !!")
                            //     alert("else runs!!")

                            //     $("#" + del_msg_id).addClass("d-none");
                            //     $("#" + del_msg_id).html("")

                            //     $(".msg_id_undefined").addClass("d-none");
                            //     $(".msg_id_undefined").html("")




                            // }
                            // $("#" + del_msg_id).html("")



                            // console.log("delete repo msg id : " + delete_repository_msg_id)

                            // data.delete_msg_status = '';

                            // console.log("the last msg status" + data.delete_msg_status);
                            // console.log("the last msg status" + data.delete_msg_status);

                            var msg_id_element = $("#msg_id_" + delete_repository_msg_id);

                            console.log(msg_id_element)


                            // var remove_class = $("#msg_id_" + delete_repository_msg_id).removeClass("sended_msg")

                            // var remove_html = $("#msg_id_" + delete_repository_msg_id).html("")

                            // console.log("the main element" + msg_id_element)

                            // console.log("msg class = " + remove_class)
                            // console.log("msg html = " + remove_html)



                            // $("#msg_id_" + get_repository_msg_id).removeClass("sended_msg")

                            // $("#msg_id_" + get_repository_msg_id).html("")
                            // var get_delete_msg_id = $("#msg_id_" + data.delete_repository_msg_id).val("")

                            // var delete_msg_id = $("#delete_repository_msg_id").val('')
                            // var delete_msg_id = $("#delete_repository_msg_id").val('')

                            // pusher.bi


                            // alert(data.delete_msg_status)

                        }

                        else {
                            // that means there was something error with the delete msg features
                            // alert("There was something error while deleting the msg , msg data not exist !!")
                        }



                    });
                </script>

                <script>

                    // function delete_msg(self){
                    //     var get_repository_msg_id = self.getAttribute("data-repository_msg_id");
                    //     console.log(get_repository_msg_id)

                    //     $.ajax({
                    //         type: "POST",
                    //         url: "/delete_msg",
                    //         data: {repository_msg_id: get_repository_msg_id},
                    //         // dataType: "dataType",
                    //         success: function (response) {
                    //             console.log(response)
                    //             // if(response != ''){
                    //             //     success_alert("Success !!", response.data)
                    //             // }
                    //         }
                    //     });

                    // }


                    function delete_msg(self) {
                        var get_repository_msg_id = self.getAttribute("data-repository_msg_id");
                        var get_file_uploaded_path = self.getAttribute("data-file_uploaded_path");
                        // console.log(get_repository_msg_id);

                        var project_id = $("#project_id").val()

                        // alert("passed repo id =>" + get_repository_msg_id + "file uploaded file =>" + get_file_uploaded_path);

                        $.ajax({
                            type: "POST",
                            // url: "/delete_msg",
                            url: "/project_discussion_delete_msg",
                            data: { delete_repository_msg_id: get_repository_msg_id, project_id: project_id, file_uploaded_path: get_file_uploaded_path },
                            // dataType: "dataType",
                            success: function (response) {
                                console.log(response)

                                console.log(this)
                                console.log(self)
                                // console.log(self.parent())

                                $("#msg_id_" + get_repository_msg_id).removeClass("sended_msg");

                                $("#msg_id_" + get_repository_msg_id).html("")

                                console.log("sended repo msg id =>" + get_repository_msg_id)

                                // alert(response)






                                if (response != '') {
                                    // success_alert("Success !!", response)
                                }
                            }
                        });

                    }

                    $(document).ready(function () {


                        // if()



                        $("#submit_form").on("submit", function (e) {
                            e.preventDefault();

                            // firstly remove the msg if it is the first msg to the users

                            $("#no_msg_section").addClass("d-none");


                            var msg_to_send = $("#msg_to_send").val();
                            var message_sender_user_id = $("#message_sender_user_id").val();
                            var message_receiver_user_id = $("#message_receiver_user_id").val();
                            var personal_inbox_msg_upload_file = $("#personal_inbox_msg_upload_file").val();

                            var message_sender_user_name = $("#message_sender_user_name").val();

                            var msg_submit_spinner = $("#msg_submit").html('<div class="spinner-border" style="width: 1.5rem; height: 1.5rem;" role="status"><span class="visually-hidden">Loading...</span></div>');

                            $("#msg_submit").attr("disabled", "disabled");
                            // $("#msg_submit").removeAttr("disabled");

                            // $("#msg_submit").attr("disabled", "disabled");
                            // $("#msg_submit").removeAttr("disabled");

                            // var msg_submit_spinner = $("#msg_submit").html('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>')

                            if (msg_to_send == '' && personal_inbox_msg_upload_file == '') {
                                // that means if the message and upload file both are blank then it should through an error
                                danger_alert("Hey, your message is empty and you have not selected any file !!", "You have to write some message or select some files to upload and send !!");

                                $("#msg_submit").html("");
                                $("#msg_submit").text("Submit");
                                $("#msg_submit").removeAttr("disabled");

                                return;
                            } else {
                                var formData = new FormData(this);
                                // that means that the message is not blank
                                $.ajax({
                                    type: "POST",
                                    // url: "/send_msg",
                                    // url: "/send_msg",
                                    url: "/personal_inbox_send_msg",
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function (response) {
                                        // success_alert("Message Sent", response);
                                        $("#msg_to_send").val("");
                                        $("#personal_inbox_msg_upload_file").val("");
                                        $("#msg_submit").html("");
                                        $("#msg_submit").text("Submit");

                                        if (response != '') {
                                            // that means there is an error maybe exists !!
                                            danger_alert("Error", response)
                                        }

                                        // $("#msg_submit").attr("disabled", "disabled");
                                        $("#msg_submit").removeAttr("disabled");

                                        scrollToBottom();
                                    },
                                    error: function (xhr, status, error) {
                                        // $("#msg_submit").html("");
                                        // $("#msg_submit").text("Submit");
                                        console.log("Error: " + error);
                                    }
                                });
                            }
                        });
                    });
                </script>


            </div>
        </div>
    </div>

</div>