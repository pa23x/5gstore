
<?php
session_start();
require_once '../includes/db.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    die("دسترسی غیرمجاز!");
}

// حذف محصول
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
    $stmt->execute([$id]);
    header("Location: dashboard.php");
    exit;
}

// لیست محصولات
$products = $conn->query("SELECT * FROM products")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>مدیریت محصولات</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
    <h2>پنل مدیریت محصولات</h2>
    <a href="add_product.php">+ افزودن محصول جدید</a>
    <table border="1" cellpadding="10" style="margin-top:20px;">
        <tr><th>تصویر</th><th>نام</th><th>توضیحات</th><th>قیمت</th><th>عملیات</th></tr>
        <?php foreach ($products as $p): ?>
            <tr>
                <td><img src="../images/<?= $p['image'] ?>" width="80"></td>
                <td><?= $p['name'] ?></td>
                <td><?= $p['description'] ?></td>
                <td><?= $p['price'] ?> تومان</td>
                <td>
                    <a href="edit_product.php?id=<?= $p['id'] ?>">ویرایش</a> |
                    <a href="?delete=<?= $p['id'] ?>" onclick="return confirm('مطمئنی؟')">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
