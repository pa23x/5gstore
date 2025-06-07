
<?php
session_start();
include("theme-header.php");
?>
        <p>
        
            <a class="add" href="product_add.php"><i class="fa-solid fa-upload"></i></a>
        </p>
<?php  
$link=mysqli_connect("localhost","root","","5gstore");
mysqli_query($link,"SET ChARACTER SET utf8");
$result=mysqli_query($link,"SELECT * FROM `products` ORDER BY `name`");
mysqli_close($link);
$row=mysqli_fetch_array($result);
while($row){
    ?>
        <div class="row card">
            <div class="col-12 col-md-2">
                <p><?php echo($row["name"]); ?></p>
            </div>
            <div class="col-12 col-md-4">
                <p><?php echo($row["description"]); ?></p>
            </div>
            <div class="col-12 col-md-2">
                <img src="<?php echo($row["image"]); ?>" alt="">
            </div>
            <div class="col-12 col-md-2">
                <p><?php echo($row["price"]); ?> <span>تومان</span></p>
            </div>
            <div class="col-12 col-md-2">
                <button class="btn btn-success"><i class="fa-solid fa-pen"></i><a href="product_edit.php?id=<?php echo($row["id"]); ?>">edit</a></button>
                <button class="btn btn-danger"> <i class="fa-solid fa-trash"></i><a href="product_delete.php?id=<?php echo($row["id"]); ?>">delete</a></button>
            </div>
        </div>
<?php
$row=mysqli_fetch_array($result);
}

include("theme-footer.php");
?>