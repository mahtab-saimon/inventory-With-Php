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


    public function customerInsert($data, $file)
    {
        $firstname = $this->fm->validation($data['firstname']);
        $firstname = mysqli_real_escape_string($this->db->link, $firstname);

        $lastname = $this->fm->validation($data['lastname']);
        $lastname = mysqli_real_escape_string($this->db->link, $lastname);

        $email = $this->fm->validation($data['email']);
        $email = mysqli_real_escape_string($this->db->link, $email);

        $phone = $this->fm->validation($data['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);

        $address = $this->fm->validation($data['address']);
        $address = mysqli_real_escape_string($this->db->link, $address);

        $accountHolder = $this->fm->validation($data['accountHolder']);
        $accountHolder= mysqli_real_escape_string($this->db->link, $accountHolder);

        $accountNumber = $this->fm->validation($data['accountNumber']);
        $accountNumber = mysqli_real_escape_string($this->db->link,$accountNumber);

        $bankName = $this->fm->validation($data['bankName']);
        $bankName= mysqli_real_escape_string($this->db->link, $bankName);

        $bankBranch = $this->fm->validation($data['bankBranch']);
        $bankBranch = mysqli_real_escape_string($this->db->link,$bankBranch);

        $city = $this->fm->validation($data['city']);
        $city = mysqli_real_escape_string($this->db->link, $city);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../img/customer/" . $unique_image;

        if ($firstname == "" || $lastname == "" || $email == "" || $phone == "" || $address == ""|| $accountHolder == "" || $accountNumber == ""|| $bankName == ""|| $bankBranch == ""|| $city == ""){
            $_SESSION['status'] = "Field Must Not be epmty";
            $_SESSION['status_code'] = "error";
        }
        $mailQuery = "select * from customers where email = '$email' limit 1";
        $mailCheck = $this->db->select($mailQuery);
        if ($mailCheck !=false){

            $msg="<span style='color:red; font_size:18px;'>Email Already Exist ..</span>";
            return $msg;
        }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO 
                        customers(firstname , lastname,email,phone,address, image ,accountHolder , accountNumber, bankName, bankBranch, city) 
                        VALUES
                        ('$firstname', '$lastname', '$email', '$phone', '$address', '$uploaded_image', '$accountHolder', '$accountNumber', '$bankName','$bankBranch', '$city' )";
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

        $lastname = $this->fm->validation($data['lastname']);
        $lastname = mysqli_real_escape_string($this->db->link, $lastname);

        $email = $this->fm->validation($data['email']);
        $email = mysqli_real_escape_string($this->db->link, $email);

        $phone = $this->fm->validation($data['phone']);
        $phone = mysqli_real_escape_string($this->db->link, $phone);

        $address = $this->fm->validation($data['address']);
        $address = mysqli_real_escape_string($this->db->link, $address);

        $accountHolder = $this->fm->validation($data['accountHolder']);
        $accountHolder = mysqli_real_escape_string($this->db->link, $accountHolder);

        $accountNumber = $this->fm->validation($data['accountNumber']);
        $accountNumber = mysqli_real_escape_string($this->db->link, $accountNumber);

        $bankName = $this->fm->validation($data['bankName']);
        $bankName = mysqli_real_escape_string($this->db->link, $bankName);

        $bankBranch = $this->fm->validation($data['bankBranch']);
        $bankBranch = mysqli_real_escape_string($this->db->link, $bankBranch);

        $city = $this->fm->validation($data['city']);
        $city = mysqli_real_escape_string($this->db->link, $city);

        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../img/customer/" . $unique_image;

        if ($firstname == "" || $lastname == "" || $email == "" || $phone == "" || $address == "" || $accountHolder == "" || $accountNumber == "" || $bankName == "" || $bankBranch == "" || $city == "") {
            $_SESSION['status'] = "Field Must Not be epmty";
            $_SESSION['status_code'] = "error";
        } else {
            if (!empty($file_name)) {
                if ($file_size > 1048567) {
                    $_SESSION['status'] = "Image size should be less 1MB.";
                    $_SESSION['status_code'] = "error";
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);

                    $query = "update customers set
                            firstname = '$firstname',
                            lastname = '$lastname',
                            email = '$email',
                            phone = '$phone',
                            address = '$address',
                             image = '$uploaded_image',
                            accountHolder = '$accountHolder',
                            accountNumber = '$accountNumber',
                            bankName = '$bankName',
                            bankBranch = '$bankBranch',
                            city = '$city'
                            where id= '$id'";

                    $updated_rows = $this->db->update($query);
                    if ($updated_rows) {
                        $_SESSION['status'] = "Data Updated With Image";
                        $_SESSION['status_code'] = "success";

                    } else {
                        $_SESSION['status'] = "Data Not Updated     ";
                        $_SESSION['status_code'] = "error";
                    }
                }
            } else {
                $query = "update customers set
                             firstname = '$firstname',
                            lastname = '$lastname',
                            email = '$email',
                            phone = '$phone',
                            address = '$address',
                            accountHolder = '$accountHolder',
                            accountNumber = '$accountNumber',
                            bankName = '$bankName',
                            bankBranch = '$bankBranch',
                            city = '$city'
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


}