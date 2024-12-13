<?php
class Database {
    private $hostname;
    private $db_username;
    private $db_password;
    private $dbname;

    protected function connection() {
        $this->hostname = 'localhost';
        $this->db_username = 'root';
        $this->db_password = '';
        $this->dbname = 'nexgenproject_2.0';

        // Check if the database exists
        $check_db_conn = new mysqli($this->hostname, $this->db_username, $this->db_password);

        if ($check_db_conn->connect_error) {
            die("Temporary connection failed: " . $check_db_conn->connect_error);
        }

        $check_db_sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$this->dbname}'";
        $check_db_result = $check_db_conn->query($check_db_sql);

        if ($check_db_result && $check_db_result->num_rows > 0) {
            // Database exists
            echo 'The database ' . $this->dbname . ' exists.<br>';
        } else {
            // Database does not exist
            echo 'The database ' . $this->dbname . ' does not exist.<br>';

            $check_db_conn->close();

            echo '
            <script>
            
            location.href="/setup"
            
            </script>
            
            
            ';

            // header("location: /setup");
            exit;
        }

        // Close the temporary connection
        $check_db_conn->close();

        // Establish a connection to the database
        $conn = new mysqli($this->hostname, $this->db_username, $this->db_password, $this->dbname);

        if ($conn->connect_error) {
            die("Error connecting to database: " . $conn->connect_error);
        }

        return $conn;
    }
}

// Usage example
// $db = new Database();
// $conn = $db->connection();
?>
