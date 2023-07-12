<?php 
    class Database {
        private $host = "localhost";
        private $dbname = "hr";
        private $user = "root";
        private $passwd = "";

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->passwd);
            }catch(PDOException $exception){
                http_response_code(500);
                echo json_encode([
                    'success' => 0,
                    'message' => $exception->getMessage()
                ]);
                exit;
            }
            return $this->conn;
        }
    }  
?>