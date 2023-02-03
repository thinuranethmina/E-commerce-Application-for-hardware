<?php

session_set_cookie_params(60 * 60 * 24);
session_start();

require "connection.php";


if (isset($_SESSION['admin_email'])) {

    if (!isset($_FILES['image'])) {
        echo "Please upload image";
    } else {

        $image = $_FILES["image"]["name"];

        $allowed_image_extention = array("image/jpg", "image/jpeg", "image/png", "image/webp");
        $fileex = $_FILES["image"]["type"];

        if (!in_array($fileex, $allowed_image_extention)) {
            echo "Invalid file type";
        } else {
            $newImageExtention;
            if ($fileex == "image/jpg") {
                $newImageExtention = ".jpg";
            } else if ($fileex == "image/jpeg") {
                $newImageExtention = ".jpg";
            } else if ($fileex == "image/png") {
                $newImageExtention = ".png";
            } else if ($fileex == "image/webp") {
                $newImageExtention = ".webp";
            }

            $file_name = "images/banner/" . uniqid($prefix = "galleryImg_" . time() . "_") . $newImageExtention;

            move_uploaded_file($_FILES["image"]["tmp_name"], '../' . $file_name);

            if (file_exists('../' . $file_name)) {
                Database::iud("INSERT INTO `gallery`(`path`) VALUES ('" . $file_name . "');");
                echo "success";
            } else {
                echo "Please try againg later.";
            }
        }
    }
}
