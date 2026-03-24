<?php
// setup_admin.php - Run this to create admin users table and default admin
require_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

try {
    // Create admin users table
    $query = "CREATE TABLE IF NOT EXISTS admin_users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    $db->exec($query);
    echo "Admin users table created successfully!<br>";
    
    // Check if admin user exists
    $check = $db->query("SELECT COUNT(*) FROM admin_users WHERE username = 'admin'")->fetchColumn();
    
    if($check == 0) {
        // Create default admin user (password: admin123)
        $password = password_hash('admin123', PASSWORD_DEFAULT);
        $query = "INSERT INTO admin_users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $db->prepare($query);
        $stmt->execute([
            ':username' => 'admin',
            ':password' => $password,
            ':email' => 'admin@eagleschool.com'
        ]);
        echo "Default admin user created!<br>";
        echo "Username: admin<br>";
        echo "Password: admin123<br>";
    } else {
        echo "Admin user already exists.<br>";
    }
    
    echo "Setup complete!";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
