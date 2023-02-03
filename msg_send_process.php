<?php


if (!isset($_POST['name'])) {
    echo "Please enter your name";
} else if (empty($_POST['name'])) {
    echo "Please enter your name";
} else if (!isset($_POST['mobile'])) {
    echo "Please enter mobile";
} else if (empty($_POST['mobile'])) {
    echo "Please enter mobile";
} else if (!preg_match("/[0][7][1|2|4|5|6|7|8][0-9]{7}$/", $_POST["mobile"])) {
    echo "Please enter valid mobile number";
} else if (!isset($_POST['message'])) {
    echo "Please enter message";
} else if (empty(rtrim(ltrim($_POST['message'])))) {
    echo "Please enter message";
} else {
    require "db_connection.php";

    date_default_timezone_set('Asia/Kolkata');
    $date_time = date("Y-m-d");

    Database::search("INSERT INTO `messages`(`name`,`mobile`,`message`,`date`) VALUES('" . $_POST['name'] . "','" . $_POST['mobile'] . "','" . $_POST['message'] . "','$date_time')");

    echo "success";
}
