 <?php
    include_once("admin/connect.php");
$sd=$_REQUEST['sd'];
 $pro="SELECT * FROM product WHERE id='$sd'";
 $product=mysqli_query($con,$pro);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop  detail</title>
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

<body>
    <!-- Topba r Start -->
    <?php
    include_once("header.php");
    ?>
    <!-- Topbar End -->


    <!-- Navbar Start -->
   <?php
   include "navbar.php";
   ?>
    <!-- Navbar End -->


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="home.php">Home</a>
                    <a class="breadcrumb-item text-dark" href="shop.php">Shop</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <?php
                     $pt=mysqli_fetch_assoc($product);
                    ?>
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="<?php echo 'admin/'.$pt['productimage1'];?>" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="<?php echo 'admin/'.$pt['productimage2'];?>" alt="Image">
                    </div>
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="<?php echo 'admin/'.$pt['productimage3'];?>" alt="Image">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="<?php echo 'admin/'.$pt['productimage4'];?>" alt="Image">
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3><?php echo $pt['productname'];?></h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2">
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star"></small>
                            <small class="fas fa-star-half-alt"></small>
                            <small class="far fa-star"></small>
                        </div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">$150.00</h3>
                   
                    <div class="d-flex mb-4">
    <?php
    $commaSeparatedValues = $pt['colour'];

    // Split the string into an array using a comma as the separator
    $explodedArray = explode(",", $commaSeparatedValues);

    // Now, $explodedArray contains the values as individual elements
    // You can access them like this:
    foreach ($explodedArray as $value) {
        echo "<input type='checkbox' style='margin-right: 5px; padding 60px;'>$value <br>\n";
    }
    ?>
</div>

                    <div class="d-flex align-items-center mb-4 pt-2">
                        
                           <input type="hidden" name="did" value="<?php echo $Pt['id'];?>">
                             <button type="submit" class="btn btn-primary" name="addtocart">Add To Cart</button>
                          </form>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        $review="select * from review";
        $result=mysqli_query($con,$review);
       ?>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                        <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Reviews (0)</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <h4 class="mb-3"><?php echo $pt['description'];?></h4>
                        </div>
                        
                        <div class="tab-pane fade" id="tab-pane-3">
                                <?php  
                                 while($rw=mysqli_fetch_assoc($result))
                                {  ?>
                                <div class="col-md-6">
                                    
                                    <div class="media mb-4">
                                        <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6><?php echo $rw['username'];?><small><i><?php echo $rw['date'];?></i></small></h6>
                                            <div class="text-primary mb-2"><?php echo $rw['rating'];?>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <p><?php echo $rw['review'];?></p>
                                        </div>
                                    </div>                        
                                </div>
                                
                                <?php
                                }?>
                                <div class ="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a review</h4>
                                    <small>Your email address will not be published. Required fields are marked *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Your Rating * :</p>
                                        <div class="text-primary">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <form action="review.php" method="post">
                                        <div class="form-group">
                                            <label for="message">Your Review *</label>
                                            <textarea id="message" cols="30" rows="5" name="review" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Your Name *</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Your Email *</label>
                                            <input type="email" class="form-control"name="email" id="email">
                                        </div>
                                        <div class="form-group">
                                            <select name="rating" class="form-control" placeholder="your rating">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                </select>
                                            </div>
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" name="btn1" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


     <!-- Products Start -->

 

         <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
        <?php
          $sp="select * from product where subcategory='".$pt['subcategory']."'and id !='".$sd."'";
          $st=mysqli_query($con,$sp);
        ?>
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php
                    while($pr= mysqli_fetch_assoc($st))
                    {
                    ?>
                    <div class="product-item bg-light">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?php echo 'admin/'.$pr['productimage2'];?>" alt="">
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href=""><?php echo $pr['productname']?>;</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                         <h5><?php echo $pt ['productprice'];?></h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                                  <form action="addtocart.php" method="post">
                                 <input type="hidden" name="did" value="<?php echo $pr['id'];?>">
                                <button type="" class="btn btn-primary" name="addtocart">Add To Cart</button>
                               </form>

                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
             </div>
             

             </div>
        </div>
    <!-- Products End -->


    <!-- Footer Start -->
    <?php
    include_once("footer.php");
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