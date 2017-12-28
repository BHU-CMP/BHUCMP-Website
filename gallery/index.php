<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>GALLERY</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl-Carousel -->
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../css/owl.carousel.css" rel="stylesheet">
    <link href="../css/owl.theme.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <script src="../js/modernizr-2.8.3.min.js"></script>  <!-- Modernizr /-->
    <!--[if IE 9]>
    <script src="../js/PIE_IE9.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="../js/PIE_IE678.js"></script>
    <![endif]-->
    <script src="../js/html5shiv.js"></script>

    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">
    <!-- JS library -->
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- fancybox JS library -->
    <script src="fancybox/jquery.fancybox.js"></script>
    <script type="text/javascript">
        $("[data-fancybox]").fancybox({ });
    </script>
</head>
<body style="background-size: contain; background-color: #37474f;" >
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
                        <li><a href="#">Timetable</a></li>

                    </ul>
                <li class="menuItem"><a href="index.php#contact">CONTACT US</a></li>
            </ul>
        </div>

    </div>
</nav>
<div id="screen" class="content-section-b">
    <div class="container">
        <div class="row" >
            <div class="col-md-6 col-md-offset-3 text-center wrap_title ">
                <h2>GALLERY</h2>
                <p class="lead" style="margin-top:0">Leading us to greatness</p>
            </div>
        </div>
        <div class="row wow bounceInUp" >
            <div id="owl-demo" class="owl-carousel">

                <?php
                //Include database configuration file
                include('../gen/config.php');

                //get images from database
                $query = $conn->query("SELECT * FROM gallery ORDER BY id ASC ");

                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageThumbURL = '../admin/users/admi/gallery/gallery/'.$row["image"];
                        $imageURL = '../admin/users/admi/gallery/gallery/'.$row["image"];
                        ?>
                        <a href="<?php echo $imageURL; ?>" data-fancybox="group" data-caption="<?php echo $row["description"]; ?>">
                            <div class="item">
                                <img  class="img-responsive img-rounded" src="<?php echo $imageThumbURL; ?>" alt="Excos Image" width="150" height="150">
                            </div>
                        </a>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/owl.carousel.js"></script>
<script src="../js/script.js"></script>
<!-- StikyMenu -->
<script src="../js/stickUp.min.js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        $(document).ready(function () {
            $('.navbar-default').stickUp();

        });
    });

</script>
<!-- Smoothscroll -->
<script type="text/javascript" src="../js/jquery.corner.js"></script>
<script src="../js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<script src="../js/classie.js"></script>
<script src="../js/uiMorphingButton_inflow.js"></script>
<script src="../js/jquery.magnific-popup.js"></script>

</body>
</html>