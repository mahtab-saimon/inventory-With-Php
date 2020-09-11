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
    public function addTocart($quantity, $id)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $productId = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();


        $sQuery = "select * from product where productId = '$productId'";
        $result = $this->db->select($sQuery)->fetch_assoc();
        $productName = $result['productName'];
        $price = $result['price'];
        $image = $result['image'];

        $cheQuery = "select * from cart where productId = '$productId' and sId='$sId'";
        $getPro = $this->db->select($cheQuery);
        if ($getPro) {
            $msg = "Product Already Added";
            return $msg;
        } else {


            $query = "INSERT INTO cart(sId, productId, productName, price, quantity, image ) 
    VALUES('$sId', '$productId', '$productName', '$price', '$quantity', '$image')";

            $inserted_rows = $this->db->insert($query);
            if ($inserted_rows) {
                header("location:cart.php");
            } else {
                header("location:404.php");
            }

        }
    }

    public function getCartProduct()
    {
        $sId=session_id();
        $query = "select * from cart where sId =  '$sId'";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateCartQuantity($quantity, $cartId)
    {
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = $this->fm->validation($cartId);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);

        $updateQuery = "update cart set
                            quantity = '$quantity'
                            where cartId= '$cartId'";
        $cartUpdate = $this->db->update($updateQuery);
        if ($cartUpdate) {
            header("location:cart.php");
        } else {
            $msg = "<span style='color:red; font_size:18px;'>Quantity Not  Updated ..</span>";
            return $msg;
        }

    }


    public function delCartById($id){
        $query = "delete from cart where cartId = '$id'";
        $result = $this->db->delete($query);
        if ($result){

            echo  "<script>window.location='cart.php';</script>";

        }else {
            $msg = "<span style='color:red; font_size:18px;'>Product Not  Deleted ..</span>";
            return $msg;
        }
    }


    public function checkCartTable(){
        $sId=session_id();
        $query = "select * from cart where sId =  '$sId'";
        $result=$this->db->select($query);
        return $result;
}

    public function delCustomerCart(){
        $sId=session_id();
        $query = "delete from cart where sId ='$sId'";
        $result=$this->db->select($query);
        return $result;
}


    public function orderProduct($cusId)
    {
        $sId=session_id();
        $query = "select * from cart where sId =  '$sId'";
        $getProduct=$this->db->select($query);
       if ($getProduct){
           while ($result=$getProduct->fetch_assoc()){
               $productId=$result['productId'];
               $productName=$result['productName'];
               $quantity=$result['quantity'];
               $price=$result['price'] * $quantity;
               $image=$result['image'];

               $query = "INSERT INTO cus_order(cusId, productId, productName,  quantity,price, image ) 
                        VALUES('$cusId', '$productId', '$productName', '$quantity', '$price', '$image')";
               $inserted_rows = $this->db->insert($query);
           }
       }
    }

    public function paybleAmount($cusId){

        $query = "select * from cus_order where cusId =  '$cusId' and date = now()";
        $result=$this->db->select($query);
        return $result;
    }

    public function getOrderProduct($cusId){

        $query = "select * from cus_order where cusId =  '$cusId' order by date desc ";
        $result=$this->db->select($query);
        return $result;
    }

    public function checkOrderTable($cmrId){
        $sId=session_id();
        $query = "select * from cus_order where cusId = '$cmrId'";
        $result=$this->db->select($query);
        return $result;
    }


    public function getAllOrderPro(){
        $sId=session_id();
        $query = "select * from cus_order order by date";
        $result=$this->db->select($query);
        return $result;
    }


    public function productShifted($id, $time, $price)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $price = mysqli_real_escape_string($this->db->link, $price);

        $query = "update cus_order set
                            status = '1'
                            where cusId= '$id' and date = '$time' and price = '$price'";
        $catUpdate = $this->db->update($query);
        if ($catUpdate) {
            $msg = "<span style='color:green; font_size:18px;'> Updated Successfully..</span>";
            return $msg;
        } else {
            $msg = "<span style='color:red; font_size:18px;'> Not  Updated ..</span>";
            return $msg;
        }

    }

    public function delProductShifted($id, $time, $price){
        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $price = mysqli_real_escape_string($this->db->link, $price);

        $query = "delete from cus_order where cusId = '$id' and date = '$time' and price = '$price'";

        $result = $this->db->delete($query);
        if ($result){
            $msg = "<span style='color:green; font_size:18px;'> Deleted ..</span>";
            return $msg;

        }else {
            $msg = "<span style='color:red; font_size:18px;'> Not  Deleted ..</span>";
            return $msg;
        }

    }
    public function productShiftConfirm($id, $time, $price){

        $id = mysqli_real_escape_string($this->db->link, $id);
        $time = mysqli_real_escape_string($this->db->link, $time);
        $price = mysqli_real_escape_string($this->db->link, $price);

        $query = "update cus_order set
                            status = '2'
                            where cusId= '$id' and date = '$time' and price = '$price'";
        $catUpdate = $this->db->update($query);
        if ($catUpdate) {
            $msg = "<span style='color:green; font_size:18px;'> Successfully Confirmed.</span>";
            return $msg;
        } else {
            $msg = "<span style='color:red; font_size:18px;'> Not  Confirmed ..</span>";
            return $msg;
        }

    }


}
