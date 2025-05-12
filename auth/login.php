
<?php
session_start();
require_once '../includes/db.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();
    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: ../index.html");
        exit;
    } else {
        $message = "نام کاربری یا رمز عبور اشتباه است.";
    }
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ورود</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>ورود</h2>
        <form method="post">
            <input type="text" name="username" placeholder="نام کاربری" required><br><br>
            <input type="password" name="password" placeholder="رمز عبور" required><br><br>
            <input type="submit" value="ورود">
        </form>
        <p><?= $message ?></p>
    </div>
</body>
</html>
