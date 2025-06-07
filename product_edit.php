
<?php
include("theme-header.php");
$id=$_GET["id"];

$link=mysqli_connect("localhost","root","","5gstore");
mysqli_query($link,"SET ChARACTER SET utf8");
$result=mysqli_query($link,"SELECT * FROM `products` WHERE id=$id");
mysqli_close($link);
$row=mysqli_fetch_array($result);

?>

<form action="product_edit_action.php" method="post" class="row card" enctype="multipart/form-data">
    <input class="form-control" type="text" name="id" value="<?php echo($id); ?>">
    <input class="form-control" type="text" name="name" value="<?php echo($row["name"]); ?>" placeholder="نام">
    <input class="form-control"  type="text" name="description" value="<?php echo($row["description"]); ?>" placeholder="توضیحات">
    <input class="form-control"  type="file" name="image" placeholder="تصویر">
    <input class="form-control"  type="text" name="price" value="<?php echo($row["price"]); ?>" placeholder="قیمت">
    <input class="form-control btn btn-success"  type="submit" value="ذخیره">
</form>
 
<?php
include("theme-footer.php");
?>