<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 12/12/2017
 * Time: 1:07 PM
 */

session_start();

/*if (!isset($_SESSION['admin'])) {
    header("Location: ../index.php");
} else if (isset($_SESSION['admin']) != "") {
    header("Location: users/index.php");
}
*/

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin']);
    echo "<script type='application/javascript'>alert('You have been logged out successfully. ')</script>";
    header("Location: ../../index.php");

}

?>