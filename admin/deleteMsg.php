<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {

    Database::iud("DELETE  FROM `messages` WHERE `id`='" . $_POST["id"] . "';");

    echo "success";
}
