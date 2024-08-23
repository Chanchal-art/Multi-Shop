<?php
session_start();
if(!isset($_SESSION['email'])){
 header("location:index.php");
}
?>
<?php
include "connect.php";
if(isset($_REQUEST['s_id']))
{
   $s_id=$_REQUEST['s_id'];
$qr="UPDATE slider SET status=1 WHERE id=$s_id";
$sql= mysqli_query($con,$qr); 
?>
<script>
    alert('activate');
   window.location="manage-slider.php";
</script>
<?php
}
if(isset($_REQUEST['d_id']))
{
    $d_id=$_REQUEST['d_id'];
$qrr="UPDATE slider SET status=0 WHERE id=$d_id";
$sqll= mysqli_query($con,$qrr); 

?>
<script>
    alert('De-Activate');
   window.location="manage-slider.php";
</script>
<?php
}
?>
    