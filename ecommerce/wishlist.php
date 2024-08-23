<?php
include_once('admin/connect.php');
session_start();
$cartQuery = "SELECT product.id, product.productimage1, product.productname, product.productprice, wishlist.useremail, wishlist.id AS wishlistid FROM wishlist LEFT JOIN product ON product.id = wishlist.productid WHERE wishlist.useremail = '" . $_SESSION['user'] . "'";
$cartResult = mysqli_query($con, $cartQuery);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop Wishlist</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Include header -->
    <?php include "header.php"; ?>

    <!-- Include navbar -->
    <?php include "navbar.php"; ?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="home.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="shop.php">Shop</a>
                    <span class="breadcrumb-item active">Wishlist</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Wishlist Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <!-- Wishlist table -->
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Wishlist id</th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    
                    <?php
                    while ($cartItem = mysqli_fetch_assoc($cartResult)) { ?>
                        <tbody class="align-middle">
                            <tr>
                                <td class="align-middle"><?php echo $cartItem['wishlistid']; ?></td>
                                <td class="align-middle">
                                    <img src="<?php echo 'admin/' . $cartItem['productimage1']; ?>" alt="" style="width: 50px;">
                                    <?php echo $cartItem['productname']; ?>
                                </td>
                                <td class="align-middle"><?php echo $cartItem['productprice']; ?></td>
                                <td class="align-middle">
                                    <a href="delete-wishlist.php?wid=<?php echo $cartItem['wishlistid']; ?>" class="btn btn-sm btn-danger">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
            <div class="col-lg-4">
                <a href="checkout.php"><button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button></a>
            </div>
        </div>
    </div>
    <!-- Wishlist End -->

    <!-- Include footer -->
    <?php include "footer.php"; ?>

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
