<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
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

                                <div class="main_content_navbar">
                                    <?php

                                    require_once __DIR__ . '/inc/_main_content_navbar.php';

                                    ?>
                                </div>

                                <div class="main_content_section mt-4">
                                    <div class="container m-4 mt-2 pt-4  pe-5">
                                        <div class="dashboard_main_content">

                                            <div class="user_info_section fs-1  ">
                                                Welcome back, <span
                                                    class="user_name text-primary "><?php echo $_SESSION['username']; ?></span>
                                            </div>

                                            <div class="information_section mt-4 pt-4 mb-4 pb-4 fs-4 ">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="container inter-font  ">
                                                            <div class="card  text-dark" style="width: 18rem;">
                                                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                                                <div class="card-body">
                                                                    <h5 class="card-title text-primary fw-bold ">Total
                                                                        Projects</h5>
                                                                    <p class="card-text">
                                                                        <i class="fa-solid fa-briefcase me-2"></i> 60
                                                                    </p>
                                                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="container inter-font ">
                                                            <div class="card  text-dark" style="width: 18rem;">
                                                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                                                <div class="card-body">
                                                                    <h5 class="card-title text-primary fw-bold ">
                                                                        Completed
                                                                        Tasks</h5>
                                                                    <p class="card-text">
                                                                        <i class="fa-solid fa-list-check me-2 "></i></i>
                                                                        60
                                                                    </p>
                                                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="container inter-font ">
                                                            <div class="card  text-dark" style="width: 18rem;">
                                                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                                                <div class="card-body">
                                                                    <h5 class="card-title text-primary fw-bold ">Total
                                                                        Team members</h5>
                                                                    <p class="card-text">
                                                                        <i class="fa-solid fa-users me-2 "></i></i> 60
                                                                    </p>
                                                                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript"
                                                src="https://www.gstatic.com/charts/loader.js"></script>


                                            <div class="total_team_performance_info mt-4  ">
                                                <div class="section_title fs-4  ">
                                                    Your team performance rate
                                                </div>
                                                <div class="section_content">
                                                    <div id="main_projects_line_bar" class="mt-4"></div>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="team_chart_info mt-4 pt-4 ">
                                            <div class=" mt-4 pt-4 ">
                                                <div class="section_title fs-4  ">
                                                    Team task completation rate in the last month
                                                </div>
                                                <div class="section_content">
                                                    <div id="team_colum" class="mt-4"></div>

                                                </div>
                                                <!-- <div id="divteam"></div> -->
                                            </div>
                                        </div>

                                        <script>
                                            google.charts.load('current', { packages: ['corechart', 'bar'] });
                                            google.charts.setOnLoadCallback(drawBasic);

                                            function drawBasic() {

                                                var data = new google.visualization.DataTable();
                                                data.addColumn('string', 'Team Member');
                                                data.addColumn('number', 'Task completed in the last month');

                                                data.addRows([
                                                    ['Protik', 50 ],
                                                    ['X', 15],
                                                    ['Y', 20],
                                                    ['Z', 5],
                                                    ['A', 50]

                                                    // [{ v: [8], f: '8 am' }, 1],
                                                    // [{ v: [9], f: '9 am' }, 2],


                                                    // [{ v: [8, 0, 0], f: '8 am' }, 1],
                                                    // [{ v: [9, 0, 0], f: '9 am' }, 2],
                                                    // [{ v: [10, 0, 0], f: '10 am' }, 3],
                                                    // [{ v: [11, 0, 0], f: '11 am' }, 4],
                                                    // [{ v: [12, 0, 0], f: '12 pm' }, 5],
                                                    // [{ v: [13, 0, 0], f: '1 pm' }, 6],
                                                    // [{ v: [14, 0, 0], f: '2 pm' }, 7],
                                                    // [{ v: [15, 0, 0], f: '3 pm' }, 8],
                                                    // [{ v: [16, 0, 0], f: '4 pm' }, 9],
                                                    // [{ v: [17, 0, 0], f: '5 pm' }, 10],
                                                ]);

                                                var options = {
                                                    title: 'Task completation rate in the last month',
                                                    // hAxis: {
                                                    //     title: 'Time of Day',
                                                    //     // format: 'h:mm a',
                                                    //     // viewWindow: {
                                                    //     //     min: [7, 30, 0],
                                                    //     //     max: [17, 30, 0]
                                                    //     // }
                                                    // },
                                                    // vAxis: {
                                                    //     title: 'Rating (scale of 1-10)'
                                                    // }
                                                };

                                                var chart = new google.visualization.ColumnChart(
                                                    document.getElementById('team_colum'));

                                                chart.draw(data, options);
                                            }
                                        </script>







                                        <script type="text/javascript"
                                            src="https://www.gstatic.com/charts/loader.js"></script>
                                        <script>
                                            google.charts.load('current', {
                                                'packages': ['corechart']
                                            });
                                            google.charts.setOnLoadCallback(drawChart);

                                            function drawChart() {
                                                var data = google.visualization.arrayToDataTable([
                                                    ['Month', 'Projects Completed', 'Tasks Completed'], // Headers for both data sets
                                                    ['Jan', 10, 50],
                                                    ['Feb', 25, 25],
                                                    ['Mar', 5, 60],
                                                    ['Apr', 50, 2]
                                                ]);

                                                //   var options = { title: 'Task Progress' };
                                                var options = {
                                                    title: 'Team Performance',
                                                    curveType: 'function',
                                                    legend: {
                                                        position: 'bottom'
                                                    }
                                                };
                                                var chart = new google.visualization.LineChart(document.getElementById('main_projects_line_bar'));
                                                chart.draw(data, options);
                                            }
                                        </script>

                                        <script type="text/javascript"
                                            src="https://www.gstatic.com/charts/loader.js"></script>
                                        <script type="text/javascript">
                                            google.charts.load('current', {
                                                'packages': ['corechart']
                                            });
                                            google.charts.setOnLoadCallback(drawChart);

                                            // <script>


                                            function drawChart() {

                                                var data = google.visualization.arrayToDataTable([
                                                    ['Task', 'Hours per Day'],
                                                    ['Work', 11],
                                                    ['Eat', 2],
                                                    ['Commute', 2],
                                                    ['Watch TV', 2],
                                                    ['Sleep', 7]
                                                ]);

                                                var options = {
                                                    title: 'Your task completition rates'
                                                };

                                                var chart = new google.visualization.PieChart(document.getElementById('task_piechart'));

                                                chart.draw(data, options);
                                            }
                                        </script>
                                        <!-- </script> -->

                                        <!-- <div id="chart_div_new"></div> -->

                                        <div class="dashboard_info_section mt-4 pt-4 ">
                                            <div class="team_working_info">
                                                Your team is working with the project : <span
                                                    class="text-primary">Wireflow</span>
                                            </div>

                                            <div class="tasks_info mt-4 pt-4 mb-4 pb-4 ">
                                                <div class="section_title lux_roman text fs-2 ">
                                                    Here is your assigned tasks :
                                                </div>
                                                <div class="section_content mt-4 inter-font ">
                                                    <div>Make the design of the <span
                                                            class="text-primary">wireflow</span> project</div>
                                                    <div>Write the srs for the <span class="text-primary">banking
                                                            management</span> project</div>
                                                    <div>Submit the lattest project</div>
                                                </div>

                                                <div class="task_pie_chart">
                                                    <!-- <div id="task_piechart"></div> -->
                                                </div>


                                            </div>




                                        </div>




                                    </div>
                                </div>
                            </div>








                        </div>

                    </div>





                </div>


                <div class="container d-none ">
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