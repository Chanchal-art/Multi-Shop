<?php
session_start();
if(!isset($_SESSION['email'])){
header("location:index.php");
}
?>
<?php
include "connect.php";
$rid=$_REQUEST['cat_id'];
	$sql="delete from category where id='$rid'";
mysqli_query($con,$sql);
header("location:manage-category.php");


?>