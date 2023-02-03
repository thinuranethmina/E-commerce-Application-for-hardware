<?php

session_set_cookie_params(60 * 60 * 24 * 30);
session_start();

if (!isset($_SESSION['admin_email'])) {
    if (!isset($_POST['email'])) {
        echo "Please enter your email";
    } else if (empty($_POST['email'])) {
        echo "Please enter your email";
    } else if (!isset($_POST['password'])) {
        echo "Please enter your password";
    } else if (empty($_POST['password'])) {
        echo "Please enter your password";
    } else {
        require 'connection.php';

        $user_query = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $_POST['email'] . "'; ");

        if ($user_query->num_rows != 1) {
            echo "Invalid Username or Password";
        } else {
            $user = $user_query->fetch_assoc();

            if ($user['password'] == $_POST['password']) {
                $_SESSION['admin_email'] = $_POST['email'];
                echo "success";
            } else {
                echo "Invalid Username or Password";
            }
        }
    }
}
