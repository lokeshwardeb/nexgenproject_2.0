<input type="hidden" name="get_loggedin_user_id" id="get_loggedin_user_id" value="<?php echo $_SESSION['user_id']; ?>">


<!-- Button trigger modal -->
<button type="button" class="btn  btn-outline-dark position-relative" data-bs-toggle="modal"
    data-bs-target="#notifications_modal">
    <!-- Launch demo modal -->

    Notifications
    <span class="notification_border_exists " id="notificaiton_border_exists">


    </span>


    <i class="ms-2 fa-regular fa-bell fs-5   "></i>

</button>

<!-- Modal -->
<div class="modal fade" id="notifications_modal" tabindex="-1" aria-labelledby="notifications_modal_label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="notifications_modal_label">Notifications</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notifications" id="show_notifications"></div>
                <div class="notification_not_exists_section text-center  " id="notification_not_exists_section">
                    No new notification
                </div>


                <script>
                    $(document).ready(function () {
                        // Get logged-in user ID
                        var get_loggedin_user_id = $("#get_loggedin_user_id").val();
                        var notification_not_exists_section = $("#notification_not_exists_section")

                        // Enable Pusher logging - don't include this in production
                        Pusher.logToConsole = true;

                        // Construct notification channel
                        var make_channel = `user_notification_${get_loggedin_user_id}`;

                        // Initialize Pusher
                        var pusher = new Pusher('4f9b2dd81bc8677892ac', {
                            cluster: 'ap2'
                        });

                        // Subscribe to the notification channel
                        var channel = pusher.subscribe(make_channel);

                        // Bind event listener for 'user_notification' event
                        channel.bind('user_notification', function (notification_msg) {
                            // Properly log received data for debugging
                            console.log("Notification Data: ", notification_msg);

                            // Check if the notification contains the expected key
                            let notification_key = `user_notification_${get_loggedin_user_id}`;
                            let user_notification_type_key = `user_notification_type_${get_loggedin_user_id}`;

                            if (notification_msg.hasOwnProperty(notification_key)) {
                                let message_content = notification_msg[notification_key];
                                let user_notification_type = notification_msg[user_notification_type_key];


                                // hide the notification_not_exists_section
                                // firstly check if the d-none class exists or not
                                if (!notification_not_exists_section.hasClass("d-none")) {
                                    // that means the class is exists and it should be 
                                    notification_not_exists_section.addClass("d-none")

                                    // notification_not_exists_section.removeClass("d-none");
                                }
                                // else {
                                //     notification_not_exists_section.addClass("d-none")
                                // }

                                // // Display notification in the DOM
                                // $("#show_notifications").append(`
                                //     <div class="notification text-primary text-start ">
                                //         <strong>New  :</strong> ${message_content} <br>
                                //     </div>
                                // `);

                                // $("#notificaiton_border_exists").append(`   
                                //     <span class=" position-absolute top-0 start-100 translate-middle p-2 bg-primary border border-light rounded-circle">
                                //         <span class="visually-hidden">New alerts</span>
                                //     </span>
                                // `);

                                if (user_notification_type == 'personal_inbox_msg') {
                                    let message_sender_user_id = notification_msg[`user_notification_sender_user_id_${get_loggedin_user_id}`];

                                    let message_sender_user_name = notification_msg[`user_notification_sender_user_name_${get_loggedin_user_id}`];


                                    $("#show_notifications").append(`
                                    <div class="notification text-primary text-start ">
                                        <a href="/messages?msg_user_id=${message_sender_user_id}" class="nav-link" >
                                        
                                        <strong>Your have new Message from ${message_sender_user_name} :</strong> ${message_content}
                                        </a>
                                        </div>
                                        <br>
                                `);

                                    $("#notificaiton_border_exists").append(`   
                                    <span class=" position-absolute top-0 start-100 translate-middle p-2 bg-primary border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                `);

                                    // sent the notification
                                    send_notification(`New Message has been ${user_notification_type} sent by: ${message_sender_user_name}`, `${message_content}`, `/messages?msg_user_id=${message_sender_user_id}`);



                                } else {

                                    // Display notification in the DOM
                                    $("#show_notifications").append(`
                                    <div class="notification text-primary text-start ">
                                        <strong>New notification :   </strong> ${message_content} <br>
                                    </div>
                                `);

                                    $("#notificaiton_border_exists").append(`   
                                    <span class=" position-absolute top-0 start-100 translate-middle p-2 bg-primary border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                `);
                                }



                                // $("#show_notifications").append(`
                                //     <div class="notification text-primary text-start ">
                                //         <strong>Your have new Message from  :</strong> ${message_content} <br>
                                //     </div>
                                // `);

                                // $("#notificaiton_border_exists").append(`   
                                //     <span class=" position-absolute top-0 start-100 translate-middle p-2 bg-primary border border-light rounded-circle">
                                //         <span class="visually-hidden">New alerts</span>
                                //     </span>
                                // `);
                                // // sent the notification
                                // send_notification(`New Message has been sent by: ${message_content}`, "' . $notify_msg . '", "/messages?msg_user_id=' . $message_sender_user_id . '");

                            } else {
                                console.warn("Received notification but no matching key found!");
                            }
                        });
                    });


                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>