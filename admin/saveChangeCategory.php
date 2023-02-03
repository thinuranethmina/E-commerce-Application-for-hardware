<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {
    if (isset($_POST["id"])) {

        if (!isset($_POST["name"])) {
            echo "Please enter category name.";
        } else if (empty(rtrim(trim($_POST["name"])))) {
            echo "Please enter category name.";
        } else {

            $data = Database::search("SELECT * FROM category WHERE `name`='" . $_POST["name"] . "' AND `id` != '" . $_POST["id"] . "' ")->num_rows;

            if ($data == 0) {
                $statusrs = Database::search("SELECT * FROM `category` WHERE `id`='" . $_POST["id"] . "';");
                $sn = $statusrs->num_rows;

                if ($sn == 1) {
                    Database::search("UPDATE `category` SET `name`='" . $_POST["name"] . "' WHERE `id` = '" . $_POST["id"] . "' ;");
                    echo "success";
                }
            } else {
                echo "Already exist this category";
            }
        }
    } else {
        echo "Somthing when wrong.";
    }
} else {
    echo "Please Sign In or Register.";
}
