<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REGISTER</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <!-- Custom Google Web Font -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>

    <!--Bootstrap core-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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

            <a class="navbar-brand" href="../index.php">BHU-NACOSS</a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
            <ul class="nav navbar-nav">

                <li class="menuItem"><a href="index.php">ADMIN LOGIN</a></li>
            </ul>
        </div>

    </div>
</nav>
<body style="background-color: #1e2a36">

<div class="modal-dialog modal-sm">
    <?php require_once "gen/registeradmin.php";?>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="Login">BHUNACOSS-REGISTER</h4>
        </div>
        <div>
            <?php if ($adm){
                echo $adm;
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
                    <td><input type="text" class="form-control" name="txt_user" placeholder="Username"
                               aria-valuemax="13" id="username" required value=""/></td>

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
                    <td>
                        <button type="submit" value="Submit" name="registeradmin" class="btn btn-block btn-success">
                            Register
                        </button>
                    </td>

                </tr>

            </table>
        </form>
    </div>
</div>
</body>
</html>