<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php";
include_once $filepath."/../helpers/Format.php";
?>


<?php

class Product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }

    public function productInsert($data, $file)
    {
        $productName = $this->fm->validation($data['productName']);
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);

        $catId = $this->fm->validation($data['catId']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catId']);

        $suplierId = $this->fm->validation($data['suplierId']);
        $suplierId = mysqli_real_escape_string($this->db->link, $data['suplierId']);

        $productCode = $this->fm->validation($data['productCode']);
        $productCode = mysqli_real_escape_string($this->db->link, $data['productCode']);

        $productPlce = $this->fm->validation($data['productPlce']);
        $productPlce = mysqli_real_escape_string($this->db->link, $data['productPlce']);

        $productRoute = $this->fm->validation($data['productRoute']);
        $productRoute = mysqli_real_escape_string($this->db->link, $data['productRoute']);

        $buyDate = $this->fm->validation($data['buyDate']);
        $buyDate = mysqli_real_escape_string($this->db->link, $data['buyDate']);

        $expireDate = $this->fm->validation($data['expireDate']);
        $expireDate = mysqli_real_escape_string($this->db->link, $data['expireDate']);

        $buyingPrice = $this->fm->validation($data['buyingPrice']);
        $buyingPrice = mysqli_real_escape_string($this->db->link, $data['buyingPrice']);

        $sellingPrice = $this->fm->validation($data['sellingPrice']);
        $sellingPrice = mysqli_real_escape_string($this->db->link, $data['sellingPrice']);

        $productDescription = $this->fm->validation($data['productDescription']);
        $productDescription = mysqli_real_escape_string($this->db->link, $data['productDescription']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['productImage']['name'];
        $file_size = $file['productImage']['size'];
        $file_temp = $file['productImage']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../img/product/" . $unique_image;
        if ($productName == "" || $catId == "" || $suplierId == "" || $productCode == "" || $productPlce == "" || $productRoute == "" || $buyDate == "" || $expireDate == "" || $buyingPrice == "" || $sellingPrice == "" || $productDescription == "" ) {
            $msg = "<span style='color:red; font_size:18px;'>Fields must not be empty ..</span>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO products(productName, catId, suplierId, productCode, productPlce,productRoute,productDescription ,productImage, buyDate,expireDate ,buyingPrice , sellingPrice ) 
    VALUES('$productName', '$catId', '$suplierId', '$productCode', '$productPlce', '$productRoute','$productDescription','$uploaded_image','$buyDate','$expireDate','$buyingPrice','$sellingPrice' )";

            $inserted_rows = $this->db->insert($query);
            if ($inserted_rows) {
                echo "<span class='success'>Product Inserted Successfully. </span>";
            } else {
                echo "<span class='error'>Product Not Inserted !</span>";
            }
        }
    }
    public function getAllProduct()
    {
        $query = "select *,products.id as productId from products,categories,supliers
                               where
                  products.catId=categories.id 
                              and 
                  products.suplierId=supliers.id
                            order by 
                   products.id
                              desc 
              ";
        $result = $this->db->select($query);
        return $result;
    }

    public function geProductById($id)
    {
        $query = "select * from products where id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }


    public function productUpdate($data, $file, $id)
    {

        $productName = $this->fm->validation($data['productName']);
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);

        $catId = $this->fm->validation($data['catId']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catId']);

        $suplierId = $this->fm->validation($data['suplierId']);
        $suplierId = mysqli_real_escape_string($this->db->link, $data['suplierId']);

        $productCode = $this->fm->validation($data['productCode']);
        $productCode = mysqli_real_escape_string($this->db->link, $data['productCode']);

        $productPlce = $this->fm->validation($data['productPlce']);
        $productPlce = mysqli_real_escape_string($this->db->link, $data['productPlce']);

        $productRoute = $this->fm->validation($data['productRoute']);
        $productRoute = mysqli_real_escape_string($this->db->link, $data['productRoute']);

        $buyDate = $this->fm->validation($data['buyDate']);
        $buyDate = mysqli_real_escape_string($this->db->link, $data['buyDate']);

        $expireDate = $this->fm->validation($data['expireDate']);
        $expireDate = mysqli_real_escape_string($this->db->link, $data['expireDate']);

        $buyingPrice = $this->fm->validation($data['buyingPrice']);
        $buyingPrice = mysqli_real_escape_string($this->db->link, $data['buyingPrice']);

        $sellingPrice = $this->fm->validation($data['sellingPrice']);
        $sellingPrice = mysqli_real_escape_string($this->db->link, $data['sellingPrice']);

        $productDescription = $this->fm->validation($data['productDescription']);
        $productDescription = mysqli_real_escape_string($this->db->link, $data['productDescription']);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../img/product/" . $unique_image;
        if ($productName == "" || $catId == "" || $suplierId == "" || $productCode == "" || $productPlce == "" || $productRoute == "" || $buyDate == "" || $expireDate == "" || $buyingPrice == "" || $sellingPrice == "" || $productDescription == "" ) {
            $msg = "<span style='color:red; font_size:18px;'>Fields must not be empty ..</span>";
            return $msg;
        }  else {
            if (!empty($file_name)) {
                if ($file_size > 1048567) {
                    echo "<span class='success'>Image size should be less 1MB. </span>";
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);

                    $query = "update products
                                 set
                        productName='$productName',
                        catId='$catId',
                        suplierId='$suplierId',
                        productCode='$productCode',
                        productPlce='$productPlce',
                        productRoute='$productRoute',
                        productDescription='$productDescription',
                        productImage='$uploaded_image',
                        buyDate='$buyDate',
                        expireDate='$expireDate',
                        buyingPrice='$buyingPrice',
                        sellingPrice='$sellingPrice'
                        where id = '$id'
                        
                ";

                    $updated_rows = $this->db->update($query);
                    if ($updated_rows) {
                        echo "<span class='success'>Product Updated Successfully. </span>";
                    } else {
                        echo "<span class='error'>Product Not Updated !</span>";
                    }
                }
            } else {
                $query = "update products
                        set
                       productName='$productName',
                        catId='$catId',
                        suplierId='$suplierId',
                        productCode='$productCode',
                        productPlce='$productPlce',
                        productRoute='$productRoute',
                        productDescription='$productDescription',
                        buyDate='$buyDate',
                        expireDate='$expireDate',
                        buyingPrice='$buyingPrice',
                        sellingPrice='$sellingPrice'
                        where id = '$id'
                        
                ";

                $updated_rows = $this->db->update($query);
                if ($updated_rows) {
                    echo "<span class='success'>Product Updated Successfully. </span>";
                } else {
                    echo "<span class='error'>Product Not Updated !</span>";
                }


            }
        }
    }

    public function delProductById($id)
    {
        $unlinkQuery = "select * from products where id = '$id'";
        $getData = $this->db->select($unlinkQuery);
        if ($getData) {
            while ($delImg = $getData->fetch_assoc()) {
                $delimage = $delImg['productImage'];
                unlink($delimage);
            }
        }
        $query = "delete from products where id = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $msg = "<span style='color:green; font_size:18px;'>Product Deleted ..</span>";
            return $msg;

        } else {
            $msg = "<span style='color:red; font_size:18px;'>Product Not  Deleted ..</span>";
            return $msg;
        }
    }


    public function getFeaturedProduct()
    {
        $query = "select * from product WHERE type='0' order by productId desc limit 4";
        $result = $this->db->select($query);
        return $result;

    }

    public function getNewProduct()
    {
        $query = "select * from product order by productId desc limit 4";
        $result = $this->db->select($query);
        return $result;

    }

    public function getSingleProduct($id)
    {
        $query = "select * from product,category,brand
                  where product.catId=category.catId and 
                  product.brandId=brand.brandId and product.productId = '$id' ";
        $result = $this->db->select($query);
        return $result;

    }


    public function latestFromIphone()
    {
        $query = "select * from product where brandId = '8' order by productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestFromSamsung()
    {
        $query = "select * from product where brandId = '7' order by productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestFromAcer()
    {
        $query = "select * from product where brandId = '3' order by productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestFromCanon()
    {
        $query = "select * from product where brandId = '2' order by productId desc limit 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function productByCat($id)
    {
        $query = "select * from product where catId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }


    public function insertCompareData($cus_id, $compareid)
    {
        $cus_id = mysqli_real_escape_string($this->db->link, $cus_id);
        $productId = mysqli_real_escape_string($this->db->link, $compareid);

        $cquery = "select * from compare where cusId = '$cus_id' and productId = '$productId'";
        $check = $this->db->select($cquery);
        if ($check) {
            $msg = "<span style='color:red; font_size:18px;'>Already Added..</span>";
            return $msg;
        }

        $query = "select * from product where productId =  '$productId'";
        $result = $this->db->select($query)->fetch_assoc();
        if ($result) {

            $productId = $result['productId'];
            $productName = $result['productName'];
            $price = $result['price'];
            $image = $result['image'];

            $query = "INSERT INTO compare(cusId, productId, productName, price, image ) 
                        VALUES('$cus_id', '$productId', '$productName',  '$price', '$image')";
            $inserted_rows = $this->db->insert($query);
            if ($inserted_rows) {
                $msg = "<span style='color:green; font_size:18px;'>Added ! check Compare ..</span>";
                return $msg;

            } else {
                $msg = "<span style='color:red; font_size:18px;'> Not  Added ..</span>";
                return $msg;
            }
        }
    }

    public function getCompareData($cmrId)
    {
        $query = "select * from compare where cusId = '$cmrId' order by id desc";
        $result = $this->db->select($query);
        return $result;

    }

    public function delCompareData($cmrId){
            $query = "delete from compare where cusId = '$cmrId'";
        $result = $this->db->delete($query);
        if ($result){
            $msg = "<span style='color:green; font_size:18px;'>Product Deleted ..</span>";
            return $msg;
        }
else {
    $msg = "<span style='color:red; font_size:18px;'>Product Not  Deleted ..</span>";
    return $msg;
        }
}

    public function insertWishData( $cus_id, $id){
        $cquery = "select * from wish_list where cusId = '$cus_id' and productId = '$id'";
        $check = $this->db->select($cquery);
        if ($check) {
            $msg = "<span style='color:red; font_size:18px;'>Already Added..</span>";
            return $msg;
        }
        $query = "select * from product where productId = '$id'";
        $result=$this->db->select($query)->fetch_assoc();
        if ($result){
                $productId=$result['productId'];
                $productName=$result['productName'];
                $price=$result['price'];
                $image=$result['image'];

                $query = "INSERT INTO wish_list(cusId, productId, productName,  price, image ) 
                        VALUES('$cus_id', '$productId', '$productName', '$price', '$image')";
                $inserted_rows = $this->db->insert($query);
            if ($inserted_rows){
                $msg = "<span style='color:green; font_size:18px;'>Product in Wish List ..</span>";
                return $msg;
            }
            else {
                $msg = "<span style='color:red; font_size:18px;'>Product Not  in Wish List ..</span>";
                return $msg;
            }

        }
    }

    public function checkWishData($cmrId){
        $query = "select * from wish_list where cusId = '$cmrId' order by id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function delWlistData($id,$cmrId){
        $query = "delete from wish_list where cusId = '$cmrId' and productId = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $msg = "<span style='color:green; font_size:18px;'>Product Deleted ..</span>";
            return $msg;
        }


}




}