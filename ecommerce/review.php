<?php
include_once('admin/connect.php');
if(isset($_POST['btn1']))
{
    $review = $_POST['review'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];
    $productid = $_POST['productid']; // Assuming you have a field named productid in your form
 // Make sure to use the correct column names and values in your query
    $sql = "INSERT INTO review (username, `review`, rating, useremail, productid) VALUES ('$name', '$review', '$rating', '$email', '$productid')";
$query = mysqli_query($con, $sql);
    if($query){
        echo "Success";
    }
    else{
        echo "Failed";
    }
}
?>
