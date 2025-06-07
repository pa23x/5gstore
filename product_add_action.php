<?php
include("theme-header.php");

$name=$_POST["name"];
$description=$_POST["description"];
$price=$_POST["price"];
$image=$_FILES["image"];

$source=$_FILES["image"]["tmp_name"];
$target="images/".$_FILES["image"]["name"];;
move_uploaded_file($source,$target);
$link=mysqli_connect("localhost","root","","5gstore");
mysqli_query($link,"SET ChARACTER SET utf8");
$result=mysqli_query($link,"INSERT INTO `products` (`name`, `description`, `image`, `price`) VALUES ('$name', '$description', '$target', '$price')");
mysqli_close($link);

if($result==true){
    echo("ذخیره شد");
}else{
    echo("ذخیره نشد");

}

?>
       
       
<?php
include("theme-footer.php");
?>