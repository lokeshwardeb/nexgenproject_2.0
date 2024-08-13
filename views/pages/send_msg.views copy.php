<?php
// session_start();
// $_SESSION['username'] = 'jai sri ganesh';
$active_name = "All Projects";
// $dashboard_active_class_name = "sidebar_btn_active";
// $all_projects_active_class_name = "sidebar_btn_active";
// sidebar_btn_active
require __DIR__ . '/inc/_header.php';

$controllers->login_check();

$controllers->check_get_project_id();

$controllers->send_file_repo_msg();

?>




<main>
 
</main>

<!-- <script>
    $(document).ready(function () {
        $("")
    });
</script> -->


<?php
require_once __DIR__ . '/inc/_footer.php';
require_once __DIR__ . '/inc/_footer_scripts.php';
?>
