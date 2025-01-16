<!-- <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
  Link with href
</a> -->
<button class="btn mt-4 " style="float: right;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
    aria-controls="offcanvasExample">
    <i class="fa-solid fa-bars" style="font-size: 20px !important;"></i>
</button>

<div class="offcanvas offcanvas-start" style="width:100%" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <!-- <img src="/assets/img/CodeLinkPro.png" class="img-fluid" style="width: 100px;" alt=""><br> -->
        <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
        <button type="button" class="btn-close ms-5" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="logo d-flex justify-content-center">
            <img src="/assets/img/nexGenProject_logo_no_bg.png" class="img-fluid " style="width: 250px; " alt=""><br>

        </div>
        
        <hr>

<div class="loggedin_user_info_section  m-4 pb-4 ">
    <div class="container">
    <div class="user_info text-center  ">
        <div class="user_name fs-5 fw-bold mt-2 pt-4 "><?php echo $_SESSION['username']; ?></div>
    </div>
    </div>
</div>

<hr>


        <div class="mobile_navigation_main_section mt-4 pt-4">
           <?php

           require __DIR__ . '/_sidebar_msg_ul.php';

        //    require __DIR__ . "/_sidebar_items.php";

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




        <!-- <div class="dropdown mt-3">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown">
                                        Dropdown button
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div> -->
    </div>
</div>