<?php
include "connection.php";
session_start();

if (isset($_SESSION['admin_email'])) {

    if (!isset($_POST['ousername'])) {
        echo "Please enter old username";
    } else if (empty(trim(rtrim($_POST['ousername'])))) {
        echo "Please enter old username";
    } else if (!isset($_POST['opassword'])) {
        echo "Please enter old password";
    } else if (empty(trim(rtrim($_POST['opassword'])))) {
        echo "Please enter old password";
    } else if (!isset($_POST['nusername'])) {
        echo "Please enter new username";
    } else if (empty(trim(rtrim($_POST['nusername'])))) {
        echo "Please enter new username";
    } else if (!isset($_POST['npassword'])) {
        echo "Please enter new password";
    } else if (empty(trim(rtrim($_POST['npassword'])))) {
        echo "Please enter new password";
    } else if (strlen($_POST["npassword"]) < 8) {
        echo "New password minimum characters must be 8";
    } else if (!isset($_POST['cpassword'])) {
        echo "Please confirm password";
    } else if (empty(trim(rtrim($_POST['cpassword'])))) {
        echo "Please enter confirm password";
    } else if ($_POST['cpassword'] != $_POST['npassword']) {
        echo "Not maching your new password and confirmed password";
    } else {

        $result = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $_POST['ousername'] . "'");

        if ($result->num_rows == 1) {
            $resultset = $result->fetch_assoc();
            if ($resultset['password'] == $_POST['opassword'] && $resultset['email'] == $_POST['ousername']) {
                Database::iud("UPDATE `admin` SET `email` = '" . $_POST['nusername'] . "',  `password` = '" . $_POST['npassword'] . "' WHERE `email` = '" . $_POST['ousername'] . "'");
                echo "success";
            } else {
                echo "Invalid old username or old password";
            }
        } else {
            echo "Invalid old username or old password";
        }
    }
}
