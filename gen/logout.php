<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 12/12/2017
 * Time: 1:07 PM
 */

session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../index.html");
} else if (isset($_SESSION['user']) != "") {
    header("Location: users/home.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("Location: ../index.php");
}

?>