<?php
include "../../../gen/session.php";

function renderForm($fname = '', $lname ='', $email ='', $matno ='', $pass ='', $image = '', $error = '', $id = '')
{
?>


<!DOCTYPE html >
<html>
<head>
    <title><?php if ($id =! '') { echo "Edit Record"; } else { echo "New Record"; } ?></title>
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
        <h1 class="h2">Update profile. <a class="btn btn-default" href="index.php"> All members </a></h1>
        </section>



    <section class="content">
        <div class="row">
            <h1><?php if ($id != '') { echo "Edit Record"; } else { echo "New Record"; } ?></h1>
        <form method="post" enctype="multipart/form-data" class="form-horizontal">


        <?php
        if (isset($error)) {
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $error; ?>
            </div>
            <?php
        }
        ?>

            <?php if ($id =! '') { ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <p>ID: <?php echo $id; ?></p>
            <?php } ?>

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
                           value=""/></td>
            </tr>

            <tr>
                <td>
                    <p><img src="../../../../image/<?php echo $image   ; ?>" height="150" width="150"/></p>
                    <input class="input-group" type="file" name="avatar" accept="image/*"/>
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
        </section>
    </div>
    <footer class="main-footer">

        <strong>Copyright &copy; 2018 <a href="https://bhunacoss.com">BHU-NACOSS</a>.</strong> All rights
        reserved.
    </footer>
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

<?php }

/*

EDIT RECORD

*/
// if the 'id' variable is set in the URL, we know that we need to edit a record
if (isset($_GET['id']))
{
// if the form's submit button is clicked, we need to process the form
    if (isset($_POST['submit']))
    {
// make sure the 'id' in the URL is valid
        if (is_numeric($_POST['id']))
        {
// get variables from the URL/form
            $id = $_POST['id'];
            $fname = htmlentities($_POST['txt_fname'], ENT_QUOTES);
            $lname = htmlentities($_POST['txt_lname'], ENT_QUOTES);
            $email = htmlentities($_POST['txt_umail'], ENT_QUOTES);
            $matno = htmlentities($_POST['txt_mat'], ENT_QUOTES);
            $pass = htmlentities($_POST['txt_pass'], ENT_QUOTES);
            $image = htmlentities($_POST['avatar'], ENT_QUOTES);

// check that firstname and lastname are both not empty
            if ($fname == '' || $lname == ''|| $matno == '')
            {
// if they are empty, show an error message and display the form
                $error = 'ERROR: Please fill in all required fields!';
                renderForm($fname, $lname, $email, $matno, $pass, $image, $error, $id);
            }
            else
            {
// if everything is fine, update the record in the database
                if ($stmt = $conn->prepare("UPDATE login SET  fname = ?, lname = ?, email = ?, matno = ?, password = ?, image = ?,
WHERE id=?"))
                {
                    $stmt->bind_param("ssi", $fname, $lname, $email, $matno, $pass, $image, $id);
                    $stmt->execute();
                    $stmt->close();
                }
// show an error message if the query has an error
                else
                {
                    echo "ERROR: could not prepare SQL statement.";
                }

// redirect the user once the form is updated
                header("Location: index.php");
            }
        }
// if the 'id' variable is not valid, show an error message
        else
        {
            echo "Error!";
        }
    }
// if the form hasn't been submitted yet, get the info from the database and show the form
    else
    {
// make sure the 'id' value is valid
        if (is_numeric($_GET['id']) && $_GET['id'] > 0)
        {
// get 'id' from URL
            $id = $_GET['id'];

// get the recod from the database
            if($stmt = $conn->prepare("SELECT id, matno, password, email, fname, lname, image FROM login WHERE id=?"))
            {
                $stmt->bind_param("i", $id);
                $stmt->execute();

                $stmt->bind_result($id, $matno, $pass, $email, $fname, $lname, $image);
                $stmt->fetch();

// show the form
                renderForm($fname, $lname, $email, $matno, $pass, $image, $id);

                $stmt->close();
            }
// show an error if the query has an error
            else
            {
                echo "Error: could not prepare SQL statement";
            }
        }
// if the 'id' value is not valid, redirect the user back to the view.php page
        else
        {
            header("Location: index.php");
        }
    }
}

/*

NEW RECORD

*/
// if the 'id' variable is not set in the URL, we must be creating a new record
else
{
// if the form's submit button is clicked, we need to process the form
    if (isset($_POST['submit']))
    {
// get the form data
        $fname = htmlentities($_POST['txt_fname'], ENT_QUOTES);
        $lname = htmlentities($_POST['txt_lname'], ENT_QUOTES);
        $email = htmlentities($_POST['txt_umail'], ENT_QUOTES);
        $matno = htmlentities($_POST['txt_mat'], ENT_QUOTES);
        $pass = htmlentities(hash("sha256",$_POST['txt_pass']), ENT_QUOTES);
        $image = htmlentities($_POST['avatar'], ENT_QUOTES);

// check that firstname and lastname are both not empty
        if ($fname == '' || $lname == '')
        {
// if they are empty, show an error message and display the form
            $error = 'ERROR: Please fill in all required fields!';
            renderForm($fname, $lname, $email, $matno, $pass, $image, $error);
        }
        else
        {
// insert the new record into the database
            $query='INSERT into login (fname, lname, email, matno, password, image) VALUES (?, ?, ?, ?,
?, ?)';
            if ($stmt = $conn->prepare($query))
            {
                $stmt->bind_param("ss", $fname, $lname, $email, $matno, $pass, $image);
                $stmt->execute();
                $stmt->close();
            }
// show an error if the query has an error
            else
            {
                echo "ERROR: Could not prepare SQL statement.";
            }

// redirec the user
            header("Location: index.php");
        }

    }
// if the form hasn't been submitted yet, show the form
    else
    {
        renderForm();
    }
}

// close the mysqli connection
$conn->close();
?>