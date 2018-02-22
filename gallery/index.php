<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>GALLERY</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl-Carousel -->

    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">
    <!-- JS library -->
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- fancybox JS library -->

    <script type="text/javascript">
        $("[data-fancybox]").fancybox({ });
    </script>
</head>
<body style="background-color: #0b58a2" >
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

                <li class="menuItem"><a href="../index.php#login-modal">LOGIN</a></li>
                <li class="menuItem"><a href="../index.php#whatis">ABOUT US</a></li>
                <li class="menuItem"><a href="../index.php#screen">EXCOS</a></li>
                <li class="menuItem"><a href="../index.php#guest">GUEST</a></li>

                <li class="menuItem dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"><b>ACADEMICS</b>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Courses</a></li>

                        <li><a href="#">Project</a></li>
                        <li><a href="#">Timetable</a></li>

                    </ul>
                <li class="menuItem"><a href="../index.php#contact">CONTACT US</a></li>
            </ul>
        </div>

    </div>
</nav>
<br><br>
<div class="clearfix"></div>

<div class=" container container-fluid">
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
                                <img src="<?php echo $imageURL; ?>" class="img-rounded" height="250" width="250" style="float: left; width: 30%; margin-right: 1%; margin-bottom: 0.5em;">
                            </div>
                        </a>
                    <?php }
                } ?>
</div>
<script src="fancybox/jquery.fancybox.js"></script>
</body>
</html>