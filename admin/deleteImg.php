<?php
include "connection.php";

session_start();

if (isset($_SESSION['admin_email'])) {
    if (isset($_POST['id'])) {

        $count = Database::search("SELECT * FROM `gallery` ")->num_rows;

        if ($count > 1) {
            $data = Database::search("SELECT * FROM `gallery` WHERE `id` = '" . $_POST['id'] . "' ");

            if ($data->num_rows == 1) {
                $image = $data->fetch_assoc()['path'];

                unlink("../" . $image);

                Database::iud("DELETE FROM `gallery` WHERE `id` = '" . $_POST['id'] . "'; ");

                echo "success";
            }
        } else {
            echo "There must have at least one image. If you want to delete this image please upload another image and delete this one.";
        }
    }
}
