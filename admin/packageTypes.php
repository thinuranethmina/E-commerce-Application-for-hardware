<?php
session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {
    if (isset($_POST["id"])) {
        if ($_POST["id"] == '1') {
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
        } else if ($_POST["id"] == 'm') {
        ?>
            <tr>
                <td class="p-2">
                    <select id="mesureType" class="form-control">
                        <option value="0">Select Mesuring Type</option>
                        <?php
                        $resultset = Database::search("SELECT * FROM `unit` WHERE `id` != '0' ORDER BY `name` ASC;");
                        while ($data = $resultset->fetch_assoc()) {
                        ?>
                            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="text-center p-2">
                    <button class="btn btn-secondary w-100" onclick="addRow();">Add New Package Type</button>
                </td>
            </tr>
<?php
        }
    }
}
