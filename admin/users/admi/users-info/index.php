    <?php
    include "../../../gen/session.php";
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
<style>
    .css-serial {
        counter-reset: serial-number;  /* Set the serial number counter to 0 */
    }

    .css-serial td:first-child:before {
        counter-increment: serial-number;  /* Increment the serial number counter */
        content: counter(serial-number);  /* Display the counter */
    }
</style>

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
                    <ul class="treeview-menu active">
                        <li><a href="../users-info/index.php"><i class="fa fa-circle-o"></i> Users Information</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-circle-o"></i> Exco
                                <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="../Excos-update/index.php"><i class="fa fa-circle-o"></i> Exco's Update</a></li>

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
            <h1 class="h2">All members. / <a class="btn btn-default" href="addnew.php"> <span
                            class="glyphicon glyphicon-plus"></span> &nbsp; add new </a></h1>

            </section>

           <section class="content">
               <div class="row">
                   <?php
                   // number of results to show per page
                   $per_page = 3;

                   // figure out the total pages in the database
                   if ($result = $conn->query("SELECT * FROM login ORDER BY id"))
                   {
                       if ($result->num_rows != 0)
                       {
                           $total_results = $result->num_rows;
// ceil() returns the next highest integer value by rounding up value if necessary
                           $total_pages = ceil($total_results / $per_page);

// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
                           if (isset($_GET['page']) && is_numeric($_GET['page']))
                           {
                               $show_page = $_GET['page'];

// make sure the $show_page value is valid
                               if ($show_page > 0 && $show_page <= $total_pages)
                               {
                                   $start = ($show_page -1) * $per_page;
                                   $end = $start + $per_page;
                               }
                               else
                               {
// error - show first set of results
                                   $start = 0;
                                   $end = $per_page;
                               }
                           }
                           else
                           {
// if page isn't set, show first set of results
                               $start = 0;
                               $end = $per_page;
                           }

// display pagination
                           echo "<a href='index.php' class=' btn btn-info'>View All</a>| <b>View Page:</b> ";
                           for ($i = 1; $i <= $total_pages; $i++)
                           {
                               if (isset($_GET['page']) && $_GET['page'] == $i)
                               {
                                   echo $i . " ";
                               }
                               else
                               {
                                   echo "<a href='index.php?page=$i'>$i</a> ";
                               }
                           }
                           echo "</p>";

// display data in table
                           echo "<table class='table table-bordered table-responsive pagination css-serial' >";
                           echo "<tr><th>S/N</th><th>First Name</th> <th>Last Name</th> <th>Matric Number</th> <th>Email Address</th><th>Status</th><th>Gender</th><th>Level</th></tr>";

// loop through results of database query, displaying them in the table
                           for ($i = $start; $i < $end; $i++)
                           {
// make sure that PHP doesn't try to show results that don't exist
                               if ($i == $total_results) { break; }

// find specific row
                               $result->data_seek($i);
                               $row = $result->fetch_row();

// echo out the contents of each row into a table
                               echo "<tr >";
                               echo '<td></td>';
                               echo '<td>' . $row[4] . '</td>';
                               echo '<td>' . $row[5] . '</td>';
                               echo '<td>' . $row[1] . '</td>';
                               echo '<td>' . $row[3] . '</td>';
                               echo '<td>' . $row[6] . '</td>';
                               echo '<td>' . $row[9] . '</td>';
                               echo '<td>' . $row[10] . '</td>';
                               echo '<td><a href="editform.php?id=' . $row[0] . '" class="btn btn-success glyphicon glyphicon-edit">&nbsp;Edit</a></td>';
                               echo '<td><a href="delete.php?id=' . $row[0] . '" class="btn btn-danger glyphicon glyphicon-trash">&nbsp;Delete</a></td>';
                               echo "</tr>";
                           }

// close table>
                           echo "</table>";
                       }
                       else
                       {
                           echo "User not found!";
                       }
                   }
// error with the query
                   else
                   {
                       echo "Error: " . $conn->error;
                   }

                   // close database connection
                   $conn->close();

                   ?>
               </div>
           </section>

    </div>
        <footer class="main-footer">

            <strong>Copyright &copy; 2017 <a href="https://adminlte.io">BHU-NACOSS</a>.</strong> All rights
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