<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
$isReadyToInstet = false;
$isShow = 1;
include "connection.php";

if (isset($_SESSION['admin_email'])) {


    if (!isset($_POST["category"])) {
        echo "Please select category";
    } elseif ($_POST["category"] == '0') {
        echo "Please select category";
    } else if (!isset($_POST["sub_category"])) {
        echo "Please select sub category";
    } elseif ($_POST["sub_category"] == '0') {
        echo "Please select sub category";
    } else if (!isset($_POST["title"])) {
        echo "Please enter title";
    } else if (empty(trim(rtrim($_POST["title"])))) {
        echo "Please enter title";
    } else if (strlen($_POST["title"]) > 50) {
        echo "Title maximum characters must be 50";
    } else if (!isset($_POST["brand"])) {
        echo "Please select brand";
    } elseif ($_POST["brand"] == '0') {
        echo "Please select brand";
    } else if (!isset($_POST["stock"])) {
        echo "Please select stock availability";
    } else if (!isset($_POST["description"])) {
        echo "Please enter short description";
    } else if (empty(trim(rtrim($_POST["description"])))) {
        echo "Please enter short description";
    } else if (strlen($_POST["description"]) <= 30 || strlen($_POST["description"]) >= 750) {
        echo "Short description characters must be greater than 30 and less than 750";
    } else if (!isset($_POST["info"])) {
        echo "Please enter more details";
    } else if (empty(trim(rtrim($_POST["info"])))) {
        echo "Please enter more details";
    } else if (strlen($_POST["info"]) <= 30 || strlen($_POST["info"]) >= 5000) {
        echo "More details characters must be greater than 30 and less than 5000";
    } else if (!isset($_FILES["image1"])) {
        echo "Please upload cover image";
    } else if (!isset($_POST["package"])) {
        echo "Please select package type";
    } else {

        if ($_POST["package"] == 'true') {
            if (!isset($_POST["mesureType"])) {
                echo "Please select mesuring type";
            } else if ($_POST["mesureType"] == '0') {
                echo "Please select mesuring type";
            } else if (!isset($_POST["rows"])) {
                echo "Please add new package type";
            } else if ($_POST["rows"] <= '0') {
                echo "Please add at least one package type";
            } else {
                for ($x = 1; $x <= $_POST["rows"]; $x++) {

                    if (!isset($_POST["show" . $x])) {
                        echo "Please select package ";
                        break;
                    } else if (!isset($_POST["scale" . $x])) {
                        echo "Please enter scale for package " . $x;
                        break;
                    } else if (empty(trim(rtrim($_POST["scale" . $x]))) || trim(rtrim($_POST["scale" . $x])) == '0' || !is_numeric($_POST["scale" . $x])) {
                        echo "Please enter valid scale for package " . $x;
                        break;
                    } else  if (!isset($_POST["unit" . $x])) {
                        echo "Please select unit in package" . $x;
                        break;
                    } else if ($_POST["unit" . $x] == '0') {
                        echo "Please select unit in package " . $x;
                        break;
                    } else if (!isset($_POST["aprice" . $x])) {
                        echo "Please enter price for package " . $x;
                        break;
                    } else if (empty(trim(rtrim($_POST["aprice" . $x])))) {
                        echo "Please enter valid price for package " . $x;
                        break;
                    } else if (!is_numeric($_POST["aprice" . $x])) {
                        echo "Please enter valid price for package " . $x;
                        break;
                    } else if (!isset($_POST["discount" . $x])) {
                        echo "Unexpected error";
                        break;
                    } else if ($_POST["discount" . $x] == 'true' && !isset($_POST["dprice" . $x])) {
                        echo "Please enter price of after discount in package " . $x;
                        break;
                    } else if ($_POST["discount" . $x] == 'true' && empty(trim(rtrim($_POST["dprice" . $x])))) {
                        echo "Please enter price of after discount in package " . $x;
                        break;
                    } else if ($_POST["discount" . $x] == 'true' && !is_numeric($_POST["dprice" . $x])) {
                        echo "Please enter price of after discount in package " . $x;
                        break;
                    } else if ($_POST["discount" . $x] == 'true' && ($_POST["dprice" . $x] >= $_POST["aprice" . $x])) {
                        echo "Please enter valid price for after discount price in package " . $x;
                        break;
                    } else if ($x == $_POST["rows"]) {

                        if ($_POST['show' . $x] == 'true') {
                            $isShow = $x;
                        }

                        $isReadyToInstet = true;
                    }

                    if ($x < $_POST["rows"]) {
                        if ($_POST['show' . $x] == 'true') {
                            $isShow = $x;
                        }
                    }
                }
            }
        } else {

            if (!isset($_POST["aprice1"])) {
                echo "Please enter price";
            } else if (empty(trim(rtrim($_POST["aprice1"])))) {
                echo "Please enter valid price";
            } else if (!is_numeric($_POST["aprice1"])) {
                echo "Please enter valid price ";
            } else if (!isset($_POST["discount1"])) {
                echo "Unexpected error";
            } else if ($_POST["discount1"] == 'true' && !isset($_POST["dprice1"])) {
                echo "Please enter price of after discount ";
            } else if ($_POST["discount1"] == 'true' && empty(trim(rtrim($_POST["dprice1"])))) {
                echo "Please enter price of after discount";
            } else if ($_POST["discount1"] == 'true' && !is_numeric($_POST["dprice1"])) {
                echo "Please enter price of after discount";
            } else if ($_POST["discount1"] == 'true' && ($_POST["dprice1"] >= $_POST["aprice1"])) {
                echo "Please enter valid price for after discount price ";
            } else {
                $isReadyToInstet = true;
            }
        }

        if ($isReadyToInstet) {

            $qty = 1;
            if ($_POST["stock"] == 'false') {
                $qty = 0;
            }


            date_default_timezone_set('Asia/Kolkata');
            $date_time = date("Y-m-d H:i:s");

            $time = time();

            Database::iud("INSERT INTO `product`(`ref`,`title`,`brand_id`,`sub_category_id`,`description`,`more_info`,`qty`,`add_date`) VALUES('" . $time . "','" . str_replace("'", "\'", $_POST["title"]) . "','" . $_POST['brand'] . "','" . $_POST['sub_category'] . "','" . str_replace("'", "\'", $_POST["description"]) . "','" . str_replace("'", "\'", $_POST["info"]) . "','" . $qty . "','" . $date_time . "');");

            $id = Database::search("SELECT `id` FROM `product` WHERE `ref` = '" . $time . "' ")->fetch_assoc()['id'];

            if ($_POST["package"] == 'true') {

                for ($x = 1; $x <= $_POST["rows"]; $x++) {
                    $dprice = 0;
                    if ($_POST["discount" . $x] == 'true') {
                        $dprice = $_POST["dprice" . $x];
                    }
                    $show = 0;
                    if ($x == $isShow) {
                        $show = 1;
                    }
                    Database::iud("INSERT INTO `price`(`size`,`actualPrice`, `discountPrice`,`product_id`,`scale_id`,`isshow`) VALUES('" . $_POST['scale' . $x] . "','" . $_POST['aprice' . $x] . "','" . $dprice . "','" . $id . "','" . $_POST['unit' . $x] . "','" . $show . "') ");
                }
            } else {
                $dprice = 0;
                if ($_POST["discount1"] == 'true') {
                    $dprice = $_POST["dprice1"];
                }
                Database::iud("INSERT INTO `price`(`size`,`actualPrice`, `discountPrice`,`product_id`,`scale_id`,`isshow`) VALUES('0','" . $_POST['aprice1'] . "','" . $dprice . "','" . $id . "','0','1') ");
            }


            for ($x = 1; $x <= 3; $x++) {
                if (isset($_FILES["image" . $x])) {

                    $image = $_FILES["image" . $x]["name"];

                    $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png");
                    $fileex = $_FILES["image" . $x]["type"];

                    if (!in_array($fileex, $allowed_image_extention)) {
                    } else {
                        $newImageExtention;
                        if ($fileex == "image/jpg") {
                            $newImageExtention = ".jpg";
                        } else if ($fileex == "image/jpeg") {
                            $newImageExtention = ".jpg";
                        } else if ($fileex == "image/png") {
                            $newImageExtention = ".png";
                        }

                        $file_name = "images/product/" . uniqid($prefix = "productImg_" . $time . "_") . $newImageExtention;

                        move_uploaded_file($_FILES["image" . $x]["tmp_name"], '../' . $file_name);

                        if (file_exists('../' . $file_name)) {
                            Database::iud("UPDATE `product` set `image$x`='" . $file_name . "' WHERE `ref` = '" . $time . "';");
                        }
                    }
                }
            }

            echo "success";
        }
    }
}
