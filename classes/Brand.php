<?php
include_once "../lib/Database.php";
include_once "../helpers/Format.php";
?>
<?php

class Brand
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }

    public function brandInsert($brandName)
    {
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        if (empty($brandName)) {
            $_SESSION['status'] = "This field must not be Empty..";
            $_SESSION['status_code'] = "error";

        } else {
            $query = "insert into brands(brandName) values('$brandName')";
            $brandName = $this->db->insert($query);
            if ($brandName) {
                $_SESSION['status'] = "Brand Inserted SuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Brand Not  Inserted ";
                $_SESSION['status_code'] = "error";
            }
        }

    }
    public function getAllBrand(){
        $query = "select * from brands order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getBrandById($id){
        $query = "select * from brands where id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function brandUpdate($brandName, $id){
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link, $brandName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($brandName)) {
            $msg = "<span style='color:red; font_size:18px;'>This field must not be Empty..</span>";
            return $msg;
        }else {
            $query = "update brands set
                            brandName = '$brandName'
                            where id= '$id'";
            $brandUpdate = $this->db->update($query);
            if ($brandUpdate) {
                $_SESSION['status'] = "Brand Updated SuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Brand Not  Updated ";
                $_SESSION['status_code'] = "error";

            }
        }


    }

    public function delBrandById($id){
        $query = "delete from brands where id = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $_SESSION['status'] = "Brand Deleted SuccessFully";
            $_SESSION['status_code'] = "success";

        }else {
            $_SESSION['status'] = "Brand Not  Deleted ";
            $_SESSION['status_code'] = "error";

        }
    }

    public function activeBrandById($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE brands SET status = 1 WHERE id = '$id'";
        $updated_rows = $this->db->update($query);
        if ($updated_rows) {
            $_SESSION['status'] = "Successfully";
            $_SESSION['status_code'] = "success";

        }else {
            $_SESSION['status'] = "Something went wrong";
            $_SESSION['status_code'] = "error";

        }

    }
    public function inActiveBrandById($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE brands SET status = 0 WHERE id = '$id'";
        $updated_rows = $this->db->update($query);
        if ($updated_rows) {
            $_SESSION['status'] = "Successfully";
            $_SESSION['status_code'] = "success";

        }else {
            $_SESSION['status'] = "Something went wrong";
            $_SESSION['status_code'] = "error";

        }

    }


}