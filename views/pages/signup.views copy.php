<?php
$active_name = "Signup";

require_once __DIR__ . '/inc/_login_signup_header.php';

// $controllers = new controllers;
$controllers->signup();

?>




<script>
  success_alert("success", "jai sri ganesh");
</script>
<main>
    <div class="login_main_section">
        <div class="container">
            <div class="login_section_main_contents">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <!-- the main logo section -->
                        <img src="/assets/img/nexgenproject_big_logo.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- the main login section -->

                        <div class="welcome_main_section">
                            <div class="mb-3">
                                <!-- welcome section -->
                                <div class="welcome_section mt-4 pt-4 fs-3  lux_roman  text-center">
                                    Welcome to <span class="cus_brand_name text-primary">nexGenProject</span>
                                </div>
                            </div>
                        </div>

                        <div class="main_login_contents mt-4 pt-4">
                            <form action="" method="post">

                                <div class="mb-3">
                                    <!-- <label for="username">Username</label> -->
                                    <div class="input_section mt-4 pt-4">
                                        <input type="text" placeholder="Username"
                                            class=" form-control login_inp" name="username" id="username">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <!-- <label for="username">Username</label> -->
                                    <div class="input_section ">
                                        <input type="text" placeholder="Email"
                                            class=" form-control login_inp" name="email" id="email">
                                    </div>
                                </div>
                            
                                <div class="mb-3">
                                    <!-- <div class="input_section">
                                        <input type="text" placeholder="Password" class="form-control login_inp"
                                            name="password" id="password">
                                    </div> -->
                                    

                                    <div class="input_section d-flex">
                                        <input type="password" placeholder="Password" class="form-control login_inp"
                                            name="password" id="password">
                                            <button type="button" class="btn" onclick="showPass()">
                                                
                                                <i class="fas fa-eye" id="show_pass_icon" ></i>
                                                <i class="fa fa-eye-slash d-none" id="hide_pass_icon" ></i>

                                            </button>
                                            <!-- <i class="fa  s fa-eye-slash"></i> -->
                                    </div>


                                </div>
                                <div class="mb-3">
                                    <!-- <div class="input_section">
                                        <input type="text" placeholder="Confirm Password" class="form-control login_inp"
                                            name="password" id="password">
                                    </div> -->


                                    <div class="input_section d-flex">
                                        <input type="password" placeholder="Confirm Password" class="form-control login_inp"
                                            name="cpassword" id="cpassword">
                                            <button type="button" class="btn" onclick="showConfirmPassword()">
                                                
                                                <i class="fas fa-eye" id="show_cpass_icon" ></i>
                                                <i class="fa fa-eye-slash d-none" id="hide_cpass_icon" ></i>

                                            </button>
                                            <!-- <i class="fa  s fa-eye-slash"></i> -->
                                    </div>


                                </div>
                                <div class="mb-3 mt-4 pt-4">
                                    <button type="submit"
                                        class="m-auto d-flex justify-content-center cus_rounded_btn btn mt-4 ps-5 pe-5 btn-primary" name="signup" >Signup</button>
                                </div>
                                <div class="mb-3 mt-4 pt-4 ">
                                    <div class="container text-center">
                                        <div class="signup_info">
                                            Already have an account ? <a href="/login">Login</a> with your credentials
                                        </div>
                                        <div class="fp_pass_info">
                                            Forgot your password ? Change your <a href="">password</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="bottom_info_section mt-4 pt-4">
                    <div class="rights_reserved_section text-center mt-4 pt-4">
                        All rights are reserved by <a class="text-decoration-none" target="_blank" href="http://lokeshwardebportfolio.epizy.com">Lokeshwar Deb Protik</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- <script>
    success_alert("success", "new")
</script> -->





<?php

require_once __DIR__ . '/inc/_footer.php';

require_once __DIR__ . '/inc/_footer_scripts.php';

?>