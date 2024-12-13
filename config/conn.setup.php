<?php
// require_once __DIR__ . '/../models/models.php';

class database{
    private $hostname;
    private $db_username;
    private $db_password;
    private $dbname;

    protected function connection(){
        $this->hostname = 'host_name';
        $this->db_username = 'user_name';
        $this->db_password = 'pass_word';
        $this->dbname = 'data_base_name';

        


        $conn = new mysqli($this->hostname, $this->db_username, $this->db_password, $this->dbname);

        if(mysqli_connect_error()){
            echo 'error occurs connect';
        }

        return $conn;

    }


}


// new connect;




?>