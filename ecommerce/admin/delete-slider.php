<?php
include "connect.php";
$rid=$_REQUEST['s_id'];
	$sql="delete from slider where id='$rid'";
mysqli_query($con,$sql);
header("location:manage-slider.php");


?>