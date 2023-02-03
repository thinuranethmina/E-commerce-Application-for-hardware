<?php

session_set_cookie_params(60 * 60 * 24);
session_start();

include "connection.php";

if (isset($_SESSION['admin_email']) && isset($_POST['ref']) && isset($_POST['id'])) {

    if ($_POST['id'] == '1') {

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
        } else if (strlen($_POST["description"]) <= 30 || strlen($_POST["description"]) >= 500) {
            echo "Short description characters must be greater than 30 and less than 500";
        } else if (!isset($_POST["info"])) {
            echo "Please enter more details";
        } else if (empty(trim(rtrim($_POST["info"])))) {
            echo "Please enter more details";
        } else if (strlen($_POST["info"]) <= 30 || strlen($_POST["info"]) >= 5000) {
            echo "More details characters must be greater than 30 and less than 5000";
        } else {
            $qty = 1;
            if ($_POST["stock"] == 'false') {
                $qty = 0;
            }


            Database::iud("UPDATE `product` SET `title` = '" . str_replace("'", "\'", $_POST["title"]) . "', `brand_id` = '" . $_POST['brand'] . "', `sub_category_id` = '" . $_POST['sub_category'] . "', `description` = '" . str_replace("'", "\'", $_POST["description"]) . "', `more_info` = '" . str_replace("'", "\'", $_POST["info"]) . "', `qty` = '" . $qty . "', `status_id` = '1'  WHERE `ref` = '" . $_POST['ref'] . "' ;");


            for ($x = 1; $x <= 3; $x++) {

                $insertImage = 'true';


                if (isset($_POST['removeStatus' . $x])) {
                    if ($_POST['removeStatus' . $x] == 'remove') {
                        $insertImage = 'false';

                        $check_query = Database::search("SELECT * FROM `product` WHERE `ref` = '" . $_POST['ref'] . "'");

                        if ($check_query->num_rows == 1) {
                            $check_data = $check_query->fetch_assoc();
                            if ($check_data['image' . $x] != null) {
                                unlink("../" . $check_data['image' . $x]);
                            }

                            $sql = Database::iud("UPDATE `product` SET `image" . $x . "` = null  WHERE `ref` = '" . $_POST['ref'] . "' ");
                        }
                    }
                }

                if ($insertImage == 'true') {
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

                            $file_name = "images/product/" . uniqid($prefix = "productImg_" . $_POST['ref'] . "_") . $newImageExtention;

                            move_uploaded_file($_FILES["image" . $x]["tmp_name"], '../' . $file_name);

                            if (file_exists('../' . $file_name)) {

                                $check_query = Database::search("SELECT * FROM `product` WHERE `ref` = '" . $_POST['ref'] . "'");

                                if ($check_query->num_rows == 1) {
                                    $check_data = $check_query->fetch_assoc();
                                    if ($check_data['image' . $x] != null) {
                                        unlink("../" . $check_data['image' . $x]);
                                    }
                                    Database::iud("UPDATE `product` set `image$x`='" . $file_name . "' WHERE `ref` = '" . $_POST['ref'] . "';");
                                }
                            }
                        }
                    }
                }
            }

            echo "success1";
        }
    } else if ($_POST['id'] == '2') {

        Database::iud("UPDATE `product` set `status_id`='0' WHERE `ref` = '" . $_POST['ref'] . "';");
        echo "success2";
    } else if ($_POST['id'] == '3') {

        $check_query = Database::search("SELECT * FROM `product` WHERE `ref` = '" . $_POST['ref'] . "'");

        if ($check_query->num_rows == 1) {
            $check_data = $check_query->fetch_assoc();

            for ($x = 1; $x <= 2; $x++) {
                if ($check_data['image' . $x] != null) {
                    unlink("../" . $check_data['image' . $x]);
                }
            }
        }

        $id = Database::search("SELECT * FROM `product` WHERE `ref` = '" . $_POST['ref'] . "'")->fetch_assoc()['id'];

        $sql = Database::iud("DELETE FROM `price` WHERE `product_id` = '" . $id . "' ");

        $sql = Database::iud("DELETE FROM `product` WHERE `ref` = '" . $_POST['ref'] . "' ");

        echo "success3";
    }
}
