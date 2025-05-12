
<?php
require_once 'includes/db.php';
$products = $conn->query("SELECT * FROM products")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>گالری محصولات</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h2>محصولات دیجیتال</h2>
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <img src="images/<?= $product['image'] ?>" width="150"><br>
                <strong><?= $product['name'] ?></strong><br>
                <p><?= $product['description'] ?></p>
                <p><b><?= $product['price'] ?> تومان</b></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
