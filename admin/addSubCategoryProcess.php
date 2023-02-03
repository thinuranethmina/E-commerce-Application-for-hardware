<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {

    if (!isset($_POST["category"])) {
        echo "Please select category name.";
    } else if (empty($_POST["category"])) {
        echo "Please select category name.";
    } else if ($_POST["category"] == '' || $_POST["category"] == '0') {
        echo "Please select category name.";
    } else if (!isset($_POST["name"])) {
        echo "Please enter sub category name.";
    } else if (empty(rtrim(trim($_POST["name"])))) {
        echo "Please enter sub category name.";
    } else {
        $data = Database::search("SELECT * FROM sub_category WHERE `name`='" . $_POST["name"] . "' AND `category_id`='" . $_POST["category"] . "' ")->num_rows;

        if ($data == 0) {
            Database::iud("INSERT INTO `sub_category`(`name`,`category_id`) VALUES('" . $_POST["name"] . "', '" . $_POST["category"] . "');");
            echo "success";
        } else {
            echo "Already exist this sub category";
        }
    }
} else {
    echo "Please Sign In or Register.";
}
