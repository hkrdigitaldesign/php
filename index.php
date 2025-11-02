<?php
// Check if PDO is installed
if (!extension_loaded('pdo')) {
    die("❌ PDO is not installed!");
}

if (!extension_loaded('pdo_mysql')) {
    die("❌ PDO MySQL driver is not installed!");
}

echo "✅ PDO is installed<br>";
echo "✅ PDO MySQL driver is installed<br><br>";

// Database connection details
$host = 'mysql';
$db = 'mydb';
$user = 'root';
$pass = 'root';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    // Create PDO connection
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✅ <strong>Successfully connected to MySQL database!</strong><br><br>";
    
    // Get MySQL version
    $version = $pdo->query('SELECT VERSION()')->fetchColumn();
    echo "📊 MySQL Version: $version<br>";
    
    // Show available databases
    $stmt = $pdo->query('SHOW DATABASES');
    echo "<br>📁 Available Databases:<br>";
    while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
        echo "  - $row[0]<br>";
    }
    
    echo "<br>🎉 Everything is working perfectly!";
    
} catch (PDOException $e) {
    echo "❌ <strong>Connection failed:</strong> " . $e->getMessage();
}
?>