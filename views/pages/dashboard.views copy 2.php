<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "Dashboard";
require __DIR__ . '/inc/_header.php';

?>

<main>
    <div class="dashboard_main_section">
        <div class="row">
            <div class="col-md-3 ">
                <div class="integrate_desktop_sidebar">
                    <?php
                     
                     require __DIR__ . '/inc/_sidebar.php';
                     
                     ?>
                </div>

                <div class="integrate_mobile_sidebar">
                    <?php

                    include __DIR__ . '/inc/_mobile_sidebar.php';

                    ?>
                   </div>

            </div>
            <div class="col-md-9">
                <div class="main_content_section scrollbar_container">
                    <div class="container">
                    <div class="welcome_section fs-5 mt-4">
                        Welcome again,
                        <div class="welcome_username ms-5 ps-4 text-primary">
                            <?php

                            // echo $_SESSION['email'];

                            echo $_SESSION['username'];

                            ?>
                        </div>
                    </div>

                   <div class="integrate_dashboard_nav">
                    <?php

                    require __DIR__ . '/inc/_dashboard_nav.php';

                    ?>
                   </div>

               

                    <div class="main_section_contents fs-5">
                        <div class="container">
                            <div class="section_info mt-4 text-center pt-4">
                                <div class="ongoing_task_section mt-4">
                                    <div class="section_title fs-4">
                                        Here is your ongoing task
                                    </div>
                                    <div class="section_content text-danger mt-2">
                                        Complete the design
                                    </div>
                                </div>
                                <div class="ongoing_task_section mt-4">
                                    <div class="section_title fs-4">
                                        Here is your project status
                                    </div>
                                    <div class="section_content text-primary mt-2">
                                        In process
                                    </div>
                                </div>
                                <div class="ongoing_task_section mt-4">
                                    <div class="section_title fs-4">
                                        Your team is working on
                                    </div>
                                    <div class="section_content text-danger mt-2">
                                        Complete the design
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