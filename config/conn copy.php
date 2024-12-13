<?php
// require_once __DIR__ . '/../models/models.php';

class database{
    private $hostname;
    private $db_username;
    private $db_password;
    private $dbname;

    protected function connection(){
        $this->hostname = 'localhost';
        $this->db_username = 'root';
        $this->db_password = '';
        $this->dbname = 'nexgenproject_2.0';

        // check if the database exists or not
        $check_db_conn = new mysqli($this->hostname, $this->db_username, $this->db_password);

        $check_db_sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$this->dbname'";

        $check_db_result = $check_db_conn->query($check_db_sql);

        if($check_db_result->num_rows > 0){
            // that means the database exist
            echo 'the database' . $this->dbname . 'exists';
        }else{
            // that measn the database doesnot exists
            echo 'the database' . $this->dbname . 'doesnot exitst';
        }


        $conn = new mysqli($this->hostname, $this->db_username, $this->db_password, $this->dbname);

        if(mysqli_connect_error()){
            echo 'error occurs connect';
        }

        return $conn;

    }


}


// new connect;




?>