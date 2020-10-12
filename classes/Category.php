<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php";
include_once $filepath."/../helpers/Format.php";
?>


<?php

class Category
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }

    public function categoryInsert($catName)
    {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        if (empty($catName)) {
            $msg = "<span style='color:red; font_size:18px;'>This field must not be Empty..</span>";
            return $msg;
        } else {
            $query = "insert into categories(categoryName) values('$catName')";
            $catInsert = $this->db->insert($query);
            if ($catInsert) {
                $_SESSION['status'] = "Category Inserted SuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Category Not Inserted     ";
                $_SESSION['status_code'] = "error";
            }
        }

    }
    public function getAllCat(){
        $query = "select * from categories order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCatById($id){
        $query = "select * from categories where id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function catUpdate($catName, $id){
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($catName)) {
            $msg = "<span style='color:red; font_size:18px;'>This field must not be Empty..</span>";
            return $msg;
         } else {
            $query = "update categories set
                            categoryName = '$catName'
                            where id= '$id'";
            $catUpdate = $this->db->update($query);
            if ($catUpdate) {
            $_SESSION['status'] = "Category Updated SuccessFully";
            $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Category Not  Updated     ";
                $_SESSION['status_code'] = "error";
            }
        }


    }

    public function delCatById($id){
        $query = "delete from categories where id = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $_SESSION['status'] = "Category Deleted SuccessFully";
            $_SESSION['status_code'] = "success";

        } else {
            $_SESSION['status'] = "Category Not  Deleted     ";
            $_SESSION['status_code'] = "error";
        }

    }

    public function activeBrandById($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE categories SET status = 1 WHERE id = '$id'";
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
        $query = "UPDATE categories SET status = 0 WHERE id = '$id'";
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