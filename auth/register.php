
<?php
session_start();
require_once '../includes/db.php';

$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        $message = "ثبت‌نام با موفقیت انجام شد. حالا می‌تونید وارد بشید.";
    } else {
        $message = "خطا در ثبت‌نام: نام کاربری ممکنه تکراری باشه.";
    }
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ثبت‌نام</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>ثبت‌نام</h2>
        <form method="post">
            <input type="text" name="username" placeholder="نام کاربری" required><br><br>
            <input type="password" name="password" placeholder="رمز عبور" required><br><br>
            <input type="submit" value="ثبت‌نام">
        </form>
        <p><?= $message ?></p>
    </div>
</body>
</html>
