<?php
session_start();
if (isset($_SESSION['user'])) {
    include("admin/connect.php");
    
    if (isset($_POST['addtocart'])) {
        $did = $_POST['did'];
        $quantity = $_POST['quentity'];

        $sq3 = "INSERT INTO cart (productid, quantity, useremail) VALUES ('$did', '$quantity', '" . $_SESSION['user'] . "')";
        $d39 = mysqli_query($con, $sq3);
        
        if ($d39) {
            ?>
            <script>
                alert('Added to cart');
                window.location = "cart.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Failed');
                window.location = "shop.php";
            </script>
            <?php
        }
        exit(); // Move exit() here
    } 
    }else
    {
        ?>
        <script>
            alert('Login first');
            window.location = "login.php";
        </script>
        <?php
    }

?>
