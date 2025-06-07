<?php
include("theme-header.php");

$id=$_POST["id"];
$name=$_POST["name"];
$description=$_POST["description"];
$price=$_POST["price"];
$image=$_FILES["image"];

$link=mysqli_connect("localhost","root","","5gstore");
mysqli_query($link,"SET ChARACTER SET utf8");

if(!empty($_FILES["image"]["name"])){
    $source=$_FILES["image"]["tmp_name"];
    $target="images/".$_FILES["image"]["name"];
    move_uploaded_file($source,$target);
    $result=mysqli_query($link,"UPDATE `products` SET `name`='$name',`description`='$description',`image`='$target',`price`='$price' WHERE id=$id");
}else{
    $result=mysqli_query($link,"UPDATE `products` SET `name`='$name',`description`='$description' ,`price`='$price' WHERE id=$id");
}
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