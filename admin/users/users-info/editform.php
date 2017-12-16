<?php
include '../../../gen/config.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../index.html");
}

?>
<?php

error_reporting(~E_NOTICE);

require_once 'dbconfig.php';

if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $stmt_edit = $DB_con->prepare('SELECT matno, password, email, fname, lname, image, level  FROM login WHERE id =:uid');
    $stmt_edit->execute(array(':uid' => $id));
    $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
    extract($edit_row);
} else {
    header("Location: index.php");
}


if (isset($_POST['btn_save_updates'])) {
    $matno = $conn->real_escape_string(trim($_POST['txt_mat']));
    $pass = $conn->real_escape_string(hash("sha256", $_POST['txt_pass']));
    $email = $conn->real_escape_string(trim($_POST['txt_email']));
    $fname = $conn->real_escape_string(trim($_POST['txt_fname']));
    $lname = $conn->real_escape_string(trim($_POST['txt_lname']));
    $image = $conn->real_escape_string($_FILES['user_image']['name']);

    $tmp_dir = $_FILES['avatar']['tmp_name'];
    $imgSize = $_FILES['avatar']['size'];

    if ($image) {
        $upload_dir = '../../image/'; // upload directory
        $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION)); // get image extension
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        $image = rand(1000, 1000000) . "." . $imgExt;
        if (in_array($imgExt, $valid_extensions)) {
            if ($imgSize < 5000000) {
                unlink($upload_dir . $edit_row['avatar']);
                move_uploaded_file($tmp_dir, $upload_dir . $image);
            } else {
                $errMSG = "Sorry, your file is too large it should be less then 5MB";
            }
        } else {
            $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    } else {
        // if no image selected the old image remain as it is.
        $userpic = $edit_row['avatar']; // old image from database
    }


    // if no error occured, continue ....
    if (!isset($errMSG)) {
        $stmt = $DB_con->prepare('UPDATE login SET matno=:ma, password=:pa, email=:em, fname=:fn,
 lname:ln,
 image=:im, level=:le WHERE id=:uid');
        $stmt->bindParam(':ma', $matno);
        $stmt->bindParam(':pa', $pass);
        $stmt->bindParam(':em', $email);
        $stmt->bindParam(':fn', $fname);
        $stmt->bindParam(':ln', $lname);
        $stmt->bindParam(':im', $image);
        $stmt->bindParam(':uid', $id);

        if ($stmt->execute()) {
            ?>
            <script>
                window.location.href = 'index.php';
                alert('Successfully Updated ...');

            </script>
            <?php
        } else {
            $errMSG = "Sorry Data Could Not Updated !";
        }

    }


}

?>
<!DOCTYPE html >
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Admin: Edit Users</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1"/>

    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="../../../bootstrap/css/bootstrap-theme.min.css">

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="../../../style.css">
    <!--Do not remove this js(../../../js/jquery-1.11.3-jquery.min.js) from here, it will have some errors during signout.-->
    <script src="../../../js/jquery-1.11.3-jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->

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
<div class="clearfix"></div>


<div class="container">


    <div class="page-header">
        <h1 class="h2">Update profile. <a class="btn btn-default" href="index.php"> All members </a></h1>
    </div>

    <div class="clearfix"></div>

    <form method="post" enctype="multipart/form-data" class="form-horizontal">


        <?php
        if (isset($errMSG)) {
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
            </div>
            <?php
        }
        ?>


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
                <td><input class="form-control" type="email" name="txt_umail" placeholder="Enter Email"
                           value="<?php echo $email; ?>"/></td>
            </tr>
            <tr>
                <td><input class="form-control" type="text" name="txt_mat" placeholder="Enter Matric-Number"
                           value="<?php echo $matno; ?>"/></td>
            </tr>
            <tr>
                <td><input class="form-control" type="text" name="txt_pass" placeholder="Enter Password"
                           value="<?php echo $pass; ?>"/></td>
            </tr>

            <tr>
                <td>
                    <p><img src="../../../image/<?php echo $edit_row['image']; ?>" height="150" width="150"/></p>
                    <input class="input-group" type="file" name="user_image" accept="image/*"/>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit" name="btn_save_updates" class="btn btn-default">
                        <span class="glyphicon glyphicon-save"></span> Update
                    </button>

                    <a class="btn btn-default" href="index.php"> <span class="glyphicon glyphicon-backward"></span>
                        cancel </a>

                </td>
            </tr>

        </table>

    </form>
</div>
<script src="../../../bootstrap/js/bootstrap.min.js"></script>


</body>
</html>