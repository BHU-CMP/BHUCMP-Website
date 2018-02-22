
<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 12/12/2017
 * Time: 1:13 AM
 */
//Users Login//
session_start();

include_once 'config.php';

$login = '';
if (!isset($_SESSION['user'])) {

} else if (isset($_SESSION['user']) != "") {
   header("Location: users/home.php");
}

if (isset($_REQUEST['login_btn'])) {
    $username = $conn->real_escape_string(strtoupper($_POST['uname']));
    $password = hash("sha256", $_POST['pass']);


    $query = "SELECT * FROM login WHERE matno='$username' OR email='$username'";
    $response = $conn->query($query);
    $row = mysqli_fetch_array($response);
    $user_id = $row['id'];
    $Account_status = $row['activitystate'];
    $current_state = $row['online'];
    if ($row['password'] == $password) {
        if ($Account_status == 'Deactivated'){
            $login='Sorry your account has been deactivated. Please contact any of your excos.';
        }else{
            $_SESSION['user'] = $row['matno'];
            $upd="UPDATE login SET online='Online' WHERE id='$user_id'";
            $updr=mysqli_query($conn, $upd);
            header("Location: users/home.php");
        }

    } else {
       $login = 'Wrong Password';
    }


}
?>