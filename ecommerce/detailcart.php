<?php
session_start();
include("admin/connect.php");
if($_SESSION['user'])
{
if(isset($_POST['addtocart']))
{
$did=$_POST['did'];
$sq3="insert into cart(productid,useremail,colour) values('$did','".$_SESSION['user']."','$dsd')";
$d39=mysqli_query($con,$sq3);
if($d39)
{?>
	<script>
	alert('added to cart');
	window.location="cart.php";
	</script>
	<?php
}
else
{?>
	<script>
	alert('Failed');
	window.location="shop.php";
	</script>
	<?php
}
}
}
else
{
	?>
	<script>
	alert('login first');
	window.location="signup.php";
	</script>
	<?php

}
?>