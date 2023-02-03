<?php

session_start();

if (isset($_SESSION["admin_email"])) {
    $_SESSION["admin_email"] = null;
    session_destroy();
}

header("Location: login.php");
