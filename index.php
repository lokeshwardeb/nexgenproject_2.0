<?php

// initializing the uri of the path 
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$Routes = [

    '/' => __DIR__ . '/views/pages/dashboard.views.php',
    '/installation' => __DIR__ . '/views/setup_pages/installation_process.php',
    '/setup' => __DIR__ . '/views/setup_pages/setup.views.php',
    '/login' => __DIR__ . '/views/pages/login.views.php',
    '/signup' => __DIR__ . '/views/pages/signup.views.php',
    '/dashboard' => __DIR__ . '/views/pages/dashboard.views.php',
    '/all_documentations' => __DIR__ . '/views/pages/all_documentations.views.php',
    '/add_new_documentation' => __DIR__ . '/views/pages/add_new_documentation.views.php',
    '/view_documentation' => __DIR__ . '/views/pages/view_documentation.views.php',
    '/meetings' => __DIR__ . '/views/pages/meetings.views.php',
    '/meeting_hub' => __DIR__ . '/views/pages/meeting_hub.views.php',
    '/delete_meeting' => __DIR__ . '/views/pages/inc/_delete_meeting.views.php',
    '/add_new_task' => __DIR__ . '/views/pages/add_new_task.views.php',
    '/manage_all_task' => __DIR__ . '/views/pages/manage_all_task.views.php',
    '/test' => __DIR__ . '/views/pages/test.views.php',
    '/messages' => __DIR__ . '/views/pages/messages.views.php',
    '/message_hub' => __DIR__ . '/views/pages/message_hub.views.php',
    '/tasks' => __DIR__ . '/views/pages/tasks.views.php',
    '/task_details' => __DIR__ . '/views/pages/task_details.views.php',
    '/projects' => __DIR__ . '/views/pages/projects.views.php',
    '/all_projects' => __DIR__ . '/views/pages/all_projects.views.php',
    '/create_new_project' => __DIR__ . '/views/pages/create_new_project.views.php',
    '/projects_hub' => __DIR__ . '/views/pages/projects_hub.views.php',
    '/projects_file_repository' => __DIR__ . '/views/pages/projects_files_repository.views.php',
    '/project_discussions' => __DIR__ . '/views/pages/projects_discussions.views.php',
    '/send_msg' => __DIR__ . '/views/pages/inc/_send_msg.views.php',
    '/project_discussion_send_msg' => __DIR__ . '/views/pages/inc/_project_discuss_send_msg.views.php',
    '/delete_msg' => __DIR__ . '/views/pages/inc/_delete_msg.views.php',
    '/project_discussion_delete_msg' => __DIR__ . '/views/pages/inc/_project_discuss_delete_msg.views.php',
    // '/send_msg' => __DIR__ . '/views/pages/send_msg.views.php',
    // '/delete_msg' => __DIR__ . '/views/pages/delete_msg.views.php',
    '/logout' => __DIR__ . '/views/pages/logout.views.php',


];



if(array_key_exists($uri, $Routes)){
    require $Routes[$uri];
}else{
    // that means the url is not exists and it should return on the error page
    require __DIR__ . '/views/pages/error.views.php';
}


?>