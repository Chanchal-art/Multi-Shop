<?php
include "connect.php";
$rid=$_REQUEST['pro_id'];
$sql="delete from product where id='$rid'";
mysqli_query($con,$sql);
header("location:manage-product.php");
?>