<?php
include("theme-header.php");
$username=$_POST["username"];
$password=$_POST["password"];

$connect=mysqli_connect("localhost","root","","5gstore");
$result=mysqli_query($connect,"INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES (NULL, '$username', '$password', 'user')");
mysqli_close($connect);

if($result){
    echo("ذخیره شد");
}else{
    echo("ذخیره نشد");

}
?>
   
<?php
include("theme-footer.php");
?>