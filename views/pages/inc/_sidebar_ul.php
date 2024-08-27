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
    <!-- <li class="text-center m-auto">
                                    <a href="" class="nav-link text-center mb-4">
                                        <button type="button" class="btn  text-center sidebar_btn p-2 ">
                                            Dashboard
                                        </button>
                                    </a>
                                </li> -->
    <!-- <li class="text-center m-auto">
        <a href="" class="nav-link  text-center mb-4">
            <button type="button" class="btn  text-center sidebar_btn p-2 ">
                Projects
            </button>
        </a>
    </li> -->


    <li class="text-center m-auto">
        <div class="toggle_btn_container mb-4">
            <button class="btn  text-center sidebar_btn <?php

            switch ($get_url) {
                case '/all_projects':
                    echo 'sidebar_btn_active';
                    break;
                case '/create_new_project':
                    echo 'sidebar_btn_active';

                default:
                    # code...
                    break;
            }

            // if($get_url == '/')
            
            // if(isset($all_projects_active_class_name)){
            //     echo $all_projects_active_class_name;
            // }
            
            ?> p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                aria-controls="collapseExample">
                Projects
            </button>

            <div class="collapse mt-4" id="collapseExample">
                <ul class="">
                    <li class="text-center m-auto">
                        <a href="/all_projects" class="nav-link text-center mb-4">
                            <button type="button" class="btn <?php

                            switch ($get_url) {
                                case '/all_projects':
                                    echo 'text-primary';
                                    break;


                                default:
                                    # code...
                                    break;
                            }

                            // if($get_url == '/')
                            
                            // if(isset($all_projects_active_class_name)){
                            //     echo $all_projects_active_class_name;
                            // }
                            
                            ?>  text-center sidebar_btn p-2 ">
                                All Projects
                            </button>
                        </a>
                    </li>
                    <li class="text-center m-auto">
                        <a href="/create_new_project" class="nav-link  text-center mb-4">
                            <button type="button" class="btn  text-center sidebar_btn p-2 <?php

                            switch ($get_url) {

                                case '/create_new_project':
                                    echo 'text-primary';
                                    break;

                                default:
                                    # code...
                                    break;
                            }



                            ?>">
                                Create new Projects
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- <button type="button" class="btn  text-center sidebar_btn p-2 ">
                Projects
            </button> -->
    </li>

    <!-- dropdown documentation -->
    <li class="text-center m-auto">
        <div class="toggle_btn_container mb-4">
            <button class="btn  text-center sidebar_btn <?php

            switch ($get_url) {
                case '/all_documentations':
                    echo 'sidebar_btn_active';
                    break;
                case '/add_new_documentation':
                    echo 'sidebar_btn_active';
                
                case '/view_documentation':
                    echo 'sidebar_btn_active';

                default:
                    # code...
                    break;
            }

            // if($get_url == '/')
            
            // if(isset($all_projects_active_class_name)){
            //     echo $all_projects_active_class_name;
            // }
            
            ?> p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#documentation_collapse" aria-expanded="false"
                aria-controls="documentation_collapse">
                Documentation
            </button>

            <div class="collapse mt-4" id="documentation_collapse">
                <ul class="">
                    <li class="text-center m-auto">
                        <a href="/all_documentations" class="nav-link text-center mb-4">
                            <button type="button" class="btn <?php

                            switch ($get_url) {
                                case '/all_documentations':
                                    echo 'text-primary';
                                    break;

                                case '/view_documentation':
                                    echo 'text-primary';


                                default:
                                    # code...
                                    break;
                            }

                            // if($get_url == '/')
                            
                            // if(isset($all_projects_active_class_name)){
                            //     echo $all_projects_active_class_name;
                            // }
                            
                            ?>  text-center sidebar_btn p-2 ">
                                All Documentation
                            </button>
                        </a>
                    </li>
                    <li class="text-center m-auto">
                        <a href="/add_new_documentation" class="nav-link  text-center mb-4">
                            <button type="button" class="btn  text-center sidebar_btn p-2 <?php

                            switch ($get_url) {

                                // case '/create_new_project':
                               
                                case '/add_new_documentation':
                                    echo 'text-primary';
                                    break;

                                default:
                                    # code...
                                    break;
                            }



                            ?>">
                                Add New Documentation
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- <button type="button" class="btn  text-center sidebar_btn p-2 ">
                Projects
            </button> -->
    </li>



    <!-- <li class="text-center m-auto">
        <a href="" class="nav-link text-center mb-4">
            <button type="button" class="btn mt-2 text-center sidebar_btn p-2 ">
                Documentation
            </button>
        </a>
    </li> -->
    <li class="text-center m-auto">
        <a href="" class="nav-link text-center mb-4">
            <button type="button" class="btn  text-center sidebar_btn p-2 ">
                Meetings
            </button>
        </a>
    </li>
    <li class="text-center m-auto">
        <a href="" class="nav-link text-center mb-4">
            <button type="button" class="btn  text-center sidebar_btn p-2 ">
                Task
            </button>
        </a>
    </li>
    <!-- <li class="text-center m-auto">
                                    <a href="" class="nav-link text-center mb-4">
                                        <button type="button" class="btn  text-center sidebar_btn p-2 ">
                                            Calendar
                                        </button>
                                    </a>
                                </li> -->
    <li class="text-center m-auto">
        <a href="" class="nav-link text-center mb-4">
            <button type="button" class="btn  text-center sidebar_btn p-2 ">
                Messages
            </button>
        </a>
    </li>
    <li class="text-center m-auto">
        <a href="" class="nav-link text-center mb-4">
            <button type="button" class="btn  text-center sidebar_btn p-2 ">
                Settings
            </button>
        </a>
    </li>

    <li class="text-center m-auto">
        <a href="/logout" class="nav-link text-center mb-4">
            <button type="button" class="btn sidebar_logout_btn text-center sidebar_btn p-2 ">
                Logout
            </button>
        </a>
    </li>

</ul>