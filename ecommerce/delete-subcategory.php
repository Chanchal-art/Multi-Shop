<?php
include "connect.php";
$rid=$_REQUEST['id'];
$sql="delete from  subcategory where id='$rid'";
mysqli_query($con,$sql);
header("location:manage-subcategory.php");


?>