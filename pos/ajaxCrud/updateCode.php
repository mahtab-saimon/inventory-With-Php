<?php
include_once "../connection.php";
    if (isset($_POST['checking_update'])){
        $quantity = $_POST['quantity'];
        $product_id = $_POST['product_id'];
        $sQuery = "select * from products where id = '$product_id'";
        $query_run = mysqli_query($conn, $sQuery);
        $result = $query_run->fetch_assoc();
        $available_quantity = $result['stock_quantity'];
       // return $product_id;
       // print_r($available_quantity);
      //  die();

         $query = "update carts
                    set
                    quantity = '$quantity'
                    where product_Id = '$product_id' ";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            $p_query = "update products
                                 set
                             stock_quantity=('$available_quantity'-'$quantity')

                        where id = '$product_id' ";
            $query_run = mysqli_query($conn, $p_query);
            echo $return  = "Successfully Stored";
        }
        else
        {
            echo $return  = "Something Went Wrong.!";
        }
    }