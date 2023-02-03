<?php

if (!isset($_GET["id"])) {
?>
    <script>
        window.location = "./";
    </script>
<?php
} else if (empty($_GET['id'])) {
?>
    <script>
        window.location = "./";
    </script>
    <?php
} else {

    require "db_connection.php";

    $resultset1 = Database::search("SELECT title,`description`,`more_info`,`qty`,`image1`,`image2`,`image3`,`category`.`id` AS `categoryID`,`category`.`name` AS `category`, `product`.`sub_category_id` AS `subcategoryID`, `sub_category`.`name` AS `subcategory` FROM `product` INNER JOIN `brand` ON `brand`.`id` = `product`.`brand_id` INNER JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id` INNER JOIN `category` ON `category`.`id` = `sub_category`.`category_id` WHERE  `product`.`id` = '" . $_GET['id'] . "' AND `product`.`status_id` = '1' AND  `category`.`status_id` = '1' AND  `sub_category`.`status_id` = '1' AND  `brand`.`status_id` = '1'  ; ");


    if ($resultset1->num_rows > 0) {
        $product = $resultset1->fetch_assoc();
    ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <title><?= $product['title'] ?></title>
            <!-- MS, fb & Whatsapp -->

            <!-- MS Tile - for Microsoft apps-->
            <meta name="<?= $product['title'] ?>" content="https://www.senuhascolourmart.lk/<?= $product['image1'] ?>">

            <!-- fb & Whatsapp -->

            <!-- Site Name, Title, and Description to be displayed -->
            <meta property="og:site_name" content="Senuhas Colour Mart">
            <meta property="og:title" content="<?= $product['title'] ?>">
            <meta property="og:description" content="<?= $product['description'] ?>">

            <!-- Image to display -->
            <!-- Replace   «example.com/image01.jpg» with your own -->
            <meta property="og:image" content="https://www.senuhascolourmart.lk/<?= $product['image1'] ?>">

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
                        <div class="container py-3 px-sm-5">
                            <div class="row">
                                <div class="col-12" style="font-size: 15px;">
                                    <a class="mx-1" href="./">Home</a> / <a href="search.php" class="mx-1">Products</a> / <a href="search.php?category=<?= $product['categoryID'] ?>" class="mx-1"><?= $product['category'] ?></a> / <a href="search.php?subCategory=<?= $product['subcategoryID'] ?>&category=<?= $product['categoryID'] ?>" class="mx-1"><?= $product['subcategory'] ?></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="container py-3 px-sm-5">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <iframe onload="this.style.minHeight=(this.contentWindow.document.body.scrollHeight+20)+'px';" src="productImageSlider.php?id=<?= $_GET['id'] ?>" frameborder="0" style="width: 100%; background-color: transparent; overflow-y: hidden;"></iframe>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h4 style="color: darkblue;" class="pr-lg-5 pb-1"><?= $product['title'] ?></h4>
                                    <p style="font-size: 13px; text-align: justify;" class="pr-lg-5"><?= $product['description'] ?></p>
                                    <br>
                                    <?php


                                    $pricequery = Database::search("SELECT `price`.`id`,`actualPrice`,`discountPrice`,`isShow`,`scale_id`,`size`,`scale`.`name` AS `scale` FROM `price` INNER JOIN `scale` ON `scale`.`id` = `price`.`scale_id` WHERE `price`.`product_id` = '" . $_GET['id'] . "' ");
                                    $priceResult = $pricequery->fetch_assoc();

                                    if ($priceResult['scale_id'] == '0') {
                                        $isMPrice = false;
                                    } else {
                                        $isMPrice = true;
                                    }

                                    if (!$isMPrice) {
                                        if ($priceResult['discountPrice'] == '0') { ?>
                                            <h3 class="d-inline-block">Rs. <?= number_format($priceResult['actualPrice'], 2) ?></h3>&nbsp;
                                        <?php
                                        } else { ?>
                                            <h3 class="d-inline-block">Rs. <?= number_format($priceResult['discountPrice'], 2) ?></h3>&nbsp;
                                            <h6 class="d-inline-block" style="color: red;">Rs.<del><?= number_format($priceResult['actualPrice'], 2) ?></del></h6>&nbsp;
                                            <?php
                                            echo "(-" . (100 - floor(($priceResult['discountPrice'] / $priceResult['actualPrice'])) * 100) . "%)";
                                            ?>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <div class="pr-lg-5">
                                            <select id="scaleSelect" onchange="changePrice();" class="form-control">
                                                <?php

                                                do {
                                                ?>
                                                    <option value="<?= $priceResult['id'] ?>" <?php if ($priceResult['isShow'] == '1') {
                                                                                                    echo "selected";
                                                                                                } ?>><?= $priceResult['size'] . " " . $priceResult['scale'] ?></option>
                                                <?php
                                                } while ($priceResult = $pricequery->fetch_assoc())

                                                ?>
                                            </select>

                                            <br>

                                            <?php

                                            $pricequery = Database::search("SELECT `price`.`id`,`actualPrice`,`discountPrice`,`isShow`,`scale_id`,`size`,`scale`.`name` AS `scale` FROM `price` INNER JOIN `scale` ON `scale`.`id` = `price`.`scale_id` WHERE `price`.`product_id` = '" . $_GET['id'] . "' AND `isshow` = '1' ");
                                            $priceResult = $pricequery->fetch_assoc();

                                            if ($priceResult['discountPrice'] == '0') { ?>
                                                <div id="price">
                                                    <h3 class="d-inline-block">Rs. <?= number_format($priceResult['actualPrice'], 2) ?></h3>&nbsp;
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div id="price">
                                                    <h3 class="d-inline-block">Rs. <?= number_format($priceResult['discountPrice'], 2) ?></h3>&nbsp;
                                                    <h6 class="d-inline-block" style="color: red;">Rs.<del><?= number_format($priceResult['actualPrice'], 2) ?></del></h6>&nbsp;
                                                    <?php
                                                    echo "(-" . (100 - floor(($priceResult['discountPrice'] / $priceResult['actualPrice']) * 100)) . "%)";
                                                    ?>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <?php
                                    if ($product['qty'] == '1') {
                                    ?>
                                        <span style="color: white; background-color: rgba(0, 156, 211, 0.8); font-weight: bold; padding: 3px 10px; border-radius: 4px;">Stock Available</span>
                                    <?php
                                    } else {
                                    ?>
                                        <span style="color: white; background-color: rgba(210, 91, 0, 1); font-weight: bold; padding: 3px 10px; border-radius: 4px;">Out of Stock</span>
                                    <?php
                                    }
                                    ?>
                                    <br>
                                    <div class="text-center mt-5">
                                        <!-- <button onclick="buyNow();" style="background-color: rgba(0, 181, 43, 0.8); color: white; border-radius: 50px; cursor: pointer; outline: none; border: none; font-weight: 500; letter-spacing: 1px;" class="px-5 py-3"><img style="width: 25px; margin-right: 15px; margin-top: -2px;" src="data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23fff' d='M3.516 3.516c4.686-4.686 12.284-4.686 16.97 0 4.686 4.686 4.686 12.283 0 16.97a12.004 12.004 0 0 1-13.754 2.299l-5.814.735a.392.392 0 0 1-.438-.44l.748-5.788A12.002 12.002 0 0 1 3.517 3.517zm3.61 17.043.3.158a9.846 9.846 0 0 0 11.534-1.758c3.843-3.843 3.843-10.074 0-13.918-3.843-3.843-10.075-3.843-13.918 0a9.846 9.846 0 0 0-1.747 11.554l.16.303-.51 3.942a.196.196 0 0 0 .219.22l3.961-.501zm6.534-7.003-.933 1.164a9.843 9.843 0 0 1-3.497-3.495l1.166-.933a.792.792 0 0 0 .23-.94L9.561 6.96a.793.793 0 0 0-.924-.445 1291.6 1291.6 0 0 0-2.023.524.797.797 0 0 0-.588.88 11.754 11.754 0 0 0 10.005 10.005.797.797 0 0 0 .88-.587l.525-2.023a.793.793 0 0 0-.445-.923L14.6 13.327a.792.792 0 0 0-.94.23z'/%3E%3C/svg%3E" alt="">Send Message for Buy</button> -->
                                        <iframe onload="this.style.maxHeight=(this.contentWindow.document.body.scrollHeight )+'px';" src="buyBtn.php?id=<?= $_GET['id'] ?>" frameborder="0" style="width: 100%; overflow-y: hidden; padding: 0;"></iframe>
                                    </div>
                                </div>
                                <div class="col-12 pt-5">
                                    <h4 style="border-left: 4px solid blue; border-radius: 5px; background-color: rgba(46, 39, 245, 0.19); padding: 4px 12px;">More Infomation</h4>
                                    <br>
                                    <div>
                                        <?= $product['more_info'] ?>
                                    </div>
                                </div>
                            </div>
                            <?php

                            $resultset2 = Database::search("SELECT  product.id,title,image1 FROM `product` INNER JOIN `brand` ON `brand`.`id` = `product`.`brand_id` INNER JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id` INNER JOIN `category` ON `category`.`id` = `sub_category`.`category_id` WHERE `product`.`status_id` = '1' AND  `category`.`status_id` = '1' AND  `sub_category`.`status_id` = '1' AND  `brand`.`status_id` = '1' AND `category`.`id` = '" . $product['categoryID'] . "' AND `product`.`id` != '" . $_GET['id'] . "' ORDER BY RAND () LIMIT 6 ;");

                            if ($resultset2->num_rows > 0) {
                            ?>
                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <h4 style="color: darkblue;">Similer Products</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="row p-3">
                                            <?php
                                            while ($dataset2 = $resultset2->fetch_assoc()) {


                                                $pricequery = Database::search("SELECT `actualPrice`,`discountPrice`,`isShow`,`scale_id` FROM `price` WHERE `price`.`product_id` = '" . $dataset2['id'] . "' AND `isshow` = '1' ");
                                                $priceResult = $pricequery->fetch_assoc();
                                            ?>

                                                <div class="col-12 col-md-6 col-lg-4 text-center py-3">
                                                    <div class="product-card py-3" style="cursor: pointer; border-radius: 8px;" onclick="window.open('product.php?id=<?= $dataset2['id'] ?>&<?= str_replace(' ', '_', $dataset2['title']) ?>','_parent');">
                                                        <?php
                                                        if ($priceResult['discountPrice'] != '0') {
                                                        ?>
                                                            <div style="background-color: red; color: white; max-width: fit-content; padding: 2px 8px; font-weight: bold; position: absolute; margin-top: 6px; margin-left: -14px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><?= 100 - floor(($priceResult['discountPrice'] / $priceResult['actualPrice']) * 100)  ?>% Off</div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <img src="<?= $dataset2['image1'] ?>" style="max-width: 100%; height: 200px;">
                                                        <div class="title" style="font-size: 16px; font-weight: bold;"><?= $dataset2['title'] ?></div>
                                                        <?php
                                                        if ($priceResult['discountPrice'] == '0') {
                                                        ?>
                                                            <span class="pt-5" style="color: blue; font-weight: bold; font-size: 18px;">Rs. <?= number_format($priceResult['actualPrice'], 2) ?></span>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <span class="pt-5" style="color: blue; font-weight: bold; font-size: 18px;">Rs. <?= number_format($priceResult['discountPrice'], 2) ?></span>
                                                            <br>
                                                            <span style="color: red; font-weight: bold; font-size: 14px;">Rs. <del><?= number_format($priceResult['actualPrice'], 2) ?></del></span>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>

                        </div>
                        <?php
                        require 'footer.php';
                        ?>
                    </div>

                    <script src="bootstrap.js"></script>

                    <script>
                        function changePrice() {
                            var scale = document.getElementById("scaleSelect").value;

                            var form = new FormData();
                            form.append("scale", scale);

                            var r = new XMLHttpRequest();

                            r.onreadystatechange = function() {
                                if (r.readyState == 4) {
                                    var text = r.responseText;

                                    document.getElementById('price').innerHTML = text;
                                }
                            }

                            r.open("POST", "priceProcess.php", true);
                            r.send(form);

                        }
                    </script>
        </body>

        </html>
    <?php
    } else {
    ?>
        <script>
            window.location = "./";
        </script>
<?php
    }
}
?>