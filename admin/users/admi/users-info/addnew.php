<?php
include "../../../gen/session.php";
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
        $image = $fname.$lname . "." . $imgExt;

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
            header("refresh:5;add.php"); // redirects image view page after 5 seconds.
        } else {
            $errMSG = "Error while registering....";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">


    <!-- Date Picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <!--endif-->


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <header class="main-header ">
        <!-- Logo -->
        <a href="" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>NA</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>BHU-</b>NACOSS</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!--User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $_SESSION['admin']; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $_SESSION['admin']; ?> - BHUNACOSS ADMIN
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../../../gen/logout.php?logout=true" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $_SESSION['admin']; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li >
                    <a href="../index.php">
                        <i class="fa fa-dashboard"></i><span>Dashboard</span>
                    </a>

                </li>
                <li >
                    <a href="../pages/layout/fixed.php">
                        <i class="fa fa-files-o"></i>
                        <span>Fixed</span>
                        <span class="pull-right-container">
                </span>
                    </a>
                </li>

                <li>
                    <a href="../pages/calendar.php">
                        <i class="fa fa-calendar"></i> <span>Calendar</span>
                        <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span>
                    </a>
                </li>
                <li>
                    <a href="../pages/mailbox/mailbox.php">
                        <i class="fa fa-envelope"></i> <span>Mailbox</span>
                        <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">12</small>
                  <small class="label pull-right bg-green">16</small>
                  <small class="label pull-right bg-red">5</small>
                </span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Folders</span>
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="../users-info/index.php"><i class="fa fa-circle-o"></i> Users Information</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Exco
                                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../Excos-update/index.php"><i class="fa fa-circle-o"></i> Exco's Update</a></li>
                                <li class="treeview">
                                    <a href="../Excos-update/add.php"><i class="fa fa-circle-o"></i> Update
                                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="../gallery/index.php"><i class="fa fa-circle-o"></i> Gallery </a></li>
                        <li><a href="../timetable/timetable.php"><i class="fa fa-circle-o"></i> TimeTable</a></li>
                    </ul>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

        <section class="content-header">
            <h1 class="h2">Add new user. <a class="btn btn-default" href="index.php"> <span
                        class="glyphicon glyphicon-eye-open"></span> &nbsp; view all </a></h1>
        </section>


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
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="../bower_components/raphael/raphael.min.js"></script>
    <script src="../bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../bower_components/moment/min/moment.min.js"></script>
    <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

</body>
</html>