<!DOCTYPE html>
<html lang="en">
<?php
require 'db_connection.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Senuhas Colour Mart | Home</title>
    <!-- MS, fb & Whatsapp -->

    <!-- MS Tile - for Microsoft apps-->
    <meta name="Senuhas Colour Mart" content="https://www.senuhascolourmart.lk/images/logo.jpg">

    <!-- fb & Whatsapp -->

    <!-- Site Name, Title, and Description to be displayed -->
    <meta property="og:site_name" content="Senuhas Colour Mart">
    <meta property="og:title" content="Senuhas Colour Mart">
    <meta property="og:description" content="Senuhas Colour Mart is a whole and retail seller of top quality paint brands and paint accessories for the past 5 years. We are a proud company to serve over 10,000 loyal customers who happily come back to us each time. We provide fine quality paint accesories that are accessible and easy to use for both the professional painter and for people who prefer to DIY.">

    <!-- Image to display -->
    <!-- Replace   «example.com/image01.jpg» with your own -->
    <meta property="og:image" content="https://www.senuhascolourmart.lk/images/logo.jpg">

    <!-- No need to change anything here -->
    <meta property="og:type" content="website" />
    <meta property="og:image:type" content="image/jpg">

    <!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
    <meta property="og:image:width" content="150">
    <meta property="og:image:height" content="150">

    <!-- Website to visit when clicked in fb or WhatsApp-->
    <meta property="og:url" content="https://www.senuhascolourmart.lk">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="images/logo.jpg">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                require 'header.php';
                ?>
                <div class="row">
                    <div class="col-12 p-0">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php

                                $resultset = Database::search("SELECT * FROM `gallery` WHERE `status_id` = '1' ");
                                $x = 0;
                                while ($row = $resultset->fetch_assoc()) {
                                ?>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $x ?>" <?php if ($x == '0') {
                                                                                                                echo "class='active'";
                                                                                                            } ?>></li>
                                <?php
                                    $x++;
                                }
                                ?>
                            </ol>
                            <div class="carousel-inner">
                                <?php
                                $resultset = Database::search("SELECT * FROM `gallery` WHERE `status_id` = '1' ");
                                $y = 0;
                                while ($row = $resultset->fetch_assoc()) {
                                ?>
                                    <div class="carousel-item <?php if ($y == '0') {
                                                                    echo "active";
                                                                } ?>">
                                        <img style="height: auto; min-height: 30vh; max-height: 75vh;" class="d-block w-100" src="<?= $row['path'] ?>">
                                    </div>
                                <?php
                                    $y++;
                                }
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row" style="background-color: rgba(13, 0, 255, 0.03);">
                    <div class="col-12 p-0" style="background-color: #efefff;">
                        <iframe onload="this.style.minHeight=(this.contentWindow.document.body.scrollHeight)+'px';" src="productInfoSlider.php" frameborder="0" style="width: 100%; background-color: #efefff; overflow-y: hidden; padding: 0;"></iframe>
                    </div>
                </div>

                <div class="row" style="background-color: #efefff;">
                    <div class="col-10 offset-1 pt-0 px-1 px-md-5 text-center">
                        <h2>Our Products</h2>
                    </div>
                    <div class="col-12 py-2">
                        <iframe onload="this.style.minHeight=(this.contentWindow.document.body.scrollHeight)+'px';" src="productslider.php" frameborder="0" style="width: 100%; background-color: transparent; overflow-y: hidden;"></iframe>
                        <script type="text/javascript">
                            // function resizeIframe(obj) {
                            //     obj.style.height = 0;
                            //     obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
                            // }
                        </script>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 py-4">
                        <div class="row">

                            <div class="col-12">
                                <div class="col-10 offset-1 py-2 px-1 px-md-5 text-center">
                                    <h2>Top Brands</h2>
                                </div>
                            </div>

                            <div class="col-12 py-2 px-5">
                                <div class="row p-3 px-5" style="border-radius: 2px; border-top-left-radius: 45px; border-bottom-right-radius: 45px; border: 5px solid rgba(0, 24, 255, 0.29);">

                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/nippon.png" style="width:100%;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/jiat.png" style="width:100%;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/Robbilac.png" style="width:100%;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/kansai.jpg" style="width:100%;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/swistek.png" style="width:100%;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/images.png" style="width:100%;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/SF.png" style="width:100%;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto text-center">
                                        <img src="images/brands/cic.jpg" style="max-width:100%; max-height: 100px;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/causeway.jfif" style="width:100%;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/DrFixit.jpg" style="width:100%;" alt="">
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-3 my-auto">
                                        <img src="images/brands/rhyno.png" style="width:100%;" alt="">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?php
                require 'footer.php';
                ?>
            </div>
        </div>
    </div>

    <script src="bootstrap.js"></script>
</body>

</html>