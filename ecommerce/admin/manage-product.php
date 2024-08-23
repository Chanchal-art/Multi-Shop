<?php
                include('connect.php');

                //define total number of results you want per page  
    $rows_per_page = 2;  
  
    //find the total number of results stored in the database  
    $query = "select *from product";  
    $result = mysqli_query($con, $query);  
    $total_row = mysqli_num_rows($result);  
    
    
  
    //determine the total number of pages available  
    $number_of_page = ceil ($total_row / $rows_per_page);  
  
    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  
  
    //determine the sql LIMIT starting number for the results on the displaying page  
    $offset = ($page-1) * $rows_per_page;  
  
    //retrieve the selected results from database   
    $fproduct = "SELECT * FROM product LIMIT " . $offset . ',' . $rows_per_page; 
               

                $prodata = mysqli_query($con, $fproduct);
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php
            include('sidebar.php');
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
                include('header.php');
            ?>
            <!-- Navbar End -->

           


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Manage product</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                            <th scope="col">id</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Product detail</th>
                                            <th scope="col">Product price</th>
                                            <th scope="col">Product image I</th>
                                            <th scope="col">Product image II</th>
                                            <th scope="col">Product image III</th>
                                            <th scope="col">Product image Iv</th>
                                            <th scope="col">subcategory</th>
                                            
                                        </tr>
                                    </thead>
                                    <?php
                                        while($rc = mysqli_fetch_assoc($prodata))
                                        {
                                             ?>
                                                <tbody>
                                                    <tr>
                                                        <th ><?php echo $rc['id']; ?></th>
                                                        <td><?php echo $rc['productname']; ?></td>
                                                        <td><?php echo $rc['productdetail']; ?></td>
                                                        <td><?php echo $rc['productprice']; ?></td>
                                                        <td><img src="<?php echo $rc['productimage1']; ?>" style="height: 100px; width: 100px;" alt=""></td>
                                                        <td><img src="<?php echo $rc['productimage2']; ?>" style="height: 100px; width: 100px;"alt=""></td>
                                                        <td><img src="<?php echo $rc['productimage3']; ?>" style="height: 100px; width: 100px;"alt=""></td>
                                                        <td><img src="<?php echo $rc['productimage4']; ?>" style="height: 100px; width: 100px;"alt=""></td>
                                                        <td><?php echo $rc['subcategory']; ?></td>

                                                        <td><a href="edit-product.php?pro_id=<?php echo $rc['id']; ?>" class="btn btn-success">edit</a>
                                                        <a href="delete-product.php?pro_id=<?php echo $rc['id']; ?>" class="btn btn-danger">delete</a></td>
                                                    </tr>
                                                </tbody>
                                             <?php   
                                        }
                                    ?>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
            <?php
            //display the link of the pages in URL  
    for($page = 1; $page<= $number_of_page; $page++) {  
        echo '<a href = "manage-product.php?page=' . $page . '">' . $page . ' </a>';  
    }  

    ?>

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>