<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 12/12/2017
 * Time: 1:07 PM
 */

include "config.php";
session_start();

if (isset($_GET['logout'])) {
    $session_id = $_SESSION['user'];
    $upd="UPDATE login SET online='Offline' WHERE matno='$session_id'";
    $updr=mysqli_query($conn, $upd);

    unset($_SESSION['user']);
    session_destroy();
    header("Location: ../index.php");
}

?>