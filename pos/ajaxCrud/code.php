

<?php
include_once "../connection.php";
    if (isset($_POST['checking_add'])){
         $product_Id =$_POST['product_Id'];
         $price =$_POST['product_price'];
         $customer_Id =$_POST['customer_Id'];
         $quantity =$_POST['quantity'];
        $sQuery = "select * from products where id = '$product_Id'";
        $query_run = mysqli_query($conn, $sQuery);
        $result = $query_run->fetch_assoc();
        $image = $result['productImage'];
        $available_quantity = $result['stock_quantity'];

/*        $p_query = "select * from carts where product_Id = '$product_Id' limit 1";
        $Check = mysqli_query($conn, $p_query);
        if ($Check !=false){
            echo $return = "Product Already Exist";
        }else {*/

            $query = "INSERT INTO carts (customer_Id, product_Id, quantity, price, image ) 
             VALUES('$customer_Id', '$product_Id', '$quantity', '$price', '$image')";

            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
                $p_query = "update products
                                 set
                             stock_quantity=('$available_quantity'-'$quantity')

                        where id = '$product_Id' ";
                $query_run = mysqli_query($conn, $p_query);

                echo $return = "Successfully Stored";
            } else {
                echo $return = "Something Went Wrong.!";
            }
//        }
    }