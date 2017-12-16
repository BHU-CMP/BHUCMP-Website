<?php
include "../gen/config.php";
$query = "SELECT * FROM timetable";
$result_array = mysqli_fetch_assoc(mysqli_query($conn, $query));
$actual_image = $result_array['image'];
$description = $result_array['description'];
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Site made with Mobirise Website Builder v3.4.4, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v3.4.4, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <meta name="description" content="">
    <title>Our Gdg Events</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900">
    <link rel="stylesheet" href="assets/et-line-font-plugin/style.css">
    <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/socicon/css/socicon.min.css">
    <link rel="stylesheet" href="assets/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="stylesheet" href="assets/mobirise-gallery/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">


</head>
<body>
<section class="mbr-gallery mbr-section mbr-section-nopadding mbr-slider-carousel" id="gallery1-4"
         style="background-color: rgb(40, 50, 78); padding-top: 1.5rem; padding-bottom: 1.5rem;">
    <!-- Gallery -->
    <div>
        <div class=" mbr-gallery-layout-default">
            <div>
                <div>
                    <div class="mbr-gallery-item" data-video-url="false" style="padding: 1rem;">
                        <a href="#lb-gallery1-4" data-slide-to="1" data-toggle="modal">

                            <img alt="" src="<?php
                            echo $actual_image;
                            ?>">

                            <span class="icon-focus"></span>
                            <span class="mbr-gallery-title"><?php
                                echo $description;
                                ?></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Lightbox -->
    <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true"
         data-interval="false" id="lb-gallery1-4">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <ol class="carousel-indicators">
                        <li data-app-prevent-settings="" data-target="#lb-gallery1-4" class=" active"
                            data-slide-to="0"></li>
                        <li data-app-prevent-settings="" data-target="#lb-gallery1-4" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active video-container">
                            <img alt="" src="<?php
                            if ($actual_image) {
                                echo $actual_image;
                            } else {
                                echo "No image found";
                            }

                            ?>">
                        </div>
                        <a class="left carousel-control" role="button" data-slide="prev" href="#lb-gallery1-4">
                            <span class="icon-prev" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" role="button" data-slide="next" href="#lb-gallery1-4">
                            <span class="icon-next" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                        <a class="close" href="#" role="button" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
</section>


<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smooth-scroll/SmoothScroll.js"></script>
<script src="assets/viewportChecker/jquery.viewportchecker.js"></script>
<script src="assets/masonry/masonry.pkgd.min.js"></script>
<script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
<script src="assets/theme/js/script.js"></script>
<script src="assets/mobirise-gallery/script.js"></script>


<input name="animation" type="hidden">
</body>
</html>