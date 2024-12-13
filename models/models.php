<?php
// require __DIR__ . '/../config/conn.php';

// $config = new connect;

// if(file_exists("/config/conn.php")){
//     require_once __DIR__ . '/../config/conn.php';
// }

class models extends database{


    public function pure_data($data){
        $result = htmlspecialchars(mysqli_real_escape_string($this->connection(), $data), ENT_QUOTES);

        return $result;

    }

    public function get_the_max_id($id_row_name, $table_name){
        // $sql = "SELECT max(`$id_row_name`) FROM `$table_name`;";
        
        // $sql = "SELECT max(repository_msg_id) as max_id FROM projects_file_repository";


        $sql = "SELECT max(`$id_row_name`) as max_id FROM `$table_name`";
        $result = $this->connection()->query($sql);

        return $result;

    }

    public function insert($table_name, $table_rows, $table_rows_values){
        $sql = "INSERT INTO `$table_name`($table_rows) VALUES ($table_rows_values)";
        $result = $this->connection()->query($sql);

        return $result;
    }

    public function update($table_name, $table_rows_and_values, $where_conditions){
        $sql = "UPDATE `$table_name` SET $table_rows_and_values WHERE where_conditions ";
        $result = $this->connection()->query($sql);

        return $result;
    }

    public function get_all_data($table_name, $where_conditions = 1){
        // use this function for getting the data
        $sql = "SELECT * FROM `$table_name` WHERE $where_conditions ";
        $result = $this->connection()->query($sql);

        return $result;
    }
    public function get_custom_data($all_rows_name, $table_name, $where_conditions = 1){
        $sql = "SELECT $all_rows_name FROM `$table_name` WHERE $where_conditions ";
        $result = $this->connection()->query($sql);

        return $result;
    }

    public function create_sql_query($sql){
        $result = $this->connection()->query($sql);

        return $result;

    }

    public function delete($table_name, $where_conditions = 0){
        $sql = "DELETE FROM `$table_name` WHERE $where_conditions ";
        $result = $this->connection()->query($sql);

        return $result;
    }

}



?>