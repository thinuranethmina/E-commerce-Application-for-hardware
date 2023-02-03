<?php
require 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Senuhas Colour Mart</title>
    <!-- MS, fb & Whatsapp -->

    <!-- MS Tile - for Microsoft apps-->
    <meta name="Senuhas Colour Mart" content="https://www.senuhascolourmart.lk/images/logo.jpg">

    <!-- fb & Whatsapp -->

    <!-- Site Name, Title, and Description to be displayed -->
    <meta property="og:site_name" content="Senuhas Colour Mart">
    <meta property="og:title" content="Senuhas Colour Mart">
    <meta property="og:description" content="Colour your life">

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
                <div class="container-fluid mt-5 px-3 px-lg-5">
                    <div class="row">
                        <div class="col-12 col-xl-3 my-auto">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row py-3 " style="border: 5px solid rgba(0, 12, 163, 0.8); border-radius: 8px;">

                                        <div class="col-12 col-md-6 col-xl-12 my-2 ">
                                            <h6>Search</h6>
                                            <div class="input-group">
                                                <input type="text" class="form-control" value="<?php if (isset($_GET['text'])) {
                                                                                                    echo $_GET['text'];
                                                                                                } ?>" placeholder="Type Here..." aria-describedby="inputGroupPrepend2" id="search">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-secondary" onclick="search();" style="background-color: gray; color: white;" id="inputGroupPrepend2">Search</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-md-none d-xl-block">
                                            <hr>
                                        </div>

                                        <div class="col-12 col-md-6 col-xl-12 mb-2">
                                            <h6>Caregory</h6>
                                            <div class="row">
                                                <div class="col-12">
                                                    <select id="category" onchange="loadSubCategory2();" class="form-control my-2">
                                                        <option value="0">Select Category</option>
                                                        <?php
                                                        $resultset3 = Database::search("SELECT * FROM `category` WHERE `status_id` != '0' ORDER BY name ASC;");
                                                        while ($category = $resultset3->fetch_assoc()) {
                                                        ?>
                                                            <option value="<?= $category['id'] ?>" <?php if (isset($_GET['category'])) {
                                                                                                        if ($_GET['category'] == $category['id']) {
                                                                                                            echo "selected";
                                                                                                        }
                                                                                                    } ?>><?= $category['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-12" id="subCategoryContent2">
                                                    <?php
                                                    if (isset($_GET['category'])) {
                                                        if ($_GET['category'] != '' &&  $_GET['category'] != '0' && !empty($_GET['category'])) {
                                                            $resultset3 = Database::search("SELECT * FROM `sub_category` WHERE `status_id` != '0' AND  `category_id`= '" . $_GET['category'] . "' ORDER BY name ASC;");
                                                    ?>
                                                            <select id="category" onchange="loadSubCategory2();" class="form-control my-2">
                                                                <option value="0">Select Category</option>
                                                                <?php
                                                                while ($subCategory = $resultset3->fetch_assoc()) {
                                                                ?>
                                                                    <option value="<?= $subCategory['id'] ?>" <?php if (isset($_GET['subCategory'])) {
                                                                                                                    if ($_GET['subCategory'] == $subCategory['id']) {
                                                                                                                        echo "selected";
                                                                                                                    }
                                                                                                                } ?>><?= $subCategory['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <select id="subCategory" class="form-control">
                                                                <option value="0">Select Sub Category</option>
                                                            </select>
                                                        <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <select id="subCategory" class="form-control">
                                                            <option value="0">Select Sub Category</option>
                                                        </select>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <h6>Brand</h6>
                                            <select id="brand" class="form-control">
                                                <option value="0">Select Brand</option>
                                                <?php
                                                $resultset4 = Database::search("SELECT * FROM `brand` WHERE `status_id` != '0' ORDER BY `order` ASC ;");
                                                while ($brand = $resultset4->fetch_assoc()) {
                                                ?>
                                                    <option value="<?= $brand['id'] ?>" <?php if (isset($_GET['brand'])) {
                                                                                            if ($_GET['brand'] == $brand['id']) {
                                                                                                echo "selected";
                                                                                            }
                                                                                        } ?>><?= $brand['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <h6>Sort By</h6>
                                            <select id="sort" class="form-control">
                                                <option <?php if (isset($_GET['sort'])) {
                                                            if ($_GET['sort'] == '1') {
                                                                echo "selected";
                                                            }
                                                        } ?> value="1">Name: A to Z</option>
                                                <option <?php if (isset($_GET['sort'])) {
                                                            if ($_GET['sort'] == '2') {
                                                                echo "selected";
                                                            }
                                                        } ?> value="2">Name: Z to A</option>
                                                <option <?php if (isset($_GET['sort'])) {
                                                            if ($_GET['sort'] == '3') {
                                                                echo "selected";
                                                            }
                                                        } ?> value="3">Price: Low to High</option>
                                                <option <?php if (isset($_GET['sort'])) {
                                                            if ($_GET['sort'] == '4') {
                                                                echo "selected";
                                                            }
                                                        } ?> value="4">Price: High to Low</option>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <h6>Price Range</h6>
                                            <div class="row">
                                                <div class="col-5 mx-auto">
                                                    <input type="number" min="0" pattern="0-9" id="min" placeholder="Min" value="<?php if (isset($_GET['min'])) {
                                                                                                                                        echo $_GET['min'];
                                                                                                                                    } ?>" class="form-control">
                                                </div>
                                                <div class="col-2 mx-auto text-center">-</div>
                                                <div class="col-5 mx-auto">
                                                    <input type="number" min="0" pattern="0-9" id="max" placeholder="Max" value="<?php if (isset($_GET['max'])) {
                                                                                                                                        echo $_GET['max'];
                                                                                                                                    } ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                        </div>

                                        <div class="col-12 my-2">
                                            <button class="btn btn-dark" onclick="window.location='search.php?scroll=true';" style="background-color: black; color: white; width: 100%;">Reset</button>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-danger" onclick="search();" style="background-color: rgba(210, 0, 0, 1); width: 100%;">Filter Products</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                        $limit = 20;
                        $page =  1;
                        $start = ($page - 1) * $limit;
                        $starting = $start == 0 ? 1 : $start;
                        $end = $limit + $start;
                        $bindedData = "";

                        $sql = "SELECT product.id,title,image1,category.name AS category FROM `product` INNER JOIN `brand` ON `brand`.`id` = `product`.`brand_id` INNER JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id` INNER JOIN `category` ON `category`.`id` = `sub_category`.`category_id` WHERE `product`.`status_id` = '1' AND  `category`.`status_id` = '1' AND  `sub_category`.`status_id` = '1' AND  `brand`.`status_id` = '1' ";
                        if (isset($_GET['subCategory'])) {
                            if ($_GET['subCategory'] != '' &&  $_GET['subCategory'] != '0' && !empty($_GET['subCategory'])) {
                                $sql .= "AND `product`.`sub_category_id`='" . $_GET['subCategory'] . "'";
                                $bindedData .= "subCategory=" . $_GET['subCategory'] . "&";
                            } else {
                                if (isset($_GET['category'])) {
                                    if ($_GET['category'] != '' &&  $_GET['category'] != '0' && !empty($_GET['category'])) {
                                        $sql .= "AND `sub_category`.`category_id`='" . $_GET['category'] . "'";
                                        $bindedData .= "category=" . $_GET['category'] . "&";
                                    }
                                }
                            }
                        } else {
                            if (isset($_GET['category'])) {
                                if ($_GET['category'] != '' &&  $_GET['category'] != '0' && !empty($_GET['category'])) {
                                    $sql .= "AND `sub_category`.`category_id`='" . $_GET['category'] . "'";
                                    $bindedData .= "category=" . $_GET['category'] . "&";
                                }
                            }
                        }
                        if (isset($_GET['min'])) {
                            if ($_GET['min'] != '' &&  $_GET['min'] != '0' && !empty($_GET['min'])) {
                                $sql .= " AND ((`discountPrice` = '0' AND `actualPrice` >= '" . $_GET['min'] . "') OR (`discountPrice` != '0' AND `discountPrice` >= '" . $_GET['min'] . "')) ";
                                $bindedData .= "min=" . $_GET['min'] . "&";
                            }
                        }
                        if (isset($_GET['max'])) {
                            if ($_GET['max'] != '' &&  $_GET['max'] != '0' && !empty($_GET['max'])) {
                                $sql .= " AND ((`discountPrice` = '0' AND `actualPrice` <= '" . $_GET['max'] . "') OR (`discountPrice` != '0' AND `discountPrice` <= '" . $_GET['max'] . "')) ";
                                $bindedData .= "max=" . $_GET['max'] . "&";
                            }
                        }
                        if (isset($_GET['text'])) {
                            if (!empty($_GET['text'])) {
                                $sql .= "AND ( product.title LIKE '%" . rtrim(ltrim($_GET['text'])) . "%' || category.name LIKE '%" . rtrim(ltrim($_GET['text'])) . "%' || sub_category.name LIKE '%" . rtrim(ltrim($_GET['text'])) . "%' ) ";
                                $bindedData .= "text=" . $_GET['text'] . "&";
                            }
                        }

                        if (isset($_GET['brand'])) {
                            if ($_GET['brand'] != '' &&  $_GET['brand'] != '0' && !empty($_GET['brand'])) {
                                $sql .= "AND `product`.`brand_id`='" . $_GET['brand'] . "'";
                                $bindedData .= "brand=" . $_GET['brand'] . "&";
                            }
                        }

                        if (isset($_GET['sort'])) {
                            if ($_GET['sort'] != '' &&  $_GET['sort'] != '0' && !empty($_GET['sort'])) {
                                if ($_GET['sort'] == '1') {
                                    $sql .= " ORDER BY product.`title` ASC ";
                                } else if ($_GET['sort'] == '2') {
                                    $sql .= " ORDER BY product.`title` DESC ";
                                } else if ($_GET['sort'] == '3') {
                                    $sql .= " ORDER BY  (CASE WHEN `discountPrice` != '0' THEN `discountPrice` ELSE `actualPrice` END) ASC ";
                                } else if ($_GET['sort'] == '4') {
                                    $sql .= " ORDER BY  (CASE WHEN `discountPrice` != '0' THEN `discountPrice` ELSE `actualPrice` END) DESC ";
                                }
                                $bindedData .= "sort=" . $_GET['sort'] . "&";
                            } else {
                                $sql .= " ORDER BY product.`title` ASC ";
                                $bindedData .= "sort=1&";
                            }
                        } else {
                            $sql .= " ORDER BY product.`title` ASC ";
                            $bindedData .= "sort=1&";
                        }

                        if (isset($_GET['start'])) {
                            $start = $_GET['start'];
                        } else {
                            $start = 0;
                        }

                        $products_per_page = 12;

                        $resultset5 = Database::search($sql . " LIMIT " . $start . "," . $products_per_page);


                        ?>
                        <div class="col-12 col-xl-9 mt-md-5 mt-xl-0" id="productsContainer">
                            <div class="row pl-4">
                                <div class="col-12 ">

                                    <div class="row" style="border-radius: 8px;">

                                        <?php
                                        if ($resultset5->num_rows > 0) {
                                            while ($product = $resultset5->fetch_assoc()) {


                                                $pricequery = Database::search("SELECT `actualPrice`,`discountPrice`,`isShow`,`scale_id` FROM `price` WHERE `price`.`product_id` = '" . $product['id'] . "' AND `isshow` = '1' ");
                                                $priceResult = $pricequery->fetch_assoc();
                                        ?>

                                                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                                                    <div class="row px-2">
                                                        <div class="col-12 my-2 card p-3 text-center" onclick="window.open('product.php?id=<?= $product['id'] ?>&<?= str_replace(' ', '_', $product['title']) ?>','_parent');" style=" min-height: 280px; cursor: pointer;">
                                                            <div class="title" style="font-size: 16px; font-weight: bold;"><?= $product['title'] ?></div>
                                                            <span class="category-name" style="font-size: 13px; color: rgba(166, 166, 166, 1);"><?= $product['category'] ?></span>
                                                            <img src="<?= $product['image1'] ?>" style="max-width: 100%; width: auto; height: 120px; object-fit: contain;">
                                                            <?php
                                                            if ($priceResult['discountPrice'] == '0') {
                                                            ?>
                                                                <span class="" style="color: blue; font-weight: bold; font-size: 18px;">Rs. <?= number_format($priceResult['actualPrice'], 2) ?></span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <span class="" style="color: blue; font-weight: bold; font-size: 18px;">Rs. <?= number_format($priceResult['discountPrice'], 2) ?></span>
                                                                <span style="color: red; display: inline-block; font-weight: bold; font-size: 14px;">Rs. <del><?= number_format($priceResult['actualPrice'], 2) ?></del>
                                                                    <div style="display: inline-block; background-color: red; color: white; max-width: fit-content; padding: 1px 8px; font-weight: bold; border-radius: 5px; ">-<?= 100 - floor(($priceResult['discountPrice'] / $priceResult['actualPrice']) * 100)  ?>%</div>
                                                                </span>

                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                        }
                                        ?>

                                    </div>
                                    <div style="text-align: center;">
                                        <nav aria-label="Page navigation example" class="my-3" style="width: min-content;  margin-left: auto; margin-right: auto;">
                                            <ul class="pagination">
                                                <?php
                                                $quary = Database::search($sql);

                                                $number_of_products = $quary->num_rows;

                                                $pages = ceil($number_of_products / $products_per_page);

                                                if ($start != 0) {
                                                ?>
                                                    <li class="page-item" style="cursor: poiner;"><a class="page-link" href="<?= basename(__FILE__) ?>?<?= $bindedData ?>start=<?php echo $start - $products_per_page; ?>&scroll=true" onclick="scrollToProducts();">&laquo;</a></li>
                                                <?php
                                                } else {
                                                ?>
                                                    <li class="page-item" style="cursor: poiner;"><a class="page-link" readonly>&laquo;</a></li>
                                                    <?php
                                                }

                                                if ($start  <= $products_per_page) {
                                                    $startno = 1;
                                                } else {
                                                    $startno = ($start / $products_per_page) - 1;
                                                }

                                                if ($pages <= $start / $products_per_page + 3) {
                                                    $endno = $pages;
                                                } else {
                                                    $endno = $start / $products_per_page + 3;
                                                }

                                                for ($t = $startno; $t <= $endno; $t++) {

                                                    if ($start == ($t - 1) * $products_per_page) {

                                                    ?>
                                                        <li class="page-item active" style="cursor: poiner;"><a class="page-link" style="background-color: rgba(62, 136, 255, 0.8);" onclick="scrollToProducts();"><?php echo $t; ?></a></li>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <li class="page-item" style="cursor: poiner;"><a class="page-link" href="<?= basename(__FILE__) ?>?<?= $bindedData ?>start=<?php echo ($t - 1) * $products_per_page; ?>&scroll=true" onclick="scrollToProducts();"><?php echo $t; ?></a></li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <?php
                                                if ($start != (floor($pages) - 1) * $products_per_page) {
                                                ?>
                                                    <li class="page-item" style="cursor: poiner;"><a class="page-link" href="<?= basename(__FILE__) ?>?<?= $bindedData ?>start=<?php echo $start + $products_per_page; ?>&scroll=true" onclick="scrolToSearchAd();">&raquo;</a></li>
                                                <?php
                                                } else {
                                                ?>
                                                    <li class="page-item" style="cursor: poiner;"><a class="page-link" style="cursor: poiner;" readonly>&raquo;</a></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </nav>
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
    <script>
        <?php

        if (isset($_GET['scroll'])) {
            if ($_GET['scroll'] == 'true') {
        ?>
                scrollToProducts();
        <?php
            }
        }
        ?>

        function scrollToProducts() {
            document.getElementById('productsContainer').scrollIntoView({
                block: 'start',
                behavior: 'smooth',
            });
        }

        function search() {
            var category = document.getElementById("category").value;
            var subCategory = document.getElementById("subCategory").value;
            var brand = document.getElementById("brand").value;
            var text = document.getElementById("search").value;
            var min = document.getElementById("min").value;
            var max = document.getElementById("max").value;
            var sort = document.getElementById("sort").value;

            window.location = "search.php?text=" + text + "&category=" + category + "&subCategory=" + subCategory + "&brand=" + brand + "&min=" + min + "&sort=" + sort + "&max=" + max + "&scroll=true";
        }
    </script>
    <script src="bootstrap.js"></script>
    <script>
        function loadSubCategory2() {
            var id = document.getElementById('category').value;

            var form = new FormData();
            form.append("id", id);

            var r = new XMLHttpRequest();

            r.onreadystatechange = function() {
                if (r.readyState == 4) {
                    var text = r.responseText;
                    document.getElementById('subCategoryContent2').innerHTML = text;
                }
            }

            r.open("POST", "subcategoryLoad2.php", true);
            r.send(form);
        }
    </script>
</body>

</html>