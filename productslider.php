<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:400,700'>

    <style>
        @-webkit-keyframes L_circle_rotate {
            0% {
                transform: rotate(0)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        @keyframes L_circle_rotate {
            0% {
                transform: rotate(0)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        @-webkit-keyframes L_stroke_rotate {
            0% {
                transform: rotate(0)
            }

            12.5% {
                transform: rotate(135deg)
            }

            25% {
                transform: rotate(270deg)
            }

            37.5% {
                transform: rotate(405deg)
            }

            50% {
                transform: rotate(540deg)
            }

            62.5% {
                transform: rotate(675deg)
            }

            75% {
                transform: rotate(810deg)
            }

            87.5% {
                transform: rotate(945deg)
            }

            100% {
                transform: rotate(1080deg)
            }
        }

        @keyframes L_stroke_rotate {
            0% {
                transform: rotate(0)
            }

            12.5% {
                transform: rotate(135deg)
            }

            25% {
                transform: rotate(270deg)
            }

            37.5% {
                transform: rotate(405deg)
            }

            50% {
                transform: rotate(540deg)
            }

            62.5% {
                transform: rotate(675deg)
            }

            75% {
                transform: rotate(810deg)
            }

            87.5% {
                transform: rotate(945deg)
            }

            100% {
                transform: rotate(1080deg)
            }
        }

        @-webkit-keyframes L_stroke_left_grow {

            0%,
            100% {
                transform: rotate(-5deg)
            }

            50% {
                transform: rotate(-140deg)
            }
        }

        @keyframes L_stroke_left_grow {

            0%,
            100% {
                transform: rotate(-5deg)
            }

            50% {
                transform: rotate(-140deg)
            }
        }

        @-webkit-keyframes L_stroke_right_grow {

            0%,
            100% {
                transform: rotate(5deg)
            }

            50% {
                transform: rotate(140deg)
            }
        }

        @keyframes L_stroke_right_grow {

            0%,
            100% {
                transform: rotate(5deg)
            }

            50% {
                transform: rotate(140deg)
            }
        }

        .loader-circle {
            top: 50%;
            left: 50%;
            z-index: 1;
            color: #444;
            margin-top: -1em;
            margin-left: -1em;
            position: absolute;
            -webkit-animation: L_circle_rotate 1.568s linear infinite both;
            animation: L_circle_rotate 1.568s linear infinite both
        }

        .loader-circle .loader-stroke-left:before,
        .loader-circle .loader-stroke-right:before,
        .loader-circle:before {
            content: '';
            display: block;
            border-style: solid;
            border-width: .21429em;
            border-color: currentColor
        }

        .loader-circle,
        .loader-circle .loader-stroke-left,
        .loader-circle .loader-stroke-left:before,
        .loader-circle .loader-stroke-right,
        .loader-circle .loader-stroke-right:before,
        .loader-circle:before {
            width: 2em;
            height: 2em;
            border-radius: 50%;
            box-sizing: border-box
        }

        .loader-circle .loader-stroke-left:before,
        .loader-circle .loader-stroke-right {
            position: absolute;
            clip: rect(0 2em 2em 1em)
        }

        .loader-circle .loader-stroke-left,
        .loader-circle .loader-stroke-right:before {
            position: absolute;
            clip: rect(0 1em 2em 0)
        }

        .loader-circle:before {
            position: absolute;
            clip: rect(0 1.05em 1em .95em)
        }

        .loader-circle .loader-stroke-left,
        .loader-circle .loader-stroke-right,
        .loader-circle:before {
            -webkit-animation: L_stroke_rotate 5332ms cubic-bezier(.4, 0, .2, 1) infinite both;
            animation: L_stroke_rotate 5332ms cubic-bezier(.4, 0, .2, 1) infinite both
        }

        .loader-circle .loader-stroke-right:before {
            -webkit-animation: L_stroke_right_grow 1333ms cubic-bezier(.4, 0, .2, 1) infinite both;
            animation: L_stroke_right_grow 1333ms cubic-bezier(.4, 0, .2, 1) infinite both
        }

        .loader-circle .loader-stroke-left:before {
            -webkit-animation: L_stroke_left_grow 1333ms cubic-bezier(.4, 0, .2, 1) infinite both;
            animation: L_stroke_left_grow 1333ms cubic-bezier(.4, 0, .2, 1) infinite both
        }

        .mhn-slide .mhn-item {
            width: 100%;
            padding: 10px
        }

        .mhn-slide .mhn-inner {
            width: 100%;
            height: 100%;
            box-shadow: 0 2px 10px 0 rgba(0, 0, 0, .16), 0 2px 5px 0 rgba(0, 0, 0, .26);
            border-radius: 3px
        }

        .mhn-slide .mhn-item img {
            display: none
        }

        .mhn-slide .mhn-img {
            min-height: 200px;
            overflow: hidden;
            height: 100%;
            width: 100%;
            color: white;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=) #eee no-repeat center/cover;
            position: relative
        }

        .mhn-slide .mhn-text {
            text-align: center;
            padding: 0 10px
        }

        .mhn-slide .mhn-text h4 {
            font-weight: 700;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden
        }

        .mhn-slide .mhn-text p {
            max-height: 4.5em;
            overflow: hidden
        }

        .mhn-slide .owl-stage-outer {
            z-index: 1
        }

        .mhn-slide .owl-nav {
            color: #333;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }

        .mhn-slide .owl-nav svg {
            color: currentColor
        }

        .mhn-slide .owl-nav .disabled {
            display: none
        }

        .mhn-slide .owl-prev,
        .mhn-slide .owl-next {
            top: 110px;
            z-index: 2;
            width: 40px;
            height: 40px;
            padding: 8px;
            margin-top: -20px;
            position: absolute;
            border-radius: 50%;
            background-color: #fff;
            box-shadow: 0 4px 4px rgba(0, 0, 0, .3), 0 0 4px rgba(0, 0, 0, .2)
        }

        .mhn-slide .owl-prev {
            left: -10px
        }

        .mhn-slide .owl-next {
            right: -10px
        }

        .title {
            display: block;
            min-height: 50px;
            overflow: hidden;
            white-space: normal;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body style="background-color: transparent; min-height: 375px;">
    <!-- partial:index.partial.html -->
    <div class="container">
        <div class="mhn-slide owl-carousel">

            <!-- <div class="mhn-item">
                <div class="mhn-inner" style="padding: 8px;  background-color: white;">
                    <div class="mhn-img" style="background-image: url('https://nippon.s3.ap-southeast-1.amazonaws.com/products/f2794d7bcc67cdc3ef23bdad5dcb037c01980d84.jpg'); background-size: contain; background-color: white;">
                        <div class="loader-circle">
                            <div class="loader-stroke-left"></div>
                            <div class="loader-stroke-right"></div>
                        </div>
                    </div>
                    <div style="background-color: red; color: white; max-width: fit-content; padding: 2px 8px; font-weight: bold; position: absolute; margin-top: -190px; margin-left: -12px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;">28% Off</div>
                    <div class="mhn-text" style="background-color: white;">
                        <span style="font-size: 18px; font-weight: bold;">Nippons Paint Emultion</span><br>
                        <span style="color: rgba(166, 166, 166, 1);">Woodcare</span><br>
                        <span class="pt-5" style="color: blue; font-weight: bold; font-size: 18px;">Rs. 1900.00</span><br>
                        <span style="color: red; font-weight: bold; font-size: 14px;">Rs. <del>200.00</del></span>
                    </div>
                </div>
            </div> -->

            <?php

            require 'db_connection.php';

            $resultset1 = Database::search("SELECT product.id,title,image1,actualPrice,discountPrice,category.name AS category FROM `product` INNER JOIN `brand` ON `brand`.`id` = `product`.`brand_id` INNER JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id` INNER JOIN `category` ON `category`.`id` = `sub_category`.`category_id` WHERE `product`.`status_id` = '1' AND  `category`.`status_id` = '1' AND  `sub_category`.`status_id` = '1' AND  `brand`.`status_id` = '1' ORDER BY RAND ()  LIMIT 8 ");

            if ($resultset1->num_rows > 0) {

                while ($dataset1 = $resultset1->fetch_assoc()) {


                    $pricequery = Database::search("SELECT `actualPrice`,`discountPrice`,`isShow`,`scale_id` FROM `price` WHERE `price`.`product_id` = '" . $dataset1['id'] . "' AND `isshow` = '1' ");
                    $priceResult = $pricequery->fetch_assoc();

            ?>
                    <div class="mhn-item">
                        <div class="mhn-inner" style="padding: 8px;  background-color: white; min-height: 345px; cursor: pointer; border-radius: 8px;" onclick="window.open('product.php?id=<?= $dataset1['id'] ?>&<?= str_replace(' ', '_', $dataset1['title']) ?>','_parent');">
                            <div class="mhn-img" style="background-image: url('<?= $dataset1['image1'] ?>'); background-size: contain; background-color: white;">
                                <div class="loader-circle">
                                    <div class="loader-stroke-left"></div>
                                    <div class="loader-stroke-right"></div>
                                </div>
                            </div>
                            <?php
                            if ($priceResult['discountPrice'] != '0') {
                            ?>
                                <div style="background-color: red; color: white; max-width: fit-content; padding: 2px 8px; font-weight: bold; position: absolute; margin-top: -185px; margin-left: -12px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><?= 100 - floor(($priceResult['discountPrice'] / $priceResult['actualPrice']) * 100)  ?>% Off</div>
                            <?php
                            }
                            ?>
                            <div class="mhn-text m-auto" style="background-color: white; margin: auto;">
                                <div class="title" style="font-size: 16px; font-weight: bold; height: 40px;"><?= $dataset1['title'] ?></div>
                                <span style="font-size: 13px; color: rgba(166, 166, 166, 1);"><?= $dataset1['category'] ?></span><br>
                                <?php
                                if ($priceResult['discountPrice'] == '0') {
                                ?>
                                    <span class="pt-5" style="color: blue; font-weight: bold; font-size: 18px;">Rs. <?= number_format($priceResult['actualPrice'], 2) ?></span>
                                <?php
                                } else {
                                ?>
                                    <span class="pt-5" style="color: blue; font-weight: bold; font-size: 18px;">Rs. <?= number_format($priceResult['discountPrice'], 2) ?></span><br>
                                    <span style="color: red; font-weight: bold; font-size: 14px;">Rs. <del><?= number_format($priceResult['actualPrice'], 2) ?></del></span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
                echo "none";
            }

            ?>


        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js'></script>
    <script>
        $(function() {
            $('.mhn-slide').owlCarousel({
                nav: true,
                loop: true,
                // slideBy: 'page',
                rewind: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    480: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                },
                smartSpeed: 470,
                // onInitialized: function(e) {
                //     $(e.target).find('img').each(function() {
                //         if (this.complete) {
                //             $(this).closest('.mhn-inner').find('.loader-circle').hide();
                //             $(this).closest('.mhn-inner').find('.mhn-img').css('background-image', 'url(' + $(e.target).attr('src') + ')');
                //         } else {
                //             $(this).bind('load', function(e) {
                //                 $(e.target).closest('.mhn-inner').find('.loader-circle').hide();
                //                 $(e.target).closest('.mhn-inner').find('.mhn-img').css('background-image', 'url(' + $(e.target).attr('src') + ')');
                //             });
                //         }
                //     });
                // },
                onInitialized: function(e) {
                    $(e.target).find('.mhn-img').each(function() {
                        var $img = $(this);
                        var imageUrl = $img.css('background-image');
                        imageUrl = imageUrl.replace(/^url\(['"]?/, '').replace(/['"]?\)$/, '');

                        var image = new Image();
                        image.src = imageUrl;
                        if (image.complete) {
                            $img.closest('.mhn-inner').find('.loader-circle').hide();
                        } else {
                            image.onload = function() {
                                $img.closest('.mhn-inner').find('.loader-circle').hide();
                            };
                        }
                    });
                },
                navText: ['<svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"></path></svg>', '<svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"></path></svg>']
            });
        });
    </script>
</body>

</html>