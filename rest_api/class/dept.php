<?php
    class Dept{

        // Connection
        private $conn;

        // Table
        private $db_table = "dept";

        // Columns
        public $deptNo;
        public $deptName;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getDepts(){
            $sqlQuery = "SELECT dept_no, dept_name FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createDept(){

            // sanitize
            $this->deptNo =htmlspecialchars(strip_tags($this->deptNo));
            $this->deptName =htmlspecialchars(strip_tags($this->deptName));
            
            $sqlQuery = "INSERT INTO ". $this->db_table .
                        "(dept_no,dept_name) VALUES(:bp_dept_no,:bp_dept_name)";
        
            $stmt = $this->conn->prepare($sqlQuery);

            // bind data
            $stmt->bindParam(":bp_dept_no", $this->deptNo);
            $stmt->bindParam(":bp_dept_name", $this->deptName);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // UPDATE
        public function getSingleDept(){
            $sqlQuery = "SELECT dept_no, dept_name FROM ". $this->db_table .
                        " WHERE dept_no = :bp_dept_no LIMIT 0,1";

            $stmt = $this->conn->prepare($sqlQuery);

            $this->deptNo=htmlspecialchars(strip_tags($this->deptNo));
            
            $stmt->bindParam(":bp_dept_no", $this->deptNo);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            if($dataRow) {
                $this->deptNo = $dataRow["dept_no"];
                $this->deptName = $dataRow["dept_name"];
            }
            else {
                $this->deptNo = null;
                $this->deptName = null;
            }
        }        

        // UPDATE
        public function updateDept(){
            $sqlQuery = "UPDATE ". $this->db_table .
                        " SET dept_name = :bp_dept_name 
                        WHERE dept_no = :bp_dept_no";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->deptName=htmlspecialchars(strip_tags($this->deptName));
            $this->deptNo=htmlspecialchars(strip_tags($this->deptNo));
        
            // bind data
            $stmt->bindParam(":bp_dept_name", $this->deptName);
            $stmt->bindParam(":bp_dept_no", $this->deptNo);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteDept(){
            $sqlQuery = "DELETE FROM " . $this->db_table . 
                        " WHERE dept_no = :bp_dept_no";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->deptNo=htmlspecialchars(strip_tags($this->deptNo));
        
            $stmt->bindParam(":bp_dept_no", $this->deptNo);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>

