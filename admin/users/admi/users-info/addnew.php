<?php
/**
 * Created by PhpStorm.
 * User: Joe_PC
 * Date: 20/11/2017
 * Time: 3:37 PM
 */

include "../../../gen/session.php";
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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

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
                                    <a href="../../../gen/logout.php?logout=true" class="btn btn-default btn-flat">Sign
                                        out</a>
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
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="../index.php">
                        <i class="fa fa-dashboard"></i><span>Dashboard</span>
                    </a>

                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Opreations</span>
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
                                <li><a href="../Excos-update/index.php"><i class="fa fa-circle-o"></i> Exco's Update</a>
                                </li>
                                <li class="treeview">
                                    <a href="../Excos-update/add2.php"><i class="fa fa-circle-o"></i> Update
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
        <?php
        require_once "../../../gen/registerusers.php";
        ?>

        <section class="content-header">
            <h1 class="h2">Add new user. <a class="btn btn-default" href="index.php"> <span
                            class="glyphicon glyphicon-eye-open"></span> &nbsp; View all </a></h1>
        </section>
        <br>
        <div>
            <?php if ($register){
                echo $register;
            }?>
        </div>
        <form method="post" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>" class="form-horizontal">

            <table class="table table-bordered table-responsive">

                <tr>
                    <td><input class="form-control" type="text" name="txt_fname" placeholder="First Name"
                               /></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="text" name="txt_lname" placeholder="Your Last Name"
                               /></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="email" name="txt_email" placeholder="Enter Email"
                               /></td>
                </tr>
                <tr>
                    <td><input class="form-control" type="text" maxlength="" name="txt_matno" placeholder="Enter Matric-Number"
                               /></td>
                </tr>
                <tr>
                    <td><select title="Gender" class="form-control" required autofocus name="txt_stat">
                            <option name="" value="">Status</option>
                            <option name="Student" value="Student">Student</option>
                            <option name="Leccturer" value="Lecturer">Lecturer</option>
                            <option name="HOD" value="HOD">HOD</option>
                        </select></td>
                </tr>


                <tr>
                    <td><select title="Gender" class="form-control" required autofocus name="txt_level">
                            <option name="" >Select Level</option>
                            <option name="100lvl" value="100level">100lvl</option>
                            <option name="200lvl" value="200level">200lvl</option>
                            <option name="300lvl" value="300level">300lvl</option>
                            <option name="400lvl" value="400level">400lvl</option>
                        </select></td>
                </tr>

                <tr>
                    <td><select title="Gender" class="form-control" required autofocus name="txt_gen">
                            <option name="" value="Male">Gender..</option>
                            <option name="Male" value="Male">Male</option>
                            <option name="Female" value="Female">Female</option>
                        </select></td>
                </tr>

                <tr>
                    <td><input class="form-control" type="text" name="txt_pass" placeholder="Input password"
                               /></td>
                </tr>
                <tr>
                    <td><input class="form-control" type="text" name="txt_cpass" placeholder="Confirm password"
                               /></td>
                </tr>

                <tr>
                    <td><input class="input-group" type="file" name="avatar" accept="image/*"/></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <button type="submit" name="btnsave" class="btn btn-default">
                            <span class="glyphicon glyphicon-save"></span> &nbsp; Save
                        </button>
                    </td>
                </tr>

            </table>
        </form>
    </div>
    <footer class="main-footer">

        <strong>Copyright &copy; 2018 <a href="https://bhunacoss.com">BHU-NACOSS</a>.</strong> All rights
        reserved.
    </footer>

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