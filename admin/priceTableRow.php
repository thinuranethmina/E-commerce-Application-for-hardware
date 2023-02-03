<?php
session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {
    if (isset($_POST["id"])) {
        if (isset($_POST["unit"])) {
            if ($_POST["unit"] != '0') {
                $_POST["id"]--;
?>
                <hr class="mb-4">
                <div class="row">
                    <div class="col-12 ps-4">
                        <h6>
                            <label for="show<?= $_POST['id'] ?>">
                                <input type="radio" class="form-check-input" name="show" id="show<?= $_POST['id'] ?>" <?php if ($_POST['id'] == '1') {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                Package <?= $_POST['id'] ?>
                            </label>
                        </h6>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-12 col-lg-3">
                        <label class="form-label">Package Scale</label>
                    </div>
                    <div class="col-12 col-lg-6 px-3 pe-lg-1">
                        <input type="text" class="form-control" id="scale<?= $_POST['id'] ?>" placeholder="Enter Scale">
                    </div>
                    <div class="col-12 col-lg-3 px-3 ps-lg-1">
                        <select id="unit<?= $_POST['id'] ?>" class="form-control">
                            <option value="0">Select Unit</option>
                            <?php
                            $resultset3 = Database::search("SELECT * FROM `scale` WHERE `id` !='0' AND `unit_id` = '" . $_POST["unit"] . "'  ORDER BY `name` ASC;");
                            while ($category = $resultset3->fetch_assoc()) {
                            ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
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
                            <input type="text" class="form-control" onkeyup="priceFormat1(event,'<?= $_POST['id'] ?>');" onkeydown="priceKeyFilter(event);" id="aprice<?= $_POST['id'] ?>" placeholder="Enter Marked Price">
                            <div class="input-group-prepend d-none" id="discountPercentage<?= $_POST['id'] ?>">
                                <div class="input-group-text" id="discount<?= $_POST['id'] ?>">--</div>
                            </div>
                        </div>
                        <label for="addDiscount<?= $_POST['id'] ?>">
                            <input type="checkbox" onclick="discountProcess('<?= $_POST['id'] ?>');" onkeydown="priceKeyFilter(event);" class="form-check-input" name="" id="addDiscount<?= $_POST['id'] ?>">
                            This package has discount.
                        </label>
                    </div>
                </div>

                <div class="row my-3 d-none" id="discountContent<?= $_POST['id'] ?>">
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
                            <input type="text" class="form-control" onkeyup="priceFormat2(event,'<?= $_POST['id'] ?>');" onkeydown="priceKeyFilter(event);" id="dprice<?= $_POST['id'] ?>" value="" placeholder="Enter Price of After Discount">
                        </div>
                    </div>
                </div>


<?php
            } else {
                echo "Please select mesuring type";
            }
        } else {
            echo "Please select mesuring type";
        }
    }
}
