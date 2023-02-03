<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .owl-carousel {
            background: white;
            padding: 1rem;
        }

        .item {
            z-index: 4 !important;
        }

        .owl-carousel .item h4 {
            color: #FFF;
            font-weight: 600;
            font-size: 30px;
            margin-top: 0;
            text-align: center;
            font-family: Arial;
            padding-top: 30px;
            height: 40px;
        }

        .details {
            font-size: 14px;
            color: white;
            font-weight: lighter;
        }

        .icon-1 {
            max-width: 30px;
            height: 30px;
            margin: auto;
            margin-bottom: 10px;
        }

        .owl-dots {
            margin-top: -3px !important;
            z-index: 0 !important;
            background-color: rgba(64, 64, 64, 1);
            height: 18px;
        }

        .owl-theme .owl-dots .owl-dot span {
            width: 10px !important;
            height: 10px !important;
            margin: 5px 7px !important;
            background: rgba(225, 225, 225, 0.5) !important;
            display: block !important;
            -webkit-backface-visibility: visible !important;
            transition: opacity .2s ease !important;
            border-radius: 30px !important;
        }

        .owl-theme .owl-dots .owl-dot.active span,
        .owl-theme .owl-dots .owl-dot:hover span {
            background: rgba(242, 242, 242, 0.78) !important;
        }

        .btn-viewmore {
            background-color: transparent;
            outline: none;
            border: 2px solid transparent;
            padding: 8px 30px;
            font-weight: 700;
            font-size: 18px;
            border-radius: 30px;
            color: white;
            font-family: Arial;
            cursor: pointer;
        }

        .btn-viewmore:hover {
            border: 2px solid white;
        }

        .details-box {
            width: 70%;
            margin: auto;
            margin-bottom: 20px;
            cursor: pointer;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
    <script>
        jQuery(document).ready(function($) {
            $('.owl-carousel').owlCarousel({
                loop: false,
                margin: 0,
                nav: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    7700: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    },
                    1300: {
                        items: 5
                    }
                }
            })
        })
    </script>

    </body>
</head>

<body style="margin: 0; min-height: 383px;">
    <div class="owl-carousel owl-theme" style="padding: 0; margin: 0;">
        <div class="item" style="background-image: url('images/slider/decorative.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 360px; padding: 0px;">
            <div style="background-color: rgba(0, 0, 0, 0.56); height: 100%; text-align: center;">
                <h4>Decorative</h4>
                <img src="https://nipponpaint.lk/assets/web/img/icons/info.png" class="icon-1">
                <div class="details-box">
                    <span class="details">Nippon Paint’s expertise and detailed care in producing appealing yet safe products give c...</span>
                </div>
                <button class="btn-viewmore">View Products</button>
            </div>
        </div>
        <div class="item" style="background-image: url('images/slider/waterproofing.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 360px; padding: 0px;">
            <div style="background-color: rgba(0, 0, 0, 0.56); height: 100%; text-align: center;">
                <h4>Waterproofing Solutions</h4>
                <img src="https://nipponpaint.lk/assets/web/img/icons/info.png" class="icon-1">
                <div class="details-box">
                    <span class="details">Selleys is a trusted Australian brand with a long history in creating home and do-it-yours...</span>
                </div>
                <button class="btn-viewmore">View Products</button>
            </div>
        </div>
        <div class="item" style="background-image: url('images/slider/woodcare.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 360px; padding: 0px;">
            <div style="background-color: rgba(0, 0, 0, 0.56); height: 100%; text-align: center;">
                <h4>Woodcare</h4>
                <img src="https://nipponpaint.lk/assets/web/img/icons/info.png" class="icon-1">
                <div class="details-box">
                    <span class="details">Nippon Paints makes a range of Wood Paints for interior and exterior applications, special...</span>
                </div>
                <button class="btn-viewmore">View Products</button>
            </div>
        </div>
        <div class="item" style="background-image: url('images/slider/autopaint.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 360px; padding: 0px;">
            <div style="background-color: rgba(0, 0, 0, 0.56); height: 100%; text-align: center;">
                <h4>Auto Refinish & Car Care</h4>
                <img src="https://nipponpaint.lk/assets/web/img/icons/info.png" class="icon-1">
                <div class="details-box">
                    <span class="details">In the highly competitive automotive segment, Nippon Paint constantly sets new industry st...</span>
                </div>
                <button class="btn-viewmore">View Products</button>
            </div>
        </div>
        <div class="item" style="background-image: url('images/slider/tools.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover; height: 360px; padding: 0px;">
            <div style="background-color: rgba(0, 0, 0, 0.56); height: 100%; text-align: center;">
                <h4>Tools and Accessories</h4>
                <img src="https://nipponpaint.lk/assets/web/img/icons/info.png" class="icon-1">
                <div class="details-box">
                    <span class="details">Nippon Paint Accessories Range of products help you to get the right finish and protection...</span>
                </div>
                <button class="btn-viewmore">View Products</button>
            </div>
        </div>
    </div>
</body>

</html>