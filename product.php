
<?php
include("theme-header.php");
?>
<?php  
$link=mysqli_connect("localhost","root","","5gstore");
mysqli_query($link,"SET ChARACTER SET utf8");
$result=mysqli_query($link,"SELECT * FROM `products` ORDER BY `name`");
mysqli_close($link);
$row=mysqli_fetch_array($result);
while($row){
    ?>
        <div class="row card">
            <div class="col-12 col-md-2 img">
                <img src="<?php echo($row["image"]); ?>" alt="">
            </div>
            <div class="col-12 col-md-2 text">
                <p><?php echo($row["name"]); ?></p>
            </div>
            <div class="col-12 col-md-4 text">
                <p><?php echo($row["description"]); ?></p>
            </div>
            <div class="col-12 col-md-2 text">
                <p><?php echo($row["price"]); ?> <span>تومان</span></p>
            </div>
        </div>
<?php
$row=mysqli_fetch_array($result);
}

include("theme-footer.php");
?>