<?php

session_start();
include "../config/conn.php";

if (isset($_SESSION["admin_email"])) {
    $productId = $_GET["p"];
    $statusId = $_GET["s"];

    $statusrs = Database::search("SELECT * FROM `gallery` WHERE `id`='" . $productId . "';");
    $sn = $statusrs->num_rows;

    if ($sn == 1) {
        $sd = $statusrs->fetch_assoc();
        $statusId = $sd["status"];

        if ($statusId == 1) {
            Database::iud("UPDATE `gallery` SET `status`='0' WHERE `id`='" . $productId . "'; ");
            echo "Deactivated";
        } else if ($statusId == 0) {
            Database::iud("UPDATE `gallery` SET `status`='1' WHERE `id`='" . $productId . "'; ");
            echo "Activated";
        }
    }
}
