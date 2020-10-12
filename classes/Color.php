<?php
include_once "../lib/Database.php";
include_once "../helpers/Format.php";
?>
<?php

class Color
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }

    public function colorInsert($color)
    {
        $color = $this->fm->validation($color);
        $color = mysqli_real_escape_string($this->db->link, $color);
        if (empty($color)) {
            $msg = "<span style='color:red; font_size:18px;'>This field must not be Empty..</span>";
            return $msg;
        } else {
            $query = "insert into colors(color) values('$color')";
            $color = $this->db->insert($query);
            if ($color) {
                $_SESSION['status'] = "Color Inserted SuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Color Not Inserted     ";
                $_SESSION['status_code'] = "error";
            }
        }

    }
    public function getAllColor(){
        $query = "select * from colors order by id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getColorById($id){
        $query = "select * from colors where id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function ColorUpdate($color, $id){
        $color = $this->fm->validation($color);
        $color = mysqli_real_escape_string($this->db->link, $color);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($color)) {
            $msg = "<span style='color:red; font_size:18px;'>This field must not be Empty..</span>";
            return $msg;
        }else {
            $query = "update colors set
                            color = '$color'
                            where id= '$id'";
            $brandUpdate = $this->db->update($query);
            if ($brandUpdate) {
                $_SESSION['status'] = "Color Updated SuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Color Not  Updated";
                $_SESSION['status_code'] = "error";
            }
        }


    }

    public function delColorById($id){
        $query = "delete from colors where id = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $_SESSION['status'] = "Color Deleted";
            $_SESSION['status_code'] = "success";

        } else {
            $_SESSION['status'] = "Color Not  Deleted      ";
            $_SESSION['status_code'] = "error";
        }
    }
    public function activeBrandById($id)
    {
        $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "UPDATE colors SET status = 1 WHERE id = '$id'";
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
        $query = "UPDATE colors SET status = 0 WHERE id = '$id'";
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