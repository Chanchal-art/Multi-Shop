<?php
session_start();
if(!isset($_SESSION['email'])){
 header("location:index.php");
}
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

    <script>
        function getsubcategory(val)
        {
            //alert(val);
            $.ajax
            ({
                type:"POST",
                url:"getsubcategory.php",
                data:'category='+val,
                success: function(data)
            {
                $('#subcat').html(data);
            }

            });
        }
    </script>

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

            <?php
                include('connect.php');

            
                //for Category
                $sub1 ="SELECT * FROM category";
                $subdata1 = mysqli_query($con,$sub1);
                 
                if(isset($_POST['btn']))
                {
                    $pname = $_POST['name'];
                    $pdetail= $_POST['detail'];
                    $pprice = $_POST['price'];
                    $subcategory = $_POST['subcategory'];
                   $description = $_POST['description'];
    



            //image1
                $img1=rand(0000,99999).basename($_FILES['image1']['name']);
                    $temp1=$_FILES['image1']['tmp_name'];
                    $path1 ="image/";
                    $dir1 =$path1.$img1;
                    $upload1 =move_uploaded_file($temp1,$dir1);

                    
                            //image2
                            $img2=rand(0000,99999).basename($_FILES['image2']['name']);
                            $temp2=$_FILES['image2']['tmp_name'];
                            $path2 ="image/";
                            $dir2 =$path2.$img2;
                            $upload1 =move_uploaded_file($temp2,$dir2);

                            
                    //image3
                        $img3=rand(0000,99999).basename($_FILES['image3']['name']);
                        $temp3=$_FILES['image3']['tmp_name'];
                        $path3 ="image/";
                        $dir3 =$path3.$img3;
                        $upload3 =move_uploaded_file($temp3,$dir3);
                        
                        //image4
                            $img4=rand(0000,99999).basename($_FILES['image4']['name']);
                            $temp4=$_FILES['image4']['tmp_name'];
                            $path4 ="image/";
                            $dir4 =$path4.$img4;
                            $upload4 =move_uploaded_file($temp4,$dir4);
                    
                    $sql = "INSERT INTO product(productname, productdetail,productprice, description,productimage1,productimage2,productimage3,productimage4,subcategory)values('$pname','$pdetail','$pprice','$description','$dir1','$dir2','$dir3','$dir4','$subcategory')";

                    $query = mysqli_query($con, $sql);
   if($query)
                    {
                        ?>
                        <script>
                            alert('data added');
                            window.location = "manage-product.php";
                        </script>
                        <?php
                    }
                    else
                    {
                        ?>
                        <script>
                            alert('failed');
                            window.location = "add-category.php";
                        </script>
                        <?php
                    }
                }
            ?>


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h6 class="mb-4">Add Product</h6>
                                <form>
                                    <div class="mb-3">
                                        <label class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Product Details</label>
                                        <input type="text" class="form-control" name="detail">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Product Price</label>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                               <div class="mb-3">
                                        <label class="form-label">product description</label>
                                        <input type="text" class="form-control" name="description">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Image l</label>
                                        <input type="file" class="form-control" name="image1">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Image ll</label>
                                        <input type="file" class="form-control" name="image2">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Image lll</label>
                                        <input type="file" class="form-control" name="image3">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Image lV</label>
                                        <input type="file" class="form-control" name="image4">
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">category</label>
                                        <select name="category" id="cat" onchange="getsubcategory(this.value)" class="form-control" required>
                                        <option value="">select</option>
                                            <?Php 
                                            while($select1 =mysqli_fetch_assoc($subdata1))
                                            {
                                                ?>
                                                
                                            <option value="<?Php echo $select1['id'];?>">
                                           <?php echo $select1['category'];?></option>
                                           <?php
                                             }
                                             ?>
                                    </select>
                                    <div class="mb-3"  >
                                        <label class="form-label">Subcategory</label>
                                        <select name="subcategory" id="subcat" class="form-control" required>
                                            
                                    </select>

                                    </div>
                                                        <div class="d-flex mb-4">
                        <strong class="text-danger mr-3">Colors:</strong>
                        
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="color-1" name="color">
                                <label class="custom-control-label" for="color-1">Black</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="color-2" name="color">
                                <label class="custom-control-label" for="color-2">White</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="color-3" name="color">
                                <label class="custom-control-label" for="color-3">Red</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="color-4" name="color">
                                <label class="custom-control-label" for="color-4">Blue</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="color-5" name="color">
                                <label class="custom-control-label" for="color-5">Green</label>
                            </div>
                             </div>
                                    <button type="submit" class="btn btn-primary" name="btn">Submit</button>
                                </form>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
            <!-- Form End -->


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

