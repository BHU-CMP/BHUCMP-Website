<?php
	$DB_HOST = 'localhost';
	$DB_USER = 'root';
	$DB_PASS = '';
	$DB_NAME = 'nacoss';

	try{
        $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
        $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
	?>
<!Doctype html>
<html>
<head>
    <title>Exco's</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Owl-Carousel -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <script src="js/modernizr-2.8.3.min.js"></script>  <!-- Modernizr /-->
    <!--[if IE 9]>
    <script src="js/PIE_IE9.js"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="js/PIE_IE678.js"></script>
    <![endif]-->
    <script src="js/html5shiv.js"></script>
    <style type="text/css" media="screen">
        #container {
            min-height: 1000px;
        }

        .page-header, h2, h3, a, label, .text-info, td {
            color: #FFFFFF;
        }
    </style>
</head>

<body style="background-color: #3a414a">
<!-- Screenshot -->
<div id="screen" class="content-section-b">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center wrap_title ">
                <h2>EXCOS</h2>
                <p class="lead" style="margin-top:0"></p>
            </div>
        </div> <?php

        $stmt = $DB_con->prepare('SELECT * FROM excos ORDER BY id DESC');
        $stmt->execute();

        if($stmt->rowCount() > 0)
        {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
        extract($row);
        ?>
        <div class="col-xs-3">

        <div class="row wow bounceInUp">
            <div id="owl-demo" class="owl-carousel">

                <a href="admin/users/admi/Excos-update/excosimages/<?php echo $row['excos_image']; ?>" class="image-link">
                    <b><?php echo $row['excos_title'];?></b>
                    <div class="item">
                        <img class="img-responsive img-rounded" src="admin/users/admi/Excos-update/excosimages/<?php echo $row['excos_image']; ?>" alt="Exco's">
                    </div>
                    <b><?php echo $row['excos_name'];?></b>
                </a>
            </div>
        </div>
    </div>
            <?php
        }//forgot to put search query
    }
    else
    {
        ?>
        <div class="col-xs-12">
            <div class="alert alert-warning">
                <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
            </div>
        </div>
        <?php
    }

    ?>

</div>
</body>
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
</html>
