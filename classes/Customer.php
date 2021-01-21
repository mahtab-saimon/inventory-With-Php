<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php";
include_once $filepath."/../helpers/Format.php";
?>

<?php

class Customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }


    public function customerInsert($data)
    {
        $firstname = $this->fm->validation($data['firstname']);
        $firstname = mysqli_real_escape_string($this->db->link, $firstname);

        $email = $this->fm->validation($data['email']);
        $email = mysqli_real_escape_string($this->db->link, $email);

        $phone = $this->fm->validation($data['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);

        $address = $this->fm->validation($data['address']);
        $address = mysqli_real_escape_string($this->db->link, $address);


        if ($firstname == "" || $email == "" || $phone == "" || $address == ""){
            $_SESSION['status'] = "Field Must Not be epmty";
            $_SESSION['status_code'] = "error";
        }
        $phoneQuery = "select * from customers where phone = '$phone' limit 1";
        $phoneCheck = $this->db->select($phoneQuery);
        if ($phoneCheck !=false){
            $_SESSION['status'] = "phone Number Already Exist";
            $_SESSION['status_code'] = "error";
        }else{
            $query = "INSERT INTO 
                        customers(firstname ,email,phone,address) 
                        VALUES
                        ('$firstname', '$email', '$phone', '$address' )";
            $inserted_rows = $this->db->insert($query);
            if ($inserted_rows) {
                $_SESSION['status'] = "Data Inserted SuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Data Not Inserted     ";
                $_SESSION['status_code'] = "error";
            }

        }
    }

    public function getAllCustomer(){
        $query = "select * from customers";
        $result = $this->db->select($query);
        return $result ;
    }

    public function delCustomerById($id)
    {
        $unlinkQuery = "select * from customers where id = '$id'";
        $getData = $this->db->select($unlinkQuery);
        if ($getData) {
            while ($delImg = $getData->fetch_assoc()) {
                $delimage = $delImg['image'];
                unlink($delimage);
            }
        }
        $query = "delete from customers where id = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $_SESSION['status'] = "Data Deleted SuccessFully";
            $_SESSION['status_code'] = "success";

        } else {
            $_SESSION['status'] = "Data Not Deleted     ";
            $_SESSION['status_code'] = "error";
        }

    }


    public function geCustomerById($id)
    {
        $query = "select * from  customers where id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }


    public function customerUpdate($data, $file, $id)
    {

        $firstname = $this->fm->validation($data['firstname']);
        $firstname = mysqli_real_escape_string($this->db->link, $firstname);

        $email = $this->fm->validation($data['email']);
        $email = mysqli_real_escape_string($this->db->link, $email);

        $phone = $this->fm->validation($data['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);

        $address = $this->fm->validation($data['address']);
        $address = mysqli_real_escape_string($this->db->link, $address);


        if ($firstname == ""  || $email == "" || $phone == "" || $address == "" ) {
            $_SESSION['status'] = "Field Must Not be epmty";
            $_SESSION['status_code'] = "error";
        } else
            {
                $query = "update customers set
                             firstname = '$firstname',
                          
                            email = '$email',
                            phone = '$phone',
                            address = '$address',
                            where id= '$id'";

                $updated_rows = $this->db->update($query);
                if ($updated_rows) {
                    $_SESSION['status'] = "Data Updated Without Image";
                    $_SESSION['status_code'] = "success";

                } else {
                    $_SESSION['status'] = "Data Not Updated     ";
                    $_SESSION['status_code'] = "error";
                }
            }
        }


}