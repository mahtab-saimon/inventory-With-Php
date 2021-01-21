<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php";
include_once $filepath."/../helpers/Format.php";
?>

<?php

class Cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function addTocart($data)
    {
        /*  echo "<pre>";

          print_r($data);

          die();

          */
//        $product_Id = $this->fm->validation($data['product_Id']);
//        $product_Id = mysqli_real_escape_string($this->db->link, $product_Id);
//
//        $price = $this->fm->validation($data['price']);
//        $price = mysqli_real_escape_string($this->db->link, $price);
//
//        $customer_Id = $this->fm->validation($data['customer_Id']);
//        $customer_Id = mysqli_real_escape_string($this->db->link, $customer_Id);
//
//        $quantity = $this->fm->validation($data['quantity']);
//        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
//
//        $sQuery = "select * from products where id = '$product_Id'";
//        $result = $this->db->select($sQuery)->fetch_assoc();
//        $image = $result['productImage'];
//        $cheQuery = "select * from carts where product_Id = '$product_Id' and customer_Id='$customer_Id'";
//        $getPro = $this->db->select($cheQuery);
//        if ($getPro) {
//            $msg = "Product Already Added";
//            return $msg;
//        } else {
//            $query = "INSERT INTO carts (customer_Id, product_Id, quantity, price, image )
//             VALUES('$customer_Id', '$product_Id', '$quantity', '$price', '$image')";
//
//            $inserted_rows = $this->db->insert($query);
//            if ($inserted_rows) {
//                header("location:pos.php");
//            } else {
//                header("location:404.php");
//            }
//        }
    }


    public function getCartProduct()
    {

        $query = "select *,carts.id as 
                    cartId,products.id as product_Id, 
                    customers.id as cus_Id , 
                    carts.image as cart_Image  
                               from 
                    carts,products,customers
                               where
                  carts.customer_Id=customers.id 
                              and 
                 carts.product_Id = products.id              ";
        $result = $this->db->select($query);
        return $result;
    }

    public function ord()
    {
        $query = "select *
                       from 
                    carts
                              ";
        $result = $this->db->select($query);
        return $result;

    }
    public function getInvoice($cus_Id)
    {
        /*
        select *,carts.id as
                    cartId,products.id as product_Id,
                    customers.id as cus_Id
                    from carts,products,customers
                               where
                  carts.customer_Id='$cus_Id' */

        $query = "SELECT C.*, C.id as C_id, CS.* , CS.id as cus_Id from carts  as C
                INNER JOIN customers as CS ON C.customer_Id = CS.id
                                    where
                               CS.id ='$cus_Id'
                              
 ";

        $result = $this->db->select($query);

        return $result;
    }
    public function getInvoiceproducts($cus_Id){

        /*SELECT  P.*, OD.* from orderdetails  as OD
                INNER JOIN products  as P ON OD.product_Id = P.id
                                    where
                             OD.order_Id ='$id'

        SELECT C.*, C.id as C_id, P.* ,P.id as P_id from carts  as C
                INNER JOIN products as P ON C.product_Id = P.id
                                    where
                              C.product_Id = P.id
                                     and
                              C.customer_Id = '$cus_Id'

        */

        $query = "select * from carts where carts.customer_Id = '$cus_Id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getInvoiceTotal(){


        $query = "select customer_Id, sum(quantity*price) as total
                                                from carts
                                                group by customer_Id";
        $result = $this->db->select($query);
        return $result;
    }


    public function updateCartQuantity($quantity, $cartId)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = $this->fm->validation($cartId);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);

        $updateQuery = "update carts set
                            quantity = '$quantity'
                            where id= '$cartId'";
        $cartUpdate = $this->db->update($updateQuery);
        if ($cartUpdate) {
            header("location:pos.php");
        } else {
            $msg = "<span style='color:red; font_size:18px;'>Quantity Not  Updated ..</span>";
            return $msg;
        }

    }


    public function delCartById($id){
        $query = "delete from carts where id = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            echo  "<script>window.location='pos.php';</script>";
        }else {
            $msg = "<span style='color:red; font_size:18px;'>Product Not  Deleted ..</span>";
            return $msg;
        }
    }


    public function delCustomerCart($customer_Id){
       
        $query = "delete from carts where customer_Id ='$customer_Id'";
        $result=$this->db->delete($query);
        return $result;
    }


    public function orderProduct($data)
    {
        $price = "select sum(quantity) as qty from carts group by customer_Id";
        $resultCarts = $this->db->select($price)->fetch_assoc();
        $totalProducts = $resultCarts['qty'];
        // print_r($totalProducts);

        /*  die();
          print_r(count($totalProducts));
          die();*/

        $customer_Id = $this->fm->validation($data['customer_Id']);
        $customer_Id = mysqli_real_escape_string($this->db->link, $customer_Id);

        $month = $this->fm->validation($data['month']);
        $month = mysqli_real_escape_string($this->db->link, $month);

        $year = $this->fm->validation($data['year']);
        $year = mysqli_real_escape_string($this->db->link, $year);

        $orderDate = $this->fm->validation($data['orderDate']);
        $orderDate = mysqli_real_escape_string($this->db->link, $orderDate);

        $orderStatus = $this->fm->validation($data['orderStatus']);
        $orderStatus = mysqli_real_escape_string($this->db->link, $orderStatus);

        $totalProducts = $this->fm->validation($totalProducts);
        $totalProducts = mysqli_real_escape_string($this->db->link, $totalProducts);

        $subTotal = $this->fm->validation($data['subTotal']);
        $subTotal = mysqli_real_escape_string($this->db->link, $subTotal);

        $vat = $this->fm->validation($data['vat']);
        $vat = mysqli_real_escape_string($this->db->link, $vat);

        $shipping = $this->fm->validation($data['shipping']);
        $shipping = mysqli_real_escape_string($this->db->link, $shipping);

        $total = $this->fm->validation($data['total']);
        $total = mysqli_real_escape_string($this->db->link, $total);

        $paymentStatus = $this->fm->validation($data['paymentStatus']);
        $paymentStatus = mysqli_real_escape_string($this->db->link, $paymentStatus);

        $pay = $this->fm->validation($data['pay']);
        $pay = mysqli_real_escape_string($this->db->link, $pay);

        $due = $this->fm->validation($data['due']);
        $due = mysqli_real_escape_string($this->db->link, $due);
        $query = "INSERT INTO orders (customer_Id, orderDate, month, year, orderStatus, totalProducts,subTotal, vat, shipping ,total,paymentStatus, pay ,due )
         VALUES('$customer_Id', '$orderDate', '$month', '$year', '$orderStatus', '$totalProducts', '$subTotal', '$vat', '$shipping','$total', '$paymentStatus', '$pay', '$due')";

        $inserted_order = $this->db->insert($query);
        if ($inserted_order) {

            /*$price = "select product_Id, price from carts ";
            $resultCarts = $this->db->select($price)->fetch_assoc();
            $price = $resultCarts['price'];
            $product_Id = $resultCarts['product_Id'];

            $sQuery = "select * from orders ";
            $resultOrder = $this->db->select($sQuery)->fetch_assoc();
            $order_Id = $resultOrder['id'];
            $quantity = $resultOrder['totalProducts'];

            $order_Id = $this->fm->validation($order_Id);
            $order_Id = mysqli_real_escape_string($this->db->link, $order_Id);

            $product_Id = $this->fm->validation($product_Id);
            $product_Id = mysqli_real_escape_string($this->db->link, $product_Id);

            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);

            $total = $this->fm->validation($total);
            $total = mysqli_real_escape_string($this->db->link, $total);*/

           /* $order = "INSERT INTO orderdetails (order_Id, product_Id, quantity, price, total )
         VALUES('$order_Id', '$product_Id', '$quantity', '$price', '$total')";*/

            $order = "INSERT INTO orderdetails(order_Id, product_Id, quantity, price, total) 
                  SELECT orders.id,product_Id,quantity, price,(price * quantity) 
                  FROM carts, orders where orders.customer_Id = carts.customer_Id
                ";

            $inserted_row = $this->db->insert($order);
            if ($inserted_row) {
                $price = "select * from carts customer_Id";
                $resultCarts = $this->db->select($price)->fetch_assoc();

                $sQuery = "select * from products,carts where products.id = carts.product_Id";
                $result =$this->db->select($sQuery)->fetch_assoc();
                $available_quantity = $result['stock_quantity'];
                $quantity = $result['quantity'];
                $product_Id = $result['product_Id'];
                $p_query = "update products
                                 set
                             stock_quantity=('$available_quantity'-'$quantity')
                      
                        where id = '$product_Id' ";
                $success = $this->db->update($p_query);

                header("location:order/pendingOrder.php");
            } else {
                header("location:404.php");
            }
        }else{
            $_SESSION['status'] = "Something went wrong";
            $_SESSION['status_code'] = "error";
        }
    }
    public function getViewOrderProduct($id)
    {
        $query = "SELECT O.*, O.id as O_id, C.* from orders  as O
                INNER JOIN customers as C ON O.customer_Id = C.id
                                    where 
                                   O.id ='$id' ";
        $result = $this->db->select($query);
        return $result;
    }
    public function getViewOrderDetailsProduct($id)
    {
        $query = "SELECT  P.*, OD.* from orderdetails  as OD
                INNER JOIN products  as P ON OD.product_Id = P.id
                                    where 
                             OD.order_Id ='$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateOrderProduct($id, $orderStatus){
        $orderStatus = $this->fm->validation($orderStatus);
        $orderStatus = mysqli_real_escape_string($this->db->link, $orderStatus);


        $updateQuery = "update orders set
                            orderStatus = '$orderStatus'
                            where id= '$id'";
        $success = $this->db->update($updateQuery);
        if ($success) {
           // header("location:successOrder.php");
            /*
             *
                        $msg = "<span style='color:green; font_size:18px;'>Order   Approved ..</span>";
                        return $msg;*/
            $_SESSION['status'] = "Order Approved";
            $_SESSION['status_code'] = "success";

        }else {
            $_SESSION['status'] = "Something went wrong";
            $_SESSION['status_code'] = "error";

        }

    }

    public function getOrderProduct(){

        $query = "select *,orders.id as o_Id from orders,customers where orders.customer_Id =  customers.id order by o_Id desc";
        $result=$this->db->select($query);
        return $result;
    }


}
