<?php
include_once "../connection.php";
if (isset($_POST['checking_delete'])){
    $product_id = $_POST['product_id'];
       $query = "delete from carts where product_Id = '$product_id' ";
    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        echo $return  = "Successfully Deleted";
    }
    else
    {
        echo $return  = "Something Went Wrong.!";
    }
}