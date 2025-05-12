
<?php
$host = 'localhost';
$db = '5gstore';
$user = 'root';
$pass = ''; // در WAMP معمولاً پسورد خالیه

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("خطا در اتصال به دیتابیس: " . $e->getMessage());
}
?>


