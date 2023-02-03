<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
$isReadyToInstet = false;
$isShow = 1;
include "connection.php";

if (isset($_SESSION['admin_email']) && isset($_POST['pid'])) {

    $data = Database::search("SELECT `id` FROM `product` WHERE `id` = '" . $_POST['pid'] . "' ");


    if ($data->num_rows == 1) {


        if (!isset($_POST["package"])) {
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


                Database::iud("DELETE FROM `price` WHERE `product_id` = '" . $_POST['pid'] . "' ");

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
                        Database::iud("INSERT INTO `price`(`size`,`actualPrice`, `discountPrice`,`product_id`,`scale_id`,`isshow`) VALUES('" . $_POST['scale' . $x] . "','" . $_POST['aprice' . $x] . "','" . $dprice . "','" . $_POST['pid'] . "','" . $_POST['unit' . $x] . "','" . $show . "') ");
                    }
                } else {
                    $dprice = 0;
                    if ($_POST["discount1"] == 'true') {
                        $dprice = $_POST["dprice1"];
                    }
                    Database::iud("INSERT INTO `price`(`size`,`actualPrice`, `discountPrice`,`product_id`,`scale_id`,`isshow`) VALUES('0','" . $_POST['aprice1'] . "','" . $dprice . "','" . $_POST['pid'] . "','0','1') ");
                }

                echo "success";
            }
        }
    } else {
        echo "Invalid Product";
    }
}
