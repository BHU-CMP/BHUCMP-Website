<?php

session_start();

include_once 'gen/genClass.php';

$user = new genClass();


       if (isset($_REQUEST['txt_register'])){

            extract($_REQUEST);
            $matno = $conf->real_escape_string(trim($_POST['txt_matno']));
            $pass = $conf->real_escape_string(hash("sha256", $_POST['txt_pass']));
            $email = $conf->real_escape_string(trim($_POST['txt_email']));
            $fname = $conf->real_escape_string(trim($_POST['txt_fname']));
            $lname = $conf->real_escape_string(trim($_POST['txt_lname']));
            $status = $conf->real_escape_string(trim($_POST['txt_stat']));
            $image = $conf->real_escape_string(trim($_POST['avatar']));


            $register = $user->userReg($matno, $pass, $email, $fname, $lname, $status, $image);

            if ($register) {
        // Registration Success
                    echo "<script type='application/javascript'>
</script>";
                    $user->RedirectToURL("index.php");
                } else {
        // Registration Failed
                    echo 'Registration failed. Email or Username already exits please try again';
                }
            }


            ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>REGISTER</title>

<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="css/magnific-popup.css">
<!-- Custom Google Web Font -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>

<!-- Custom CSS-->
<link href="css/general.css" rel="stylesheet">



<!--Bootstrap core-->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Website Font style -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<!--<link rel="stylesheet" href="style.css">-->
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>


</head>
            <!--Header-->
<nav class="navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">BHU-NACOSS</a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
            <ul class="nav navbar-nav">

                <li class="menuItem"><a href="index.html#login-modal">LOGIN</a></li>
                <li class="menuItem"><a href="index.html#whatis">ABOUT US</a></li>
                <li class="menuItem"><a href="index.html#screen">EXCOS</a></li>
                <li class="menuItem"><a href="index.html##guest">GUEST</a></li>

                <li class="menuItem dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" ><b>ACADEMICS</b>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Courses</a></li>

                        <li><a href="#">Project</a></li>
                        <li><a href="#">Timetable</a></li>

                    </ul>
                <li class="menuItem"><a href="index.html#contact">CONTACT US</a></li>
            </ul>
        </div>

    </div>
</nav>
    <div>
        <form method="post" action="#" class="form" enctype="multipart/form-data" >
            <h2 class="form-signin-heading">Register</h2><hr />

            <table class="table table-bordered table-responsive">
                <tr>

                    <td><label for="firstname" class="cols-sm-2 control-label">First Name</label></td>
                    <td><input type="text" class="form-control" name="txt_fname" id="firstname" placeholder="First Name" required value=""/></td>

                </tr><tr>

                    <td><label for="lastname" class="cols-sm-2 control-label">Last Name</label></td>
                    <td><input type="text" class="form-control" name="txt_lname" placeholder="Last Name" id="lastname" required value=""/></td>

                </tr><tr>

                    <td><label for="email" class="cols-sm-2 control-label">Email</label></td>
                    <td><input type="email" class="form-control" name="txt_email" placeholder="Email" id="email" required value=""/></td>

                </tr><tr>

                    <td><label for="matricnumber" class="cols-sm-2 control-label">Matric Number</label></td>
                    <td><input type="text" class="form-control" name="txt_matno" placeholder="Matric Number" aria-valuemax="13" id="matricnumber" required value=""/></td>

                </tr><tr>

                    <td><label for="phonenumber" class="cols-sm-2 control-label">Phone Number</label></td>
                    <td><input type="text" class="form-control" name="txt_fno" placeholder="Phone Number" id="phonenumber" required value=""/></td>

                </tr><tr>

                    <td><label for="gender" class="cols-sm-2 control-label">Gender</label></td>
                    <td><input type="text" class="form-control" name="txt_gen" placeholder="Gender" id="gender" required value=""/></td>

                </tr><tr>

                    <td><input type="hidden" class="form-control" name="txt_stat" placeholder="Gender" required value="Student"/></td>

                </tr><tr>

                    <td><label for="password" class="cols-sm-2 control-label">Password</label></td>
                    <td><input type="text" class="form-control" name="txt_pass" placeholder="Password" id="password" required value=""/></td>

                </tr><tr>

                    <td><label for="confirmpassword" class="cols-sm-2 control-label">Confirm Password</label></td>
                    <td><input type="text" class="form-control" name="txt_cpass" placeholder="Confirm Password" id="confirmpassword" required value=""/></td>

                </tr><tr>

                    <td><label for="avatar" class="cols-sm-2 control-label">Upload Image</label></td>
                    <td><input type="file" class="form-control" name="avatar" accept="/image/*" id="avatar" required/></td>

                </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit"  name="register" class="btn btn-block btn-success"></td>

                </tr>

            </table>
        </form>
        <!-- JavaScript -->
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/script.js"></script>
        <!-- StikyMenu -->
        <script src="js/stickUp.min.js"></script>
        <script type="text/javascript">
            jQuery(function($) {
                $(document).ready( function() {
                    $('.navbar-default').stickUp();

                });
            });

        </script>
        <!-- Smoothscroll -->
        <script type="text/javascript" src="js/jquery.corner.js"></script>
        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <script src="js/classie.js"></script>
        <script src="js/uiMorphingButton_inflow.js"></script>
        <!-- Magnific Popup core JS file -->
        <script src="js/jquery.magnific-popup.js"></script>
    </div>
</html>