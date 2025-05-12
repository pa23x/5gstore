
<?php
session_start();
require_once '../includes/db.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die("دسترسی غیرمجاز!");
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
$stmt->execute([$id]);
$product = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $image = $product['image'];
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);
    }
    $stmt = $conn->prepare("UPDATE products SET name=?, description=?, image=?, price=? WHERE id=?");
    $stmt->execute([$name, $desc, $image, $price, $id]);
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش محصول</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h2>ویرایش محصول</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" value="<?= $product['name'] ?>" required><br><br>
        <textarea name="description" required><?= $product['description'] ?></textarea><br><br>
        <input type="file" name="image"><br><br>
        <input type="number" name="price" value="<?= $product['price'] ?>" required><br><br>
        <input type="submit" value="ویرایش">
    </form>
</div>
</body>
</html>
