<?php

include_once "lib/Session.php";
Session::checkLogin();
include_once "lib/Database.php";
include_once "helpers/Format.php";

?>

<?php

class Adminlogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function adminLogin($email,$Password){
        $email = $this->fm->validation($email);
        $Password = $this->fm->validation($Password);

        $email = mysqli_real_escape_string($this->db->link,$email);
        $Password = mysqli_real_escape_string($this->db->link,$Password);

        if (empty($email) || empty($Password)){
            $loginmsg = "Username Password must not be Empty";
            return $loginmsg;
        }else{
            $query = "select * from logIn where email ='$email' and password = '$Password'";
            $result = $this->db->select($query);
            if ($result !=false){
                $value = $result->fetch_assoc();
                $userEmail=$value['email'];
                $userName=$value['name'];
                $_SESSION['name']=$userName;
                $_SESSION['email']=$userEmail;
                /*if (isset($_SESSION['role']) && $_SESSION['role'] =='2'){

                    header("location:dashboard.php");
                }
                elseif (isset($_SESSION['role']) && $_SESSION['role'] =='1'){

                    header("location:studentList.php");
                }*/

                header("location:index.php");
            }else{
                $loginmsg = "Username or Password Not match";
                return $loginmsg;
            }
        }
    }
}