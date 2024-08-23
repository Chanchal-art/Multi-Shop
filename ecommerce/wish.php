<?php
session_start();
include("admin/connect.php");
if(isset($_POST['addtocart']))
{
$did=$_POST['did'];
$sq3="insert into wishlist(productid,useremail) values('$did','".$_SESSION['user']."')";
$d39=mysqli_query($con,$sq3);
if($d39)
{?>
	<script>
	alert('added to cart');
	window.location="wishlist.php.php";
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
?>