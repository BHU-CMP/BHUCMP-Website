<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>Login</title>
       <!-- Magnific Popup core CSS file -->

    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>


    <!--Bootstrap core-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Website Font style -->
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
            <a class="navbar-brand btn-success" href="index.php">BHU-NACOSS</a>
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
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="Login">USERS-LOGIN</h4>
        </div>
        <?php require_once "gen/login.php";?>
        <div class="modal-body">
            <div>
            <?php if ($login){
                echo $login;
            }?>
            </div>
            <br>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="uname" id="email-modal"
                           placeholder="Email or username" required="">
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="pass" id="password-modal" placeholder="Password"
                           required="">
                </div>

                <p class="text-center">
                    <button class="btn btn-embossed" name="login_btn"><i class="fa fa-sign-in"></i> Log in</button><br><br>
                </p>
            </form>
            <button class="btn btn-default badge" ><a href="index.php">Home</a></button>
        </div>
    </div>
</div>
       <script src="js/bootstrap.js"></script>

</body>
</html>
