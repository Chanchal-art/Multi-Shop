<?Php
include('connect.php');
$cat=$_REQUEST['category'];
$sub = "SELECT * FROM subcategory WHERE category='$cat'";
$subdata = mysqli_query($con, $sub);
while ($select = mysqli_fetch_assoc($subdata)) 
{
?>
    <option value="<?Php echo $select['id']; ?>">
        <?php echo $select['subcategory']; ?></option>
<?php
}
?>