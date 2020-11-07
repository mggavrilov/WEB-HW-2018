<?php 
    class Database {
        private $dbHost = "localhost";
        private $dbName = "webdb";
        private $dbUser = "root";
        private $dbPass = "";
        
        private $conn;
        
        public function __construct() {
            try {
                $this->conn = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName", $this->dbUser, $this->dbPass);
            } catch(PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        
        public function saveElective($save) {
            $stmt = $this->conn->prepare("INSERT INTO electives (title, description, lecturer, created_at) VALUES (?, ?, ?, NOW())");
            $stmt->execute(array($save['title'], $save['description'], $save['lecturer']));
        }
    }
?>