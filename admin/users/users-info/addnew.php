<?php
include '../../../gen/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.html");
}
?>
<?php

error_reporting(~E_NOTICE); // avoid notice

require_once 'dbconfig.php';

if (isset($_POST['btnsave'])) {
    $matno = $conn->real_escape_string(trim($_POST['txt_matno']));
    $pass = $conn->real_escape_string(hash("sha256", $_POST['txt_pass']));
    $email = $conn->real_escape_string(trim($_POST['txt_email']));
    $fname = $conn->real_escape_string(trim($_POST['txt_fname']));
    $lname = $conn->real_escape_string(trim($_POST['txt_lname']));
    $status = $conn->real_escape_string(trim($_POST['txt_stat']));
    $gender = $conn->real_escape_string(trim($_POST['txt_gen']));
    $level = $conn->real_escape_string($_POST['txt_level']);
    $activity = 1;
    $image = $conn->real_escape_string($_FILES['avatar']['name']);

    $tmp_dir = $_FILES['avatar']['tmp_name'];
    $imgSize = $_FILES['avatar']['size'];


    if (empty($matno)) {
        $errMSG = "Please Enter Username.";
    } else if (empty($email)) {
        $errMSG = "Please Enter Your Email.";
    } else if (empty($image)) {
        $errMSG = "Please Select Image File.";
    } else {
        $upload_dir = '../../image/'; // upload directory. My problem

        $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION)); // get image extension

        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

        // rename uploading image
        $image = rand(1000, 1000000) . "." . $imgExt;

        // allow valid image file formats
        if (in_array($imgExt, $valid_extensions)) {
            // Check file size '2MB'
            if ($imgSize < 2000000) {
                move_uploaded_file($tmp_dir, $upload_dir . $image);
            } else {
                $errMSG = "Sorry, your file is too large.";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
    // if no error occured, continue ....
    if (!isset($errMSG)) {
        $stmt = $DB_con->prepare('INSERT INTO login(matno, password, email, fname, lname, status, image, activitystate, gender, level)
  VALUES(:mat, :ps, :em,:fn, :ln, :st,:im, :ac, :ge,:le)');
        $stmt->bindParam(':mat', $matno);
        $stmt->bindParam(':ps', $pass);
        $stmt->bindParam(':em', $email);
        $stmt->bindParam(':fn', $fname);
        $stmt->bindParam(':ln', $lname);
        $stmt->bindParam(':st', $status);
        $stmt->bindParam(':im', $image);
        $stmt->bindParam(':ac', $activity);
        $stmt->bindParam(':ge', $gender);
        $stmt->bindParam(':le', $level);
        if ($stmt->execute()) {
            $successMSG = "Successfully registered ...";
            header("refresh:5;index.php"); // redirects image view page after 5 seconds.
        } else {
            $errMSG = "Error while registering....";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>Admin: Add New Users</title>
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-theme.min.css">

    <script type="text/javascript" src="../../../js/jquery-1.11.3-jquery.min.js"></script>
    <!--Do not remove this js(../../../js/jquery-1.11.3-jquery.min.js) from here, it will have some errors during signout.-->
    <style>
        .page-header, h2, h3, a, label {
            color: #FFFFFF;
        }
    </style>

</head>
<body style="background-size: contain; background-color: #37474f;">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../../index.php" title="HOME">BHU-NACOSS</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                   aria-expanded="false">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;Welcome Admin: <?php echo $_SESSION['admin']; ?>
                    &nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="../../gen/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign
                            Out</a></li>
                </ul>
            </li>
        </ul>
    </div>


</nav>
<br>
<br>
<p></p>
<div class="clearfix"></div>
<div class="container">


    <div class="page-header">
        <h1 class="h2">Add new user. <a class="btn btn-default" href="index.php"> <span
                        class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
    </div>


    <?php
    if (isset($errMSG)) {
        ?>
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
        </div>
        <?php
    } else if (isset($successMSG)) {
        ?>
        <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
    }
    ?>

    <form method="post" enctype="multipart/form-data" class="form-horizontal">

        <table class="table table-bordered table-responsive">

            <tr>
                <td><input class="form-control" type="text" name="txt_fname" placeholder="First Name"
                           value="<?php echo $fname; ?>"/></td>
            </tr>

            <tr>
                <td><input class="form-control" type="text" name="txt_lname" placeholder="Your Last Name"
                           value="<?php echo $lname; ?>"/></td>
            </tr>

            <tr>
                <td><input class="form-control" type="text" name="txt_email" placeholder="Enter Email"
                           value="<?php echo $email; ?>"/></td>
            </tr>
            <tr>
                <td><input class="form-control" type="text" name="txt_matno" placeholder="Enter Matric-Number"
                           value="<?php echo $matno; ?>"/></td>
            </tr>
            <tr>
                <td><input class="form-control" type="number" name="txt_level" placeholder="Enter Level"
                           value="<?php echo $matno; ?>"/></td>
            </tr>

            <tr>
                <td><select title="Gender" class="form-control" required autofocus name="txt_gender">
                        <option name="" value="Male">...Gender...</option>
                        <option name="Male" value="Male">Male</option>
                        <option name="Female" value="Female">Female</option>
                    </select></td>
            </tr>

            <tr>
                <td><input class="form-control" type="text" name="txt_upass" placeholder="Input password"
                           value="<?php echo $pass; ?>"/></td>
            </tr>

            <tr>
                <td><input class="input-group" type="file" name="avatar" accept="image/*"/></td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit" name="btnsave" class="btn btn-default">
                        <span class="glyphicon glyphicon-save"></span> &nbsp; save
                    </button>
                </td>
            </tr>

        </table>

    </form>

</div>
<!-- Latest compiled and minified JavaScript -->
<script src="../../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>