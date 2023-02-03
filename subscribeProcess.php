<?php

if (isset($_POST['email'])) {

    if (empty($_POST['email'])) {
        echo "Please enter your email";
    } else  if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        require 'db_connection.php';

        $data_rs = Database::search("SELECT * FROM subscribe WHERE email = '" . $_POST['email'] . "' ");
        $data_row = $data_rs->num_rows;

        if ($data_row == 0) {

            Database::iud("INSERT INTO `subscribe`(`email`) VALUES('" . $_POST['email'] . "')");

            echo "success";
        } else {
            echo "Already subscribed this email.";
        }
    } else {
        echo "Please enter valid email address";
    }
}
