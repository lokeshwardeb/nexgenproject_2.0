<?php

class setup_controllers{

    public function pure_html($data){
        return htmlentities($data, ENT_QUOTES);
    }

    public function save_server_configuration(){
        if(isset($_POST['save_server_config'])){
            $server_name = $this->pure_html($_POST['server_name']);
            $server_user_name = $this->pure_html($_POST['server_user_name']);
            $server_password = $this->pure_html($_POST['server_password']);
            $database_name = $this->pure_html($_POST['database_name']);
            

            if($server_name == ''){
                $server_name = "localhost";
            }

            if($server_user_name == ''){
                $server_user_name = "root";
            }

            if($server_password == ''){
                $server_password = "";
            }

            if($database_name == ''){
                $database_name = "nexgenproject_2.0";
            }

            $conn_file_dir = "config/conn.php";

            copy("config/conn.setup.php", $conn_file_dir);

            file_put_contents($conn_file_dir, str_replace("host_name", $server_name, file_get_contents($conn_file_dir)));

            file_put_contents($conn_file_dir, str_replace("user_name", $server_user_name, file_get_contents($conn_file_dir)));

            file_put_contents($conn_file_dir, str_replace("pass_word", $server_password, file_get_contents($conn_file_dir)));

            file_put_contents($conn_file_dir, str_replace("data_base_name", $database_name, file_get_contents($conn_file_dir)));

            return;





        }
    }
}





?>