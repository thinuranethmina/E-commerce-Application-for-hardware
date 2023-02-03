<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>

    <style>
        #my-carousel .item img {
            width: 100%;
        }

        .owl-next,
        .owl-prev {
            width: 22px;
            height: 40px;
            margin-top: -20px;
            position: absolute;
            top: 50%;
        }

        .owl-prev {
            left: 10px;
        }

        .owl-next {
            right: 10px;
        }

        .navigation-img-wrapper {
            margin-top: 4px;
            text-align: center;
        }

        .navigator {
            padding-bottom: 4px;
            padding-top: 0px;
            margin: 0px;
        }

        .navigation-img-wrapper .navigator {
            display: inline-block;
            text-align: center;
            background-color: rgba(255, 255, 255, 0);
            line-height: 100px;
            color: white;
            font-size: 50px;
            cursor: pointer;
            border-radius: 4px;
            margin: auto 10px;
            padding-top: 0px;
        }

        .navigation-img-wrapper .navigator.active {
            color: white;
            background: rgba(255, 255, 255, 0.313);
            border-bottom: 5px solid rgba(93, 0, 255, 0.322);
        }

        .img-1 {
            max-width: 250px;
            margin: auto;
        }

        .img-2 {
            max-width: 80px;
            margin: auto;
        }
    </style>

</head>

<body>
    <!-- partial:index.partial.html -->
    <?php

    require 'db_connection.php';

    $resultsetIMG = Database::search("SELECT * FROM `product` INNER JOIN `brand` ON `brand`.`id` = `product`.`brand_id` INNER JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id` INNER JOIN `category` ON `category`.`id` = `sub_category`.`category_id` WHERE  `product`.`id` = '" . $_GET['id'] . "' AND `product`.`status_id` = '1' AND  `category`.`status_id` = '1' AND  `sub_category`.`status_id` = '1' AND  `brand`.`status_id` = '1'  ; ");

    $product = $resultsetIMG->fetch_assoc();

    ?>

    <body>
        <div id="my-carousel" class="owl-carousel">
            <?php
            for ($x = 1; $x <= 3; $x++) {
                if ($product['image' . $x] != null) {
            ?>
                    <div class="item">
                        <img class="img-1" src="<?= $product['image' . $x] ?>" alt="">
                    </div>
            <?php
                }
            }
            ?>
        </div>


        <div class="navigation-img-wrapper">
            <?php
            if ($product['image2'] != null || $product['image3'] != null) {
                for ($x = 1; $x <= 3; $x++) {
                    if ($product['image' . $x] != null) {
            ?>
                        <div class="navigator" data-item="<?= $x - 1 ?>">
                            <img class="img-2" src="<?= $product['image' . $x] ?>" alt="">
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
    </body>
    <!-- partial -->
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>

    <script>
        $(document).ready(function() {


            $('#my-carousel').on('initialized.owl.carousel', function() {
                $('.navigator').eq(0).addClass('active');
                console.log('initialized');
            });

            $('#my-carousel').owlCarousel({
                loop: true,
                autoplay: false,
                autoplayTimeout: 3000,
                nav: true,
                navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
                singleItem: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });

            $('#my-carousel').on('changed.owl.carousel', function(ev) {
                var item_index = ev.page.index;
                $('.navigator').removeClass('active').eq(item_index).addClass('active');
            });

            $('.navigator').on('click', function() {
                var item_no = $(this).data('item');
                $('#my-carousel').trigger('to.owl.carousel', [item_no, 1000, true]);
            });
        });
    </script>

</body>

</html>