<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();

if(!isset($_GET['documentation_id'])){
    echo '
    <script>
    location.href="/all_documentations";
    </script>
    ';
}

$get_documentation_id = $_GET['documentation_id'];


?>

<main>
    <div class="dashboard_main_section">
        <div class="row">
            <div class="col-md-3 " style="background-color: white !important;">
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
            <div class="col-md-9 cus_bg_main_section_color">
                <div class="main_content_section scrollbar_container">


                    <div class="the_running_main_content montserrat_font">

                        <div class="details_container">

                            <div class="details_container_info">

                                <div class="container">
                                    <div class="title_section">
                                        <div class="section_title fs-4 text-center mt-4 inter-font">
                                            View Documentations
                                        </div>
                                    </div>
                                </div>

                                <div class="main_content_section mt-4">
                                    <div class="container m-4 pt-4  pe-5">
                                        <div class="documentation_main_content_section">
                                            <div class="documentation_info">
                                                <?php

                                                $get_documentation_id = $_GET['documentation_id'];

                                                $result_get_documentation = $controllers->get_all_data("documentations", "`documentation_id` = '$get_documentation_id'");

                                                if($result_get_documentation){
                                                    if($result_get_documentation->num_rows > 0){
                                                        while($row = $result_get_documentation->fetch_assoc()){
                                                            $documentation_name = $row['documentation_name'];
                                                            $documentation_desc = $row['documentation_desc'];
                                                            $documentation_file_name = $row['documentation_file_name'];
                                                        }
                                                    }
                                                }

                                                ?>
                                                
                                                <div>Documentation name : <span class="text-primary fw-bold"> <?php echo $documentation_name ?></span></div>
                                                <div>Documentation Description : <span class="text-primary fw-bold"><?php echo $documentation_desc ?></span></div>

                                              

                                            </div>

                                            <?php

                                            // set the directory name and the file name
                                            $dir = "./assets/uploads/documentations_upload/";
                                            $make_file_name = $dir . $documentation_file_name;

                                            // check if the file is exists or not on the software
                                            if(file_exists($make_file_name)){
                                                echo '
                                                <div class="documentation_download_file mt-4 pt-4 ">
                                                <a href="./assets/uploads/documentations_upload/' . $documentation_file_name . '" download="" ><button class="btn btn-sm btn-outline-dark">Download Documentation</button></a>
                                            </div>

                                            <div class="documentation_file d-flex justify-content-center mt-4 pt-4 mb-4 pb-4">
                                                    <embed style="min-height: 100vh !important; width: 100vw !important;" src="/assets/uploads/documentations_upload/' . $documentation_file_name . '" type="application/pdf">
                                                </div>
                                                ';
                                            }else{
                                                echo '
                                                <div class="mt-5 pt-5 text-center text-danger fw-bold" >
                                                    No documentation file has been found for this Documentation
                                                </div>
                                                ';
                                            }

                                            ?>

                                            
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