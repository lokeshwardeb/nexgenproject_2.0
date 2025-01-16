<div class="sidebard_main_section scrollbar_container ">
                    <div class="sidebar_main_contents ">
                        <div class="logo_section d-flex  m-4 mb-5">
                            <img src="/assets/img/nexGenProject_logo_no_bg.png" width="150px" class="img-fluid" alt="">
                            <div class="msg_hub_title_name ms-4 ps-4 fs-4">Chats</div>
                        </div>

                        <hr>

                        <div class="loggedin_user_info_section  m-4 pb-4 ">
                            <div class="container">
                            <div class="user_info text-center  ">
                                <div class="user_name fs-5 fw-bold  "><?php echo $_SESSION['username']; ?></div>
                            </div>
                            </div>
                        </div>

                        <hr>
                        <div class="sidebar_nav_section mt-4 pt-4 ">
                            <?php

                            require __DIR__ . '/_sidebar_msg_ul.php';

                            ?>
                        </div>
                        <hr>

                        <div class="dashboard_return_section mt-4 pt-4 text-center ">
                            <a href="/dashboard" target="_blank" >
                                <button class="btn btn-outline-primary">
                                    Go back to Dashboard
                                </button>
                            </a>
                        </div>

                    </div>

                </div>