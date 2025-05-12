
<?php
session_start();
require_once '../includes/db.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die("دسترسی غیرمجاز!");
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);
    $stmt = $conn->prepare("INSERT INTO products (name, description, image, price) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $desc, $image, $price])) {
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "خطا در افزودن محصول.";
    }
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>افزودن محصول</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h2>افزودن محصول</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="نام محصول" required><br><br>
        <textarea name="description" placeholder="توضیحات" required></textarea><br><br>
        <input type="file" name="image" accept="image/*" required><br><br>
        <input type="number" name="price" placeholder="قیمت" required><br><br>
        <input type="submit" value="افزودن">
    </form>
    <p><?= $message ?></p>
</div>
</body>
</html>
