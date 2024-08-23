<?php 
include_once('admin/connect.php');
session_start();

$cartQuery = "SELECT product.id, product.productimage1, product.productname, product.productprice, cart.useremail, cart.quantity, cart.id AS cartid FROM cart LEFT JOIN product ON product.id = cart.productid WHERE cart.useremail = '" . $_SESSION['user'] . "'";
$cartResult = mysqli_query($con, $cartQuery);

// Initialize the total price and subtotal
$totalPrice = 0;
$subtotal = 0;

// Calculate the sum of prices
while ($cartItem = mysqli_fetch_assoc($cartResult)) {
    $subtotal += $cartItem['productprice'];
}

// Shipping cost
$shippingCost = 100;

// Calculate the total including shipping
$totalPrice = $subtotal + $shippingCost;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<?php
include_once('admin/connect.php');
if(isset($_POST['submit']))
{
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['no'];


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO `order` (deliveryaddress, useremail, paymentid,phonenumber) VALUES ('$address', '$email', '$phone')";

$order = mysqli_query($con, $sql);

if ($order) {
    echo "success";
} else {
    echo "you failed";
}
}

// Close the database connection when you're done
mysqli_close($con);
?>


<body>
    <!-- Topbar Start -->
<?php
include_once('header.php');
?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php
    include_once('navbar.php');
    ?>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <?Php
    $od="select * from order";
    $order=mysqli_query($con,$od);

    ?>
    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">

            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                <form action="" method="post">
                    <div class="row">
                        
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="your email" name="email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="mobile no" name="no">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Address </label>
                            <input class="form-control" type="text" placeholder="address" name="address">
                        </div>

                    </div>
                </div>
                
            </div>
            
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                
                <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal:  &#8377;<?php echo number_format($subtotal, 2); ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping:  &#8377;<?php echo number_format($shippingCost, 2); ?></h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total:  &#8377;<?php echo number_format($totalPrice, 2); ?></h5>
                        </div>
                </div>
                <div class="mb-5">
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <button type="submit"  name="submit "class="btn btn-block btn-primary font-weight-bold py-3">Place Order</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->


    <!-- Footer Start -->
    <?php
    include_once('footer.php');
    ?>
     <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>