
<input type="hidden" name="get_loggedin_user_id" id="get_loggedin_user_id" value="<?php echo $_SESSION['user_id']; ?>" >


<!-- Button trigger modal -->
<button type="button" class="btn  btn-outline-dark position-relative" data-bs-toggle="modal"
    data-bs-target="#notifications_modal">
    <!-- Launch demo modal -->

    Notifications
    <span class=" position-absolute top-0 start-100 translate-middle p-2 bg-primary border border-light rounded-circle">
        <span class="visually-hidden">New alerts</span>
    </span>


    <i class="ms-2 fa-regular fa-bell fs-5   "></i>

</button>

<!-- Modal -->
<div class="modal fade" id="notifications_modal" tabindex="-1" aria-labelledby="notifications_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="notifications_modal_label">Notifications</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notifications" id="show_notifications"></div>
                <script>

                    var get_loggedin_user_id = $("#get_loggedin_user_id").val();

                    // Enable pusher logging - don't include this in production
                    Pusher.logToConsole = true;

                    var make_channel = `user_notification_${get_loggedin_user_id}`;

                    var pusher = new Pusher('4f9b2dd81bc8677892ac', {
                        cluster: 'ap2'
                    });

                    // var channel = pusher.subscribe(`user_notification_${get_loggedin_user_id}`);
                    var channel = pusher.subscribe(make_channel);
                    channel.bind('user_notification', function (notification_msg) {

                    // var make_channel = `user_notification_${get_loggedin_user_id}`;
                        let get_user_info =(String) `user_notification_${get_loggedin_user_id}`;

                        // data.forEach(element => {
                        // $("#show_notifications").append(element);
                            
                        // });
                        // console.log(get_user_info)

                        const get_console =  `${notification_msg}.${get_user_info}`;

                        console.log(get_console)

// df
                        // console.log(notification_msg.data)
                        // console.log(notification_msg.get_user_info)

                        // console.log(make_channel)

                        // dfd
                        // console.log(`${notification_msg.make_channel}`);
                        // console.log(notification_msg.user_notification_2);

                        // console.log(notification_msg)

                        // $("#show_notifications").append(data.notification_msg)
                        // alert(JSON.stringify(data));
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