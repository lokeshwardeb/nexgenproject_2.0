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
                                    <div class="container m-4 pt-4  pe-5">
                                        <div class="dashboard_main_content">
                                        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Dashboard</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->

    <style>
        /* Reset basic styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: #f0f4f8;
    color: #333;
    font-size: 16px;
    line-height: 1.5;
}

/* Header Section */
header {
    background-color: #4A90E2;
    color: white;
    padding: 20px;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 100;
}

header .header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

header .logo {
    font-size: 1.8rem;
    font-weight: bold;
}

header .header-actions {
    position: relative;
}

header .header-actions button {
    background-color: #4A90E2;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 1rem;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

header .header-actions button:hover {
    background-color: #3c7aab;
}

header .profile-menu {
    position: absolute;
    top: 35px;
    right: 0;
    background-color: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    min-width: 150px;
    display: none;
    border-radius: 5px;
}

header .profile-menu ul {
    list-style: none;
    padding: 10px;
}

header .profile-menu ul li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

header .profile-menu ul li:last-child {
    border-bottom: none;
}

header .profile-menu ul li a {
    text-decoration: none;
    color: #333;
}

header .profile-menu ul li:hover {
    background-color: #f4f6f9;
}

/* Main Dashboard Content */
main {
    margin-top: 100px;
    padding: 30px;
}

.overview {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
}

.overview-card {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    flex: 1;
}

.overview-card h3 {
    font-size: 1.4rem;
    margin-bottom: 10px;
}

.overview-card p {
    font-size: 2rem;
    font-weight: bold;
    color: #4A90E2;
}

.graph-section {
    margin-bottom: 30px;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.tasks {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.tasks h2 {
    margin-bottom: 20px;
}

.task-cards {
    display: flex;
    gap: 20px;
}

.task-card {
    background-color: #fafafa;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    flex: 1;
    text-align: center;
}

.task-card h3 {
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.task-card progress {
    width: 100%;
    height: 15px;
    margin-bottom: 10px;
}

.task-card .btn {
    background-color: #4A90E2;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.task-card .btn:hover {
    background-color: #3c7aab;
}

/* Modal */
.modal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    z-index: 200;
}

.modal-content {
    display: flex;
    flex-direction: column;
}

.modal h2 {
    margin-bottom: 20px;
}

.modal .close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.5rem;
    cursor: pointer;
}

canvas {
    width: 100%;
    height: 250px;
}

/* Responsive Layout */
@media (max-width: 768px) {
    .overview {
        flex-direction: column;
    }

    .task-cards {
        flex-direction: column;
    }
}

    </style>

</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-content">
            <div class="logo">NexGen Dashboard</div>
            <div class="header-actions">
                <button id="profile-btn" onclick="toggleProfileMenu()">Profile</button>
                <div id="profile-menu" class="profile-menu">
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Dashboard Content -->
    <main>
        <section class="overview">
            <div class="overview-card">
                <h3>Total Projects</h3>
                <p>35</p>
            </div>
            <div class="overview-card">
                <h3>Active Users</h3>
                <p>120</p>
            </div>
            <div class="overview-card">
                <h3>Completed Tasks</h3>
                <p>145</p>
            </div>
        </section>

        <!-- Graph Section -->
        <section class="graph-section">
            <canvas id="projectGraph"></canvas>
        </section>

        <!-- Tasks Section -->
        <section class="tasks">
            <h2>Latest Tasks</h2>
            <div class="task-cards">
                <div class="task-card">
                    <h3>Task 1</h3>
                    <progress value="50" max="100"></progress>
                    <button class="btn" onclick="openModal('Task 1 Details')">View</button>
                </div>
                <div class="task-card">
                    <h3>Task 2</h3>
                    <progress value="30" max="100"></progress>
                    <button class="btn" onclick="openModal('Task 2 Details')">View</button>
                </div>
                <div class="task-card">
                    <h3>Task 3</h3>
                    <progress value="80" max="100"></progress>
                    <button class="btn" onclick="openModal('Task 3 Details')">View</button>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal for Task Details -->
    <div id="task-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2 id="modal-title"></h2>
            <p>Task details will go here...</p>
        </div>
    </div>

    <!-- <script src="scripts.js"></script> -->

    <script>
// Toggle profile menu visibility
function toggleProfileMenu() {
    const menu = document.getElementById("profile-menu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}

// Close modal
function closeModal() {
    const modal = document.getElementById("task-modal");
    modal.style.display = "none";
}

// Open modal with dynamic content
function openModal(taskName) {
    const modal = document.getElementById("task-modal");
    const modalTitle = document.getElementById("modal-title");
    modalTitle.textContent = taskName;
    modal.style.display = "block";
}


    </script>

</body>
</html>


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