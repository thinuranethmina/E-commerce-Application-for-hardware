<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {

    if (!isset($_POST["brand"])) {
        echo "Please enter brand name.";
    } else if (empty(rtrim(trim($_POST["brand"])))) {
        echo "Please enter brand name.";
    } else {
        $data = Database::search("SELECT * FROM brand WHERE `name`='" . $_POST["brand"] . "' ")->num_rows;

        if ($data == 0) {

            $order = Database::search("SELECT * FROM `brand` ORDER BY `order` DESC LIMIT 1")->fetch_assoc()['order'];
            $order++;
            Database::iud("INSERT INTO `brand`(`name`,`order`) VALUES('" . $_POST["brand"] . "','$order')");
            echo "success";
        } else {
            echo "Already exist this brand";
        }
    }
} else {
    echo "Please Sign In or Register.";
}
