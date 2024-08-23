<?php
include_once("admin/connect.php");
$val = $_REQUEST['search'];
// Use LIKE and '%' around the variable
$qds = "SELECT * FROM product WHERE productname LIKE '%$val%' OR productdetail LIKE '%$val%'";
$rd = mysqli_query($con, $qds);
while ($rt = mysqli_fetch_assoc($rd)) {
?>
    <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?php echo 'admin/'.$rt['productimage1'];?>" style="height:320px;" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="detail.php?sd=<?php echo $rt['id'];?>"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="detail.php?sd"><?php echo $rt['productname'];?></a>
                        <div xclass="d-flex align-items-center justify-content-center mt-2">
                            <h5><?php echo $rt['productprice'];?></h5><h6 class="text-muted ml-2"><del>$123.00</del></h6>
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
                           <input type="hidden" name="did" value="<?php echo $rt['id'];?>">
                             <button type="" class="btn btn-primary" name="addtocart">Add To Cart</button>
                          </form>
                    </div>                    
                </div>
            </div>
<?php
}
?>
