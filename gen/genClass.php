<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 09/12/2017
 * Time: 1:52 AM
 */
include "config.php";
class genClass
{
    public $db;
    public function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if(mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    public function userlogin($email, $pass){
        $pass = hash("sha256",$pass );
        $sql2="SELECT * from nacoss_login WHERE matno='$email' or email='$email' and password='$pass'";

//checking if the username is available in the table
        $result = mysqli_query($this->db,$sql2);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;

        if ($count_row == 1) {
// this login var will use for the session thing
            $_SESSION['login'] = $user_data['user_name'];
            return true;
        }
        else{
            return false;
        }
    }

    public function userReg($matno, $pass, $email, $fname, $lname, $status, $image){
        $pass = hash("sha256", $pass);
        $sql="SELECT * FROM nacoss_login WHERE matno='$matno' OR email='$email'";

//checking if the username or email is available in db
        $check = $this->db->query($sql) ;
        $count_row = $check->num_rows;

//if the username is not in db then insert to the table
        if ($count_row == 0){
            $sql1="INSERT INTO nacoss_login SET matno='$matno', password='$pass', user_email='$email', fname='$fname', lname='$lname', status='$status',  image='$image', activitystate=1";

            $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
            return $result;
        }
        else { return false;}
    }


    public function adminLogin(){

    }





    public function adminReg(){

    }


    function RedirectToURL($url)    // to redirect required page
    {
        header("Location: $url");
        exit;
    }

    public function get_fullname($uid){

        $sql3="SELECT email OR matno FROM nacoss_login WHERE id = $uid";

        $result = mysqli_query($this->db,$sql3);

        $user_data = mysqli_fetch_array($result);

        echo $user_data['email'];

    }

}