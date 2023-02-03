<?php
session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {
    if (isset($_POST["id"])) {
        if (isset($_POST['pid'])) {

            $pricequery = Database::search("SELECT `scale_id`,`unit_id`,`actualPrice`,`discountPrice`,`isShow`,`size`,`unit`.`name` AS `unit`, `scale`.`name` AS `scale`, `price`.`id` AS `price_id` FROM `price` INNER JOIN `scale` ON `scale`.`id` = `price`.`scale_id` INNER JOIN `unit` ON `unit`.`id` = `scale`.`unit_id` WHERE `price`.`product_id` = '" . $_POST['pid'] . "' ");
            $priceResult = $pricequery->fetch_assoc();

            if ($priceResult['scale_id'] == '0') {
                $isMPrice = false;
            } else {
                $isMPrice = true;
            }

            if ($_POST["id"] == '1') {

                if ($isMPrice) {
?>
                    <tr>
                        <td>
                            <div class="row my-3">
                                <div class="col-12 col-lg-3">
                                    <label class="form-label">Marked Price</label>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rs. </div>
                                        </div>
                                        <input type="text" class="form-control" onkeyup="priceFormat1(event,'1');" onkeydown="priceKeyFilter(event);" id="aprice1" placeholder="Enter Marked Price">
                                        <div class="input-group-prepend d-none" id="discountPercentage1">
                                            <div class="input-group-text" id="discount1">--</div>
                                        </div>
                                    </div>
                                    <label for="addDiscount1">
                                        <input type="checkbox" onclick="discountProcess('1');" class="form-check-input" name="" id="addDiscount1">
                                        This product has discount.
                                    </label>
                                </div>
                            </div>

                            <div class="row my-3 d-none" id="discountContent1">
                                <div class="col-12 col-lg-3">
                                    <label class="form-label">
                                        Price of After Discount
                                    </label>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rs. </div>
                                        </div>
                                        <input type="text" class="form-control" onkeyup="priceFormat2(event,'1');" onkeydown="priceKeyFilter(event);" id="dprice1" value="" placeholder="Enter Price of After Discount">
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php
                } else {

                ?>
                    <tr>
                        <td>

                            <div class="row my-3">
                                <div class="col-12 col-lg-3">
                                    <label class="form-label">Marked Price</label>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rs. </div>
                                        </div>
                                        <input type="text" value="<?= number_format($priceResult['actualPrice']) ?>" class="form-control" onkeyup="priceFormat1(event,'1');" onkeydown="priceKeyFilter(event);" id="aprice1" placeholder="Enter Marked Price">
                                        <div class="input-group-prepend   <?php if ($priceResult['discountPrice'] == 0) {
                                                                                echo "d-none";
                                                                            } ?>" id="discountPercentage1">
                                            <div class="input-group-text" id="discount1"><?php if ($priceResult['discountPrice'] != 0) {
                                                                                                echo "-" . floor(100 - (($priceResult['discountPrice'] / $priceResult['actualPrice']) * 100)) . "%";
                                                                                            } else {
                                                                                                echo "--";
                                                                                            } ?></div>
                                        </div>
                                    </div>
                                    <label for="addDiscount1">
                                        <input type="checkbox" onclick="discountProcess('1');" class="form-check-input" name="" id="addDiscount1" <?php if ($priceResult['discountPrice'] > 0) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                        This product has discount.
                                    </label>
                                </div>
                            </div>

                            <div class="row my-3   <?php if ($priceResult['discountPrice'] == 0) {
                                                        echo "d-none";
                                                    } ?>" id="discountContent1">
                                <div class="col-12 col-lg-3">
                                    <label class="form-label">
                                        Price of After Discount
                                    </label>
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rs. </div>
                                        </div>
                                        <input type="text" class="form-control" onkeyup="priceFormat2(event,'1');" onkeydown="priceKeyFilter(event);" id="dprice1" value="<?= number_format($priceResult['discountPrice']) ?>" placeholder="Enter Price of After Discount">
                                    </div>
                                </div>




                            </div>
                        </td>
                    </tr>
                    <?php
                }
            } else if ($_POST["id"] == 'm') {


                if ($isMPrice) {

                    $x = 1;
                    do {
                    ?>
                        <tr>
                            <td>
                                <hr class="mb-4">
                                <div class="row">
                                    <div class="col-12 ps-4">
                                        <h6>
                                            <label for="show<?= $x ?>">
                                                <input type="radio" class="form-check-input" name="show" id="show<?= $x ?>" <?php if ($priceResult['isShow'] == '1') {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                                Package <?= $x ?>
                                            </label>
                                        </h6>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">Package Scale</label>
                                    </div>
                                    <div class="col-12 col-lg-6 px-3 pe-lg-1">
                                        <input type="text" value="<?= $priceResult['size'] ?>" class="form-control" id="scale<?= $x ?>" placeholder="Enter Scale">
                                    </div>
                                    <div class="col-12 col-lg-3 px-3 ps-lg-1">
                                        <select id="unit<?= $x ?>" class="form-control">
                                            <option value="0">Select Unit</option>
                                            <?php
                                            $resultset3 = Database::search("SELECT * FROM `scale` WHERE `id` !='0' AND `unit_id` = '" . $priceResult["unit_id"] . "'  ORDER BY `name` ASC;");
                                            while ($data2 = $resultset3->fetch_assoc()) {
                                            ?>
                                                <option value="<?= $data2['id'] ?>" <?php if ($data2['id'] == $priceResult['scale_id']) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $data2['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">Marked Price</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rs. </div>
                                            </div>
                                            <input type="text" value="<?= number_format($priceResult['actualPrice']) ?>" class="form-control" onkeyup="priceFormat1(event,'<?= $x ?>');" onkeydown="priceKeyFilter(event);" id="aprice<?= $x ?>" placeholder="Enter Marked Price">
                                            <div class="input-group-prepend  <?php if ($priceResult['discountPrice'] == 0) {
                                                                                    echo "d-none";
                                                                                } ?>" id="discountPercentage<?= $x ?>">
                                                <div class="input-group-text" id="discount<?= $x ?>"><?php if ($priceResult['discountPrice'] != 0) {
                                                                                                            echo "-" . floor(100 - (($priceResult['discountPrice'] / $priceResult['actualPrice']) * 100)) . "%";
                                                                                                        } else {
                                                                                                            echo "--";
                                                                                                        } ?></div>
                                            </div>
                                        </div>
                                        <label for="addDiscount<?= $x ?>">
                                            <input type="checkbox" onclick="discountProcess('<?= $x ?>');" onkeydown="priceKeyFilter(event);" class="form-check-input" name="" id="addDiscount<?= $x ?>" <?php if ($priceResult['discountPrice'] > 0) {
                                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                                            } ?>>
                                            This package has discount.
                                        </label>
                                    </div>
                                </div>

                                <div class="row my-3  <?php if ($priceResult['discountPrice'] == 0) {
                                                            echo "d-none";
                                                        } ?>" id="discountContent<?= $x ?>">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">
                                            Price of After Discount
                                        </label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rs. </div>
                                            </div>
                                            <input type="text" class="form-control" onkeyup="priceFormat2(event,'<?= $x ?>');" onkeydown="priceKeyFilter(event);" id="dprice<?= $x ?>" value="<?= number_format($priceResult['discountPrice']) ?>" placeholder="Enter Price of After Discount">
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $x++;
                    } while ($priceResult = $pricequery->fetch_assoc())
                    ?>

                    <tr>
                        <td class="text-center p-2">
                            <button class="btn btn-secondary w-100" onclick="addRow();">Add New Package Type</button>
                        </td>
                    </tr>
                <?php

                } else {
                ?>
                    <tr>
                        <td class="text-center p-2">
                            <button class="btn btn-secondary w-100" onclick="addRow();">Add New Package Type</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
<?php
            }
        }
    }
}
