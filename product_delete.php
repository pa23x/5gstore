<?php
include("theme-header.php");
$id=$_GET["id"];

$link=mysqli_connect("localhost","root","","5gstore");
mysqli_query($link,"SET ChARACTER SET utf8");
$result=mysqli_query($link,"DELETE FROM `products` WHERE id=$id");
mysqli_close($link);

if($result==true){
    echo("حذف شد");
}else{
    echo("حذف نشد");

}

?>    
       
<?php
include("theme-footer.php");
?>