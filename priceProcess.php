<?php

require "db_connection.php";

if (isset($_POST['scale'])) {
    $pricequery = Database::search("SELECT `actualPrice`,`discountPrice` FROM `price` WHERE `id` = '" . $_POST['scale'] . "' ");
    $priceResult = $pricequery->fetch_assoc();

    if ($priceResult['discountPrice'] == '0') { ?>
        <div id="price">
            <h3 class="d-inline-block">Rs. <?= number_format($priceResult['actualPrice'], 2) ?></h3>&nbsp;
        </div>
    <?php
    } else {
    ?>
        <div id="price">
            <h3 class="d-inline-block">Rs. <?= number_format($priceResult['discountPrice'], 2) ?></h3>&nbsp;
            <h6 class="d-inline-block" style="color: red;">Rs.<del><?= number_format($priceResult['actualPrice'], 2) ?></del></h6>&nbsp;
            <?php
            echo "(-" . (100 - floor(($priceResult['discountPrice'] / $priceResult['actualPrice']) * 100)) . "%)";
            ?>
        </div>
    <?php
    }
} else {
    ?>
    <script>
        window.location = './';
    </script>
<?php
}
?>