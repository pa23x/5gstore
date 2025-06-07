
<?php
include("theme-header.php");
?>

<form action="product_add_action.php" method="post" class="row card" enctype="multipart/form-data">
    <input class="form-control" type="text" name="name" placeholder="نام">
    <input class="form-control"  type="text" name="description" placeholder="توضیحات">
    <input class="form-control"  type="text" name="price" placeholder="قیمت">
    <input class="form-control"  type="file" name="image" placeholder="تصویر">
    <input class="form-control btn btn-success"  type="submit" value="ذخیره">
</form>
 
<?php
include("theme-footer.php");
?>