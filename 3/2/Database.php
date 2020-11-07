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
            if(isset($save['id'])) {
                $stmt = $this->conn->prepare("UPDATE electives SET title = ?, description = ?, lecturer = ? WHERE id = ?");
                $stmt->execute(array($save['title'], $save['description'], $save['lecturer'], $save['id']));
            }
            else {
                $stmt = $this->conn->prepare("INSERT INTO electives (title, description, lecturer, created_at) VALUES (?, ?, ?, NOW())");
                $stmt->execute(array($save['title'], $save['description'], $save['lecturer']));
            }
        }
        
        public function getElective($id) {
            $stmt = $this->conn->prepare("SELECT id, title, description, lecturer FROM electives WHERE id = ?");
            $stmt->execute(array($id));
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>