<?php
require "connection.php";

$product = Database::search("SELECT * FROM `product`");

while ($data = $product->fetch_assoc()) {
    Database::iud("INSERT INTO `price`(`size`, `actualPrice`, `discountPrice`, `product_id`, `scale_id`, `isshow`) VALUES('0','" . $data['actualPrice'] . "','" . $data['discountPrice'] . "','" . $data['id'] . "','0','1') ");
    echo $data['id'] . "<br>";
}
