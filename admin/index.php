<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>Admin Login</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/general.css" rel="stylesheet">

</head>

<body style="background-color: #1e2a36">
<nav class="navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand btn-success" href="../index.php">BHU-NACOSS</a>
        </div>

       <!-- <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
            <ul class="nav navbar-nav">

                <li><a class=" navbar-brand btn-success" href="../index.php">HOME</a></li>
            </ul>
        </div>
-->
    </div>
</nav>

<div class="modal-dialog modal-sm">
    <?php require_once "gen/login.php";?>
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="Login">ADMIN-LOGIN</h4>
        </div>
        <div class="modal-body">
            <?php if ($login){
                echo $login;
            }?><br>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="uname" id="email-modal"
                           placeholder="Email or username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="pass" id="password-modal" placeholder="Password"
                           required="">
                </div>

                <p class="text-center">
                    <button class="btn btn-embossed" name="login_btn"><i class="fa fa-sign-in"></i> Log in</button>
                </p>
            </form>

            <!-- <p class="text-center text-muted">Not registered yet?</p>-->
            <!-- <p class="text-center text-muted"><a href="#"><strong>Register now</strong></a></p>-->
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="../js/jquery-1.11.3-jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
</html>
