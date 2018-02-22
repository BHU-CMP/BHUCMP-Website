<?php
include "../../../gen/session.php";
?>

<?php

/**
 * Created by PhpStorm.
 * User: Joe_Pc
 * Date: 23/09/2017
 * Time: 10:32 PM
 */


if (isset($_GET['view_id']) && !empty($_GET['view_id'])) {
    $id = $_GET['view_id'];

    $query= "SELECT * FROM login WHERE id = '$id'";

    $end =  mysqli_fetch_assoc(mysqli_query($conn, $query));

    extract($end);
}

if(isset($_REQUEST['active_id']) && $_REQUEST['act']=='st')
{
    $id=base64_decode($_REQUEST['active_id']);
    $sel_user="SELECT * FROM login WHERE id='$id'";
    $res=mysqli_query($conn,$sel_user);
    $fet=mysqli_fetch_array($res);
    if($fet['activitystate']=='Activated')
    {
        $upd="UPDATE login SET activitystate='Deactivated' WHERE id='$id'";
        $updr=mysqli_query($conn, $upd);
        echo "<script>alert('Account Deactivated');
				window.location='index.php';
			</script>";


    }
    else
    {
        $upd="UPDATE login SET activitystate='Activated' WHERE id='$id'";
        $updr=mysqli_query($conn, $upd);
        echo "<script>alert('Account Activated');
				window.location='index.php';
			</script>";

    }
}
?>

<!DOCTYPE html >
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
                        <img src="../nacoss.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $_SESSION['admin']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="../nacoss.jpg" class="img-circle" alt="User Image">

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

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

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
                                <li><a href="../Excos-update/index.php"><i class="fa fa-circle-o"></i> Exco's Update</a></li>
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

        <section class="content-header">
    <h3>Details of <b><?php echo $end['fname'] . "&nbsp;" . $end['lname']; ?></b></h3>

    <table class="table table-responsive pagination">

        <tr>
            <td><label class="control-label">Image</label></td>
            <td><label class="control-label">Email.</label></td>
            <td><label class="control-label">First Name</label></td>
            <td><label class="control-label">Last Name</label></td>
            <td><label class="control-label">Status</label></td>
            <td><label class="control-label">Level</label></td>
            <td><label class="control-label">Activate/ Deactivate</label></td>
        </tr>
        <tr>
            <td class="size"><img src="../../../../image/<?php echo $end['image']; ?>" class="img-rounded"
                                  width="250px" height="250px"/></td>
            <td class="size"><?php echo $end['email']; ?></td>
            <td class="size"><?php echo $end['fname']; ?></td>
            <td class="size"><?php echo $end['lname']; ?></td>
            <td class="size"><?php  if($end['activitystate']=='Activated') {
                    echo "<span style='color:BLUE'>Activated</span>";
                }
                else
                {
                    echo "<span style='color:red'>Inactive</span>";
                }
                ?></td>
            <td class="size">
                <?php echo $end['level']; ?></td>
            <td><a class="btn btn-adn" href="view.php?active_id=<?php echo base64_encode($end['id']);?>&amp;act=st"><?php
                    if($end['activitystate'] == 'Deactivated')
                    {
                        echo "Activate";
                    }
                    else
                    {
                        echo "Deactivate";
                    }
                    ?>

                </a>
            </td>
            <td class="size"><?php  if($end['online']=='Offline') {
                    echo "<i class=\"fa fa-circle text-black\">Offline</i>";
                }
                else
                {
                    echo "<i class=\"fa fa-circle text-success\">Online</i>";
                }
                ?>
            </td>
        </tr>
    </table>

    <a href="index.php" class="btn btn btn-success"> Go back</a>

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

