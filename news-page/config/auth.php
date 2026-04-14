<?php
// config/auth.php
session_start();

class Auth {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Login function
    public function login($username, $password) {
        $query = "SELECT * FROM admin_users WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if(password_verify($password, $row['password'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_username'] = $row['username'];
                return true;
            }
        }
        return false;
    }
    
    // Logout function
    public function logout() {
        session_destroy();
        return true;
    }
    
    // Check if user is logged in
    public function isLoggedIn() {
        return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
    }
    
    // Require login (redirect if not logged in)
    public function requireLogin() {
        if(!$this->isLoggedIn()) {
            header('Location: admin_login.php');
            exit();
        }
    }
    
    // Get current admin username
    public function getCurrentUser() {
        return $_SESSION['admin_username'] ?? null;
    }
}
?>
