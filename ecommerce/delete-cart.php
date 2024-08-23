<?php
include "admin/connect.php";
$rid=$_REQUEST['cd'];
$sql="delete from cart where id='$rid'";
mysqli_query($con,$sql);?>
<script>
            alert('deleted');
            window.location="cart.php";
        </script>
