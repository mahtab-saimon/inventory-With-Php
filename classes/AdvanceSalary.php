<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php";
include_once $filepath."/../helpers/Format.php";
?>


<?php

class AdvanceSalary
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }
/*
employee_id
month
year
advance_salary*/

    public function AdvanceSalaryInsert($data)
    {
        $employee_id = $this->fm->validation($data['employee_id']);
        $employee_id = mysqli_real_escape_string($this->db->link, $employee_id);

        $month = $this->fm->validation($data['month']);
        $month = mysqli_real_escape_string($this->db->link, $month);

        $advance_salary = $this->fm->validation($data['advance_salary']);
        $advance_salary = mysqli_real_escape_string($this->db->link, $advance_salary);

        if ($employee_id == "" ||$month == "" ||$advance_salary == "" ) {
            $msg = "<span style='color:red; font_size:18px;'> field must not be Empty..</span>";
            return $msg;
        } else {
            $query = "insert into advance_salaries(employee_id, month ,advance_salary ) values('$employee_id', '$month', '$advance_salary')";
            $catInsert = $this->db->insert($query);
            if ($catInsert) {
                $_SESSION['status'] = "Salary Approved SuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Salary Not  Approved ";
                $_SESSION['status_code'] = "error";
            }
        }

    }

    public function getAllAdvanceSalary(){
        $query = "select A.* ,E.firstname,E.lastname from employees as E 
                            INNER JOIN 
                  advance_salaries as A ON E.id=A.employee_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function getAdvanceSalaryById($id){
        $query = "select * from advance_salaries where id = '$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function advanceSalaryUpdate($data, $id){
        $employee_id = $this->fm->validation($data['employee_id']);
        $employee_id = mysqli_real_escape_string($this->db->link, $employee_id);

        $month = $this->fm->validation($data['month']);
        $month = mysqli_real_escape_string($this->db->link, $month);

        $advance_salary = $this->fm->validation($data['advance_salary']);
        $advance_salary = mysqli_real_escape_string($this->db->link, $advance_salary);

        if ($employee_id == "" ||$month == "" ||$advance_salary == "" ) {
            $_SESSION['status'] = "Field Must Not be epmty";
            $_SESSION['status_code'] = "error";
        } else {
            $query = "update advance_salaries set
                            employee_id = '$employee_id',
                            month = '$month',
                            advance_salary = '$advance_salary'
                            where id= '$id'";
            $catUpdate = $this->db->update($query);
            if ($catUpdate) {
                $_SESSION['status'] = "advance salaries UpdatedSuccessFully";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "advance salaries Not  Updated  ";
                $_SESSION['status_code'] = "error";
            }

        }


    }

    public function delAdvanceSalaryById($id){
        $query = "delete from advance_salaries where id = '$id'";
        $result = $this->db->delete($query);
        if ($result){

            $_SESSION['status'] = "advance salaries Deleted SuccessFully";
            $_SESSION['status_code'] = "success";

        } else {
            $_SESSION['status'] = "advance salaries Not  Deleted  ";
            $_SESSION['status_code'] = "error";
        }
    }
    public function paySalary(){
        $query = "select advance_salaries.* ,employees.salary,employees.firstname,employees.lastname from employees,advance_salaries order by advance_salaries.id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function paidSalary($data)
    {
        $employee_id = $this->fm->validation($data['employee_id']);
        $employee_id = mysqli_real_escape_string($this->db->link, $employee_id);

        $salary_month = $this->fm->validation($data['salary_month']);
        $salary_month = mysqli_real_escape_string($this->db->link, $salary_month);

        $paid_amount = $this->fm->validation($data['paid_amount']);
        $paid_amount = mysqli_real_escape_string($this->db->link, $paid_amount);

        if ($employee_id == "" ||$salary_month == "" ||$paid_amount == "" ) {
            $msg = "<span style='color:red; font_size:18px;'> field must not be Empty..</span>";
            return $msg;
        } else {
            $query = "insert into salaries(employee_id, salary_month ,paid_amount ) values('$employee_id', '$salary_month', '$paid_amount')";
            $catInsert = $this->db->insert($query);
            if ($catInsert) {
                $_SESSION['status'] = "Salary Paid";
                $_SESSION['status_code'] = "success";

            } else {
                $_SESSION['status'] = "Salary Not  Paid  ";
                $_SESSION['status_code'] = "error";
            }
        }

    }


}