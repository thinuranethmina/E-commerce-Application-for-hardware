<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {

    if (!isset($_POST["name"])) {
        echo "Please enter category name.";
    } else if (empty(rtrim(trim($_POST["name"])))) {
        echo "Please enter category name.";
    } else {
        $data = Database::search("SELECT * FROM category WHERE `name`='" . $_POST["name"] . "' ")->num_rows;

        if ($data == 0) {

            Database::iud("INSERT INTO `category`(`name`) VALUES('" . $_POST["name"] . "')");
            echo "success";
        } else {
            echo "Already exist this category";
        }
    }
} else {
    echo "Please Sign In or Register.";
}
