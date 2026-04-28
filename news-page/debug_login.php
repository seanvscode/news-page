<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>LOGIN DEBUGGER</h1>";

// 1. Check if database.php exists and works
echo "<h3>1. Testing database connection...</h3>";
if (!file_exists('config/database.php')) {
    die("ERROR: config/database.php not found!");
}
require_once 'config/database.php';
$database = new Database();
$db = $database->getConnection();
if (!$db) {
    die("ERROR: Cannot connect to database. Check MySQL is running.");
}
echo "✓ Database connected.<br>";

// 2. Check admin_users table
echo "<h3>2. Checking admin_users table...</h3>";
$result = $db->query("SHOW TABLES LIKE 'admin_users'");
if ($result->rowCount() == 0) {
    die("ERROR: Table 'admin_users' does not exist. Run the SQL to create it.");
}
echo "✓ Table exists.<br>";

// 3. Get the admin record
echo "<h3>3. Fetching admin user...</h3>";
$stmt = $db->prepare("SELECT * FROM admin_users WHERE username = 'admin'");
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user) {
    die("ERROR: No user with username 'admin' found.");
}
echo "✓ User found. Username: " . $user['username'] . "<br>";
echo "Password stored (raw): " . $user['password'] . "<br>";

// 4. Test plain text comparison
echo "<h3>4. Testing password comparison...</h3>";
$test_password = 'admin123';
if ($test_password == $user['password']) {
    echo "<span style='color:green'>✓ Plain text match! Password is 'admin123'</span><br>";
} else {
    echo "<span style='color:red'>✗ Password in DB is NOT 'admin123'. It is: " . $user['password'] . "</span><br>";
}

// 5. Test login function from auth.php
echo "<h3>5. Testing Auth::login() method...</h3>";
require_once 'config/auth.php';
$auth = new Auth($db);
$login_result = $auth->login('admin', 'admin123');
echo "Auth::login returned: " . ($login_result ? "TRUE" : "FALSE") . "<br>";

// 6. Check session
echo "<h3>6. Session after login attempt...</h3>";
session_start();
echo "Session variable 'admin_logged_in' = " . (isset($_SESSION['admin_logged_in']) ? $_SESSION['admin_logged_in'] : 'NOT SET') . "<br>";
echo "Session variable 'admin_username' = " . ($_SESSION['admin_username'] ?? 'NOT SET') . "<br>";

echo "<hr>";
echo "<h2>If you see any ✗, fix that issue. If all ✓, then the login form itself may have a problem.</h2>";
?>