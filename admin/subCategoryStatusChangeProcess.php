<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {
    $subCategoryId = $_GET["id"];

    $statusrs = Database::search("SELECT * FROM `sub_category` WHERE `id`='" . $subCategoryId . "';");
    $sn = $statusrs->num_rows;

    if ($sn == 1) {
        $sd = $statusrs->fetch_assoc();
        $statusId = $sd["status_id"];

        if ($statusId == 1) {
            Database::iud("UPDATE `sub_category` SET `status_id`='0' WHERE `id`='" . $subCategoryId . "'; ");
            echo "Deactivated";
        } else if ($statusId == 0) {
            Database::iud("UPDATE `sub_category` SET `status_id`='1' WHERE `id`='" . $subCategoryId . "'; ");
            echo "Activated";
        }
    } else {
        echo "Somthing when wrong";
    }
} else {
    echo "Please Sign In or Register.";
}
