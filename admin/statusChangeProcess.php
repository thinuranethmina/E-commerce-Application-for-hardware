<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {
    $brandId = $_GET["id"];

    $statusrs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $brandId . "';");
    $sn = $statusrs->num_rows;

    if ($sn == 1) {
        $sd = $statusrs->fetch_assoc();
        $statusId = $sd["status_id"];

        if ($statusId == 1) {
            Database::iud("UPDATE `brand` SET `status_id`='0' WHERE `id`='" . $brandId . "'; ");
            echo "Deactivated";
        } else if ($statusId == 0) {
            Database::iud("UPDATE `brand` SET `status_id`='1' WHERE `id`='" . $brandId . "'; ");
            echo "Activated";
        }
    } else {
        echo "Somthing when wrong";
    }
} else {
    echo "Please Sign In or Register.";
}
