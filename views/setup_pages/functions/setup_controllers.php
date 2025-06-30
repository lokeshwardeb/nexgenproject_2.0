<?php
// require_once __DIR__ . '/../../../config/conn.php';
if(file_exists( __DIR__ . '/../../../config/conn.php')){
    require_once __DIR__ . '/../../../config/conn.php';

}

// require_once __DIR__ . '/../../../models/models.php';


class setup_controllers{

    public function pure_html($data){
        return htmlentities($data, ENT_QUOTES);
    }

    public function check_database_exist($get_mysql_connect, $get_db_name){
        $check_db_sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$get_db_name}'";
        $check_db_result = $get_mysql_connect->query($check_db_sql);

        if ($check_db_result && $check_db_result->num_rows > 0) {
            // Database exists
            return true;
            // echo 'The database ' . $get_db_name . ' exists.<br>';

        } else {
            // Database does not exist
            return false;
            // echo 'The database ' . $get_db_name . ' does not exist.<br>';

            // $get_mysql_connect->close();

            // echo '
            // <script>
            
            // location.href="/setup"
            
            // </script>
            
            
            // ';

            // header("location: /setup");
            // exit;
        }

        // Close the temporary connection
        // $check_db_conn->close();
    }

    // the function to save the server configuration

    public function save_server_configuration() {
    if (isset($_POST['save_server_config'])) {
        // Get and sanitize input
        $server_name = $this->pure_html($_POST['server_name']) ?: "localhost";
        $server_user_name = $this->pure_html($_POST['server_user_name']) ?: "root";
        $server_password = $this->pure_html($_POST['server_password']) ?: "";
        $database_name = $this->pure_html($_POST['database_name']) ?: "nexgenproject_2.0";

        $conn_file_dir = "config/conn.php";

        // Copy template connection file and update credentials
        copy("config/conn.setup.php", $conn_file_dir);
        $config = file_get_contents($conn_file_dir);
        $config = str_replace("host_name", $server_name, $config);
        $config = str_replace("user_name", $server_user_name, $config);
        $config = str_replace("pass_word", $server_password, $config);
        $config = str_replace("data_base_name", $database_name, $config);
        file_put_contents($conn_file_dir, $config);

        // Connect to MySQL server
        $mysql_connect = new mysqli($server_name, $server_user_name, $server_password);
        if ($mysql_connect->connect_error) {
            die("❌ Error connecting to MySQL server: " . $mysql_connect->connect_error);
        }

        // comment this for the production
        // Check if database exists
        // if ($this->check_database_exist($mysql_connect, $database_name)) {
        //     echo "<div class='alert alert-info'>✅ Database already exists. Setup skipped.</div>";
        //     return;
        // }

        // // Create database
        // $create_db_sql = "CREATE DATABASE `$database_name`";
        // if (!$mysql_connect->query($create_db_sql)) {
        //     die("❌ Failed to create database: " . $mysql_connect->error);
        // }

        // Connect to newly created database
        $my_conn = new mysqli($server_name, $server_user_name, $server_password, $database_name);
        if ($my_conn->connect_error) {
            die("❌ Failed to connect to the new database: " . $my_conn->connect_error);
        }

        // Load SQL dump file
        $sql_file = realpath(__DIR__ . '/../../../sql/nexgenproject_2_0.sql');
        $sql_content = file_get_contents($sql_file);

        if ($sql_content === false) {
            die("❌ Could not read the SQL file.");
        }

        // Execute SQL using multi_query
        if ($my_conn->multi_query($sql_content)) {
            do {
                if ($result = $my_conn->store_result()) {
                    $result->free();
                }
            } while ($my_conn->more_results() && $my_conn->next_result());
        } else {
            die("❌ Error executing SQL file: " . $my_conn->error);
        }

        echo "<div class='alert alert-success'>✅ Installation was successful!</div>";
        return;
    }
}


    
//     public function save_server_configuration() {
//     if (isset($_POST['save_server_config'])) {
//         $server_name = $this->pure_html($_POST['server_name']) ?: "localhost";
//         $server_user_name = $this->pure_html($_POST['server_user_name']) ?: "root";
//         $server_password = $this->pure_html($_POST['server_password']) ?: "";
//         $database_name = $this->pure_html($_POST['database_name']) ?: "nexgenproject_2.0";

//         $conn_file_dir = "config/conn.php";

//         // Copy template and replace placeholders
//         copy("config/conn.setup.php", $conn_file_dir);
//         $config = file_get_contents($conn_file_dir);
//         $config = str_replace("host_name", $server_name, $config);
//         $config = str_replace("user_name", $server_user_name, $config);
//         $config = str_replace("pass_word", $server_password, $config);
//         $config = str_replace("data_base_name", $database_name, $config);
//         file_put_contents($conn_file_dir, $config);

//         // Connect to MySQL
//         $mysql_connect = new mysqli($server_name, $server_user_name, $server_password);
//         if ($mysql_connect->connect_error) {
//             die("Error connecting to MySQL: " . $mysql_connect->connect_error);
//         }

//         // Check if DB exists
//         if ($this->check_database_exist($mysql_connect, $database_name)) {
//             echo "<div class='alert alert-info'>Database already exists. Setup skipped.</div>";
//             return;
//         }

//         // Create database
//         $create_db_sql = "CREATE DATABASE `$database_name`";
//         if (!$mysql_connect->query($create_db_sql)) {
//             die("Failed to create database: " . $mysql_connect->error);
//         }

//         // Connect to the new database
//         $my_conn = new mysqli($server_name, $server_user_name, $server_password, $database_name);

//         // Load and run SQL dump
//         $sql_file = realpath(__DIR__ . '/../../../sql/nexgenproject_2_0.sql');
//         $sql_content = file_get_contents($sql_file);
//         if ($sql_content === false) {
//             die("SQL file not found.");
//         }

//         $queries = explode(";", $sql_content);
//         foreach ($queries as $query) {
//             $query = trim($query);
//             if (!empty($query)) {
//                 if (!$my_conn->query($query)) {
//                     echo "Query error: " . $my_conn->error . "<br>";
//                 }
//             }
//         }

//         echo "<div class='alert alert-success'>Installation successful!</div>";
//         return;
//     }
// }




//     public function save_server_configuration(){
//         if(isset($_POST['save_server_config'])){
//             $server_name = $this->pure_html($_POST['server_name']);
//             $server_user_name = $this->pure_html($_POST['server_user_name']);
//             $server_password = $this->pure_html($_POST['server_password']);
//             $database_name = $this->pure_html($_POST['database_name']);
            

//             if($server_name == ''){
//                 $server_name = "localhost";
//             }

//             if($server_user_name == ''){
//                 $server_user_name = "root";
//             }

//             if($server_password == ''){
//                 $server_password = "";
//             }

//             if($database_name == ''){
//                 $database_name = "nexgenproject_2.0";
//             }

//             $conn_file_dir = "config/conn.php";

//             copy("config/conn.setup.php", $conn_file_dir);

//             file_put_contents($conn_file_dir, str_replace("host_name", $server_name, file_get_contents($conn_file_dir)));

//             file_put_contents($conn_file_dir, str_replace("user_name", $server_user_name, file_get_contents($conn_file_dir)));

//             file_put_contents($conn_file_dir, str_replace("pass_word", $server_password, file_get_contents($conn_file_dir)));

//             file_put_contents($conn_file_dir, str_replace("data_base_name", $database_name, file_get_contents($conn_file_dir)));


//             $mysql_connect = new mysqli($server_name, $server_user_name, $server_password);

//             if($mysql_connect->connect_error) {
//                 die("there was error with setup db connect");
//             }

//             $get_database_exist_status = $this->check_database_exist($mysql_connect, $database_name);

//             if($get_database_exist_status == false){
//                 // that means the database doesnot exist
//                 $create_db_sql = "CREATE DATABASE `$database_name`";

//                 $result_create_db = $mysql_connect->query($create_db_sql);


//             }

//             $my_conn = new mysqli($server_name, $server_user_name, $server_password, $database_name);


//             // $sql_file = __DIR__ . '/../../../sql/nexgenproject_2_0.sql';

//             // $sql_f = file_get_contents($sql_file);

//             // $result_setup_sql = $my_conn->query($sql_f);

//             // if($result_setup_sql){
//             //     echo '
//             //     <script>
//             //     location.href="/check"
//             //     </script>
//             //     ';
//             // }




//             $sql_file = __DIR__ . '/../../../sql/nexgenproject_2_0.sql';


//                         // check if the database exsits but the connection file doesnot exists
//                         if($get_database_exist_status == true){
//                             // that means the database is exists but the sql connection file is not exist

//                             return;

//                             // die('<div class="">the database already exists,, file already installed</div> <button class="btn btn-primary">Go to dashboard</button>');

//                             // return;
//                             // exit;

                            
//                         }





//             // Read the .sql file into a string
// $sql = file_get_contents($sql_file);

// if ($sql === false) {
//     die("Could not read the .sql file.");
// }

// // Split the SQL file into individual queries (semicolon is used as a delimiter)
// $queries = explode(";", $sql);

// // Execute each query
// foreach ($queries as $query) {
//     $query = trim($query);
//     if (!empty($query)) {
//         if ($my_conn->query($query) === false) {
//             echo "Error executing query: " . $my_conn->error . "<br>";
//         }
//     }
// }

//              return "the installation was successfull";






//             // return;





//         }
//     }
}





?>