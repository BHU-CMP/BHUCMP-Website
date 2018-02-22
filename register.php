<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REGISTER</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

        <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>

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
            <a class="navbar-brand" href="index.php">BHU-NACOSS</a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
            <ul class="nav navbar-nav">

                <li class="menuItem"><a href="index.php#login-modal">LOGIN</a></li>
                <li class="menuItem"><a href="index.php#whatis">ABOUT US</a></li>
                <li class="menuItem"><a href="index.php#screen">EXCOS</a></li>
                <li class="menuItem"><a href="index.php##guest">GUEST</a></li>

                <li class="menuItem dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"><b>ACADEMICS</b>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Courses</a></li>

                        <li><a href="#">Project</a></li>
                        <li><a href="timetable.php">Timetable</a></li>

                    </ul>
                <li class="menuItem"><a href="index.php#contact">CONTACT US</a></li>
            </ul>
        </div>

    </div>
</nav>
<body style="background-color: #1e2a36">

<div class="modal-dialog modal-sm">
<?php require_once "gen/registercode.php";?>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="Login">BHUNACOSS-REGISTER</h4>
        </div>
        <div>
            <?php if ($register){
                echo $register;
            }?>
        </div>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" class="form" enctype="multipart/form-data">
            <table class="table table-bordered table-responsive">
                <tr>
                    <td><input type="text" class="form-control" name="txt_fname" id="firstname" placeholder="First Name"
                               required value=""/></td>

                </tr>
                <tr>
                    <td><input type="text" class="form-control" name="txt_lname" placeholder="Last Name" id="lastname"
                               required value=""/></td>

                </tr>
                <tr>
                    <td><input type="email" class="form-control" name="txt_email" placeholder="Email" id="email"
                               required value=""/></td>

                </tr>
                <tr>
                    <td><input type="text" class="form-control" name="txt_matno" placeholder="Matric Number"
                               aria-valuemax="13" id="matricnumber" required value=""/></td>

                </tr>
                <tr>
                    <td>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <select title="Gender" class="form-control" required name="txt_gen">
                                    <option name="">---Choose---</option>
                                    <option name="Male" value="Male">Male</option>
                                    <option name="Female" value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>

                    <td><input type="hidden" class="form-control" name="txt_stat" placeholder="Status" required
                               value="Student"/></td>

                </tr>
                <tr>

                    <td><input type="number" class="form-control" name="txt_level" placeholder="Level" required
                               value=""/></td>

                </tr>
                <tr>
                    <td><input type="password" class="form-control" name="txt_pass" placeholder="Password" id="password"
                               required value=""/></td>

                </tr>
                <tr>
                    <td><input type="password" class="form-control" name="txt_cpass" placeholder="Confirm Password"
                               id="confirmpassword" required value=""/></td>

                </tr>
                <tr>
                    <td><input type="file" class="form-control" name="avatar" accept="/image/*" id="avatar" required/>
                    </td>

                </tr>
                <tr>
                    <td>
                        <button type="submit" value="Submit" name="register" class="btn btn-block btn-success">
                            Register
                        </button>
                    </td>

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
            jQuery(function ($) {
                $(document).ready(function () {
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
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3 class="footer-title">Developed by ???</h3>
                <p>???<br/>
                    ???<br/>
                    Go to: <a href="http://www.binghamuni.edu.ng" target="_blank">Bingham Full Site</a>
                </p>

                <!-- LICENSE -->
                <a rel="cc:attributionURL" href="http://www.andreagalanti.it/flatfy"
                   property="dc:title">Flatfy Theme </a> by
                <a rel="dc:creator" href="http://www.andreagalanti.it"
                   property="cc:attributionName">Andrea Galanti</a>
                is licensed to the public under
                <BR>the <a rel="license"
                           href="http://creativecommons.org/licenses/by-nc/3.0/it/deed.it">Creative
                    Commons Attribution 3.0 License - NOT COMMERCIAL</a>.


            </div> <!-- /col-xs-7 -->

            <div class="col-md-5">
                <div class="footer-banner">
                    <h3 class="footer-title">BHU-NACOSS</h3>

                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>