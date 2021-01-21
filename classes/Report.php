<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/../lib/Database.php";
include_once $filepath."/../helpers/Format.php";
?>


<?php

class Report
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }

    public function report(){
        $date =date("d/m/y");
        $query = "select * from orders,customers where orders.customer_Id = customers.id and orderDate='$date' order by orders.id desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function g_Report($start_date,$end_date){
//        print_r($start_date);
//        print_r($start_date);
        $query = "select * from orders,customers
                            where 
                  orders.customer_Id = customers.id
                             and 
                   orderDate >= '$start_date'
                             AND 
                   orderDate <= '$end_date'
                    order by orders.id desc";
        $result = $this->db->select($query);
//        print_r($result);
//        die();
          // eader('Location:sales.php');

    //  echo '<script type="text/javascript">window.location = "sales.php" </script>';
        return $result;
    }

    public function getMonthlyReport(){
        $month =date("F");
        $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month' order by orders.id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getYearlyReport(){
        $year =date("Y");
        $query = "select * from orders,customers where orders.customer_Id = customers.id and year='$year' order by orders.id desc";
        $result = $this->db->select($query);
        return $result;
    }



    public function januaryReport(){
        $month ="January";
        $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

    public function FebruaryReport(){
        $month ="February";
        $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";

        $result = $this->db->select($query);
        return $result;
    }

    public function MarchReport(){
        $month ="March";
        $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";$result = $this->db->select($query);
        return $result;
    }

    public function AprilReport(){
        $month ="April";
               $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

    public function MayReport(){
        $month ="May";
               $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

    public function JuneReport(){
        $month ="June";
              $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

    public function JulyReport(){
        $month ="July";
               $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

    public function AugustReport(){
        $month ="August";
              $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

    public function SeptemberReport(){
        $month ="September";
               $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

    public function OctoberReport(){
        $month ="October";
               $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

    public function NovemberReport(){
        $month ="November";
              $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

    public function DecemberReport(){
        $month ="December";
                $query = "select * from orders,customers where orders.customer_Id = customers.id and month='$month'";
        $result = $this->db->select($query);
        return $result;
    }

}