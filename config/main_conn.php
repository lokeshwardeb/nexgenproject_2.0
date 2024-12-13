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

        


        $conn = new mysqli($this->hostname, $this->db_username, $this->db_password, $this->dbname);

        if(mysqli_connect_error()){
            echo 'error occurs connect';
        }

        return $conn;

    }


}


// new connect;




?>