<?php
include_once "../lib/Database.php";
include_once "../helpers/Format.php";
?>
<?php

class Size
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }

    public function sizeInsert($sizeName)
    {
        $sizeName = $this->fm->validation($sizeName);
        $sizeName = mysqli_real_escape_string($this->db->link, $sizeName);
        if (empty($sizeName)) {
            $_SESSION['status'] = "This field must not be Empty";
            $_SESSION['status_code'] = "error";

        } else {
            $query = "insert into sizes (sizeName) values('$sizeName')";
            $sizeName = $this->db->insert($query);
            if ($sizeName) {
                $_SESSION['status'] = "Data Inserted SuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Data Not Inserted     ";
                $_SESSION['status_code'] = "error";
            }
        }

    }
    public function getAllSize(){
        $query = "select * from sizes order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getSizeById($id){
        $query = "select * from sizes where id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function SizeUpdate($sizeName, $id){
        $sizeName = $this->fm->validation($sizeName);
        $sizeName = mysqli_real_escape_string($this->db->link, $sizeName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($sizeName)) {
            $_SESSION['status'] = "This field must not be Empty";
            $_SESSION['status_code'] = "error";
        }else {
            $query = "update sizes set
                            sizeName = '$sizeName'
                            where id= '$id'";
            $brandUpdate = $this->db->update($query);
            if ($brandUpdate) {
                $_SESSION['status'] = "Data Updated SuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Data Not Updated     ";
                $_SESSION['status_code'] = "error";
            }

        }


    }

    public function delSizeById($id){
        $query = "delete from sizes where id = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $_SESSION['status'] = "Data Deleted SuccessFully";
            $_SESSION['status_code'] = "success";

        } else {
            $_SESSION['status'] = "Data Not Deleted ";
            $_SESSION['status_code'] = "error";
        }
    }

    public function activeBrandById($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE sizes SET status = 1 WHERE id = '$id'";
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
        $query = "UPDATE sizes SET status = 0 WHERE id = '$id'";
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