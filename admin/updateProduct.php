<?php
require_once('header.php');
?>
<?php

if (isset($_GET['id'])) {

    $data_resultset = Database::search("SELECT `product`.`id`,`ref`,`title`,`brand_id`,`sub_category_id`,`category_id`,`description`,`more_info`,`qty`,`image1`,`image2`,`image3`,`add_date`,`product`.`status_id` FROM `product` INNER JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id` INNER JOIN `category` ON `category`.`id` = `sub_category`.`category_id`  WHERE `product`.`ref` = '" . $_GET['id'] . "' ");

    if ($data_resultset->num_rows == '1') {
        $data = $data_resultset->fetch_assoc();

?>

        <style>
            .dataTables_paginate {
                display: none;
            }

            .dataTables_info {
                display: none;
            }

            .dataTables_length {
                display: none;
            }

            .dataTables_filter {
                display: none;
            }

            thead {
                display: none;
            }
        </style>

        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <div class="pc-container" style="z-index: 0;">
            <div class="pcoded-content" style="z-index: 0;">
                <!-- [ breadcrumb ] start -->

                <div class="page-header-title pb-4" style="z-index: 0;">
                    <h4 class="m-b-10" style="z-index: 0;">Update Your Product</h4>
                </div>
                <!-- [ breadcrumb ] end -->
                <!-- [ Main Content ] start -->
                <div class="row">




                    <!-- support-section start -->
                    <div class="col-12 col-lg-10 offset-lg-1 border border-black-50 border-4 p-5 rounded rounded-4">
                        <div class="row">
                            <div class="col-12">

                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">Category</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <select id="category" onchange="loadSubCategory();" class="form-control">
                                            <?php
                                            $resultset = Database::search("SELECT * FROM `category` ORDER BY name ASC;");
                                            while ($category = $resultset->fetch_assoc()) {
                                            ?>
                                                <option value="<?= $category['id'] ?>" <?php
                                                                                        if ($data['category_id'] == $category['id']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?= $category['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">Sub Category</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <select id="subCategory" class="form-control">
                                            <?php
                                            $resultset = Database::search("SELECT * FROM `sub_category` WHERE `category_id` = '" . $data['category_id'] . "' ORDER BY name ASC;");
                                            while ($category = $resultset->fetch_assoc()) {
                                            ?>
                                                <option value="<?= $category['id'] ?>" <?php
                                                                                        if ($data['sub_category_id'] == $category['id']) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?= $category['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">Title</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <input type="text" class="form-control" id="title" value="<?= $data['title'] ?>" placeholder="Enter Title">
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">Brand</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <select id="brand" class="form-control">
                                            <option value="0">Select Brand</option>
                                            <?php
                                            $resultset = Database::search("SELECT * FROM `brand` ORDER BY `name` ASC;");
                                            while ($brand = $resultset->fetch_assoc()) {
                                            ?>
                                                <option value="<?= $brand['id'] ?>" <?php
                                                                                    if ($data['brand_id'] == $brand['id']) {
                                                                                        echo "selected";
                                                                                    }
                                                                                    ?>><?= $brand['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">Stock</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <label for="stockAVB">
                                            <input type="radio" class="form-check-input" name="stock" id="stockAVB" <?php if ($data['qty'] == '1') {
                                                                                                                        echo "checked";
                                                                                                                    } ?>> Available
                                        </label>
                                        <label class="ms-4" for="stockNAVB">
                                            <input type="radio" class="form-check-input" name="stock" id="stockNAVB" <?php if ($data['qty'] == '0') {
                                                                                                                            echo "checked";
                                                                                                                        } ?>> Not Available
                                        </label>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">Short Description</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <textarea class="form-control" id="description" cols="30" rows="6"><?= $data['description'] ?></textarea>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="form-label">More Details</label>
                                    </div>
                                    <div class="col-12 col-lg-9 pb-5 mb-5 mb-lg-0">
                                        <div class="p-0 m-0" id="info">
                                            <?= $data['more_info'] ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="control-label" for="ad_cover_image">Cover Image</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <img class="d-none" id="remove0" width="30" height="30" src="https://img.icons8.com/color/48/cancel--v1.png" alt="X" />

                                        <input type="hidden" id="removeStauts0" value="0" />
                                        <label for="imgchooser0" style="cursor: pointer;">
                                            <img class="p-2" id="image0" <?php
                                                                            if ($data['image1'] == '') {
                                                                                echo 'src="assets/images/addImage.png"';
                                                                            } else {
                                                                                echo 'src="../' . $data['image1'] . '"';
                                                                            }
                                                                            ?> style="min-width: 100px; max-width: 180px; height: auto; border-radius: 5px;" onmouseover="this.style.backgroundColor='#FFE9D7';" onmouseout="this.style.backgroundColor='white';" />
                                        </label>
                                        <input type="file" accept="image/png, image/jpeg" onclick="addImage('0');" class="form-control post-ad-form d-none" id="imgchooser0" name="ad_cover_image">
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-12 col-lg-3">
                                        <label class="control-label" for="ad_images">Other Images</label>
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <div class="form-group">
                                            <label for="imgchooser1" style="cursor: pointer;">
                                                <input type="hidden" id="removeStauts1" value="0" />
                                                <img onclick="removeImage('1');" id="remove1" style="position: absolute; z-index: 1; cursor: pointer;  <?php
                                                                                                                                                        if ($data['image2'] == '') {
                                                                                                                                                            echo "display:none";
                                                                                                                                                        } ?> " width="30" height="30" src="https://img.icons8.com/color/48/cancel--v1.png" alt="X" />
                                                <img id="image1" class="mx-1 p-2" <?php
                                                                                    if ($data['image2'] == '') {
                                                                                        echo 'src="assets/images/addImage.png"';
                                                                                    } else {
                                                                                        echo 'src="../' . $data['image2'] . '"';
                                                                                    }
                                                                                    ?> onmouseover="this.style.backgroundColor='rgba(0, 0, 0, 0.21)';" onmouseout="this.style.backgroundColor='white';" style="min-width: 70px; max-width: 180px; height: auto; border-radius: 5px;" />
                                            </label>
                                            <input type="file" onclick="addImage('1');" accept="image/png, image/jpeg" class="form-control post-ad-form d-none" id="imgchooser1" name="ad_cover_image">

                                            <label for="imgchooser2" style="cursor: pointer;">
                                                <input type="hidden" id="removeStauts2" value="0" />
                                                <img onclick="removeImage('2');" id="remove2" style="position: absolute; z-index: 1; cursor: pointer;  <?php
                                                                                                                                                        if ($data['image3'] == '') {
                                                                                                                                                            echo "display:none";
                                                                                                                                                        } ?> " width="30" height="30" src="https://img.icons8.com/color/48/cancel--v1.png" alt="X" />
                                                <img id="image2" class="mx-1 p-2" <?php
                                                                                    if ($data['image3'] == '') {
                                                                                        echo 'src="assets/images/addImage.png"';
                                                                                    } else {
                                                                                        echo 'src="../' . $data['image3'] . '"';
                                                                                    }
                                                                                    ?> onmouseover="this.style.backgroundColor='rgba(0, 0, 0, 0.21)';" onmouseout="this.style.backgroundColor='white';" style="min-width: 70px; max-width: 180px; height: auto; border-radius: 5px;" />
                                            </label>
                                            <input type="file" onclick="addImage('2');" accept="image/png, image/jpeg" class="form-control post-ad-form d-none" id="imgchooser2" name="ad_cover_image">

                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3 pt-4 gy-3">
                                    <?php
                                    if ($data['status_id'] == '1') {
                                    ?>
                                        <div class="col-12 col-lg-6">
                                            <button onclick="submit('<?= $data['ref'] ?>','2');" class="btn btn-warning w-100" style="background-color: darkorange; color: white;">Reject</button>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <button onclick="submit('<?= $data['ref'] ?>','3');" class="btn btn-danger w-100">Delete</button>
                                        </div>
                                        <div class="col-12">
                                            <button onclick="submit('<?= $data['ref'] ?>','1');" class="btn btn-primary w-100">Save Changes</button>
                                        </div>
                                    <?php
                                    } else if ($data['status_id'] == '0') {
                                    ?>
                                        <div class="col-12 col-lg-6">
                                            <button onclick="submit('<?= $data['ref'] ?>','3');" class="btn btn-danger w-100">Delete</button>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <button onclick="submit('<?= $data['ref'] ?>','1');" class="btn btn-primary w-100">Make Active & Save</button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- customer-section end -->


                    <?php

                    $pricequery = Database::search("SELECT `scale_id`,`unit_id`,`actualPrice`,`discountPrice`,`isShow`,`size`,`unit`.`name` AS `unit`, `scale`.`name` AS `scale`, `price`.`id` AS `price_id` FROM `price`INNER JOIN `scale` ON `scale`.`id` = `price`.`scale_id` INNER JOIN `unit` ON `unit`.`id` = `scale`.`unit_id` WHERE `product_id` = '" . $data['id'] . "' ");
                    $priceResult = $pricequery->fetch_assoc();

                    if ($priceResult['scale_id'] == '0') {
                        $isMPrice = false;
                    } else {
                        $isMPrice = true;
                    }

                    ?>


                    <div class="col-12 col-lg-10 offset-lg-1 border border-black-50 border-4 p-5 pb-0 rounded rounded-4 my-4">
                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label>This product has</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <label for="1price">
                                    <input type="radio" class="form-check-input" name="1price" id="1price" onchange="changePackage('1','<?= $data['id'] ?>');" <?php if (!$isMPrice) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>> One package type
                                </label>
                                <label class="ms-4" for="mprice">
                                    <input type="radio" class="form-check-input" name="1price" id="mprice" onchange="changePackage('m','<?= $data['id'] ?>');" <?php if ($isMPrice) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>> Multiple package types
                                </label>
                            </div>
                        </div>

                        <div class="row ">

                            <div class="col-12 p-2 <?php if (!$isMPrice) {
                                                        echo "d-none";
                                                    } ?>" id="mesureTypeContent">
                                <select id="mesureType" onchange="resetMPrice();" class="form-control">
                                    <option value="0">Select Mesuring Type</option>
                                    <?php
                                    $resultset = Database::search("SELECT * FROM `unit` WHERE `id` != '0' ORDER BY `name` ASC;");
                                    while ($data2 = $resultset->fetch_assoc()) {
                                    ?>
                                        <option value="<?= $data2['id'] ?>" <?php if ($data2['id'] == $priceResult['unit_id']) {
                                                                                echo "selected";
                                                                            } ?>><?= $data2['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <?php

                            if ($isMPrice) {
                            ?>

                                <div class="col-12 py-1" id="priceContent">
                                    <table id="priceTable" style="width: 100%; overflow: hidden;">
                                        <thead>
                                            <tr>
                                                <td>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">

                                            <?php
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

                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            } else {
                            ?>

                                <div class="col-12 py-1" id="priceContent">
                                    <table id="priceTable" style="width: 100%; overflow: hidden;">
                                        <thead>
                                            <tr>
                                                <td>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody id="tableBody">

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

                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            }

                            ?>
                            <div class="col-12 mb-3">
                                <hr>
                                <button class="btn btn-primary w-100 mt-4" id="update-btn" onclick="priceUpdate('<?= $data['id'] ?>');">Update Changes</button>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.0.0/animate.min.css">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <script>
            function priceUpdate(id) {
                document.getElementById('update-btn').disabled = true;

                var package = document.getElementById('mprice').checked;

                var form = new FormData();
                form.append("pid", id);
                form.append("package", package);

                if (package) {
                    var table = document.getElementById('priceTable');
                    var mesureType = document.getElementById('mesureType').value;

                    var rows = table.tBodies[0].rows.length;
                    rows = rows - 1;

                    form.append("rows", rows);
                    form.append("mesureType", mesureType);

                    for (var x = 1; x <= rows; x++) {
                        var scale = document.getElementById('scale' + x).value;
                        var unit = document.getElementById('unit' + x).value;
                        var aprice = document.getElementById('aprice' + x).value.toString().replaceAll(',', '');
                        var dprice = document.getElementById('dprice' + x).value.toString().replaceAll(',', '');
                        var discount = document.getElementById('addDiscount' + x).checked;
                        var show = document.getElementById('show' + x).checked;
                        form.append("aprice" + x, aprice);
                        form.append("dprice" + x, dprice);
                        form.append("discount" + x, discount);
                        form.append("unit" + x, unit);
                        form.append("scale" + x, scale);
                        form.append("show" + x, show);
                    }

                } else {
                    var aprice = document.getElementById('aprice1').value.toString().replaceAll(',', '');
                    var dprice = document.getElementById('dprice1').value.toString().replaceAll(',', '');
                    var discount = document.getElementById('addDiscount1').checked;
                    form.append("aprice1", aprice);
                    form.append("dprice1", dprice);
                    form.append("discount1", discount);
                }

                var r = new XMLHttpRequest();

                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        document.getElementById('update-btn').disabled = false;
                        var text = r.responseText;

                        if (text == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Product Updated.'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'all_products.php';
                                } else {
                                    window.location = 'all_products.php';
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: text
                            })
                        }
                    }
                }

                r.open("POST", "updatePriceProcess.php", true);
                r.send(form);


            }

            function discountProcess(id) {
                document.getElementById('discountContent' + id).classList.toggle("d-none");
                document.getElementById('discountPercentage' + id).classList.toggle("d-none");
            }

            function priceKeyFilter(e) {

                var charCode = (e.which) ? e.which : e.keyCode;

                if ((charCode > 47 && charCode < 58) || (charCode > 95 && charCode < 106) || charCode == 8 || charCode == 188 || charCode == 37 || charCode == 39 || charCode == 190 || charCode == 110) {
                    return true;
                }
                e.preventDefault();
                return false;
            }


            function priceFormat1(event, id) {

                let price = document.getElementById("aprice" + id).value;

                let x = price.toString().replaceAll(',', '');

                let f_price = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                document.getElementById("aprice" + id).value = f_price;

                if (document.getElementById('addDiscount' + id).checked) {

                    let price = document.getElementById("dprice" + id).value;


                    let x = price.toString().replaceAll(',', '');

                    let y = document.getElementById("aprice" + id).value.toString().replaceAll(',', '');

                    if (y > 0 && x != '' && x > 0) {
                        let precentage = Math.floor(100 - ((x / y) * (100)));

                        precentage = precentage * -1

                        document.getElementById("discount" + id).innerHTML = precentage + "%";
                    } else {
                        document.getElementById("discount" + id).innerHTML = "--";
                    }
                }

            }

            function priceFormat2(event, id) {

                let price = document.getElementById("dprice" + id).value;


                let x = price.toString().replaceAll(',', '');

                let y = document.getElementById("aprice" + id).value.toString().replaceAll(',', '');

                if (y > 0 && x != '' && x > 0) {
                    let precentage = Math.floor(100 - ((x / y) * (100)));

                    precentage = precentage * -1

                    document.getElementById("discount" + id).innerHTML = precentage + "%";
                } else {
                    document.getElementById("discount" + id).innerHTML = "--";
                }


                let f_price = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

                document.getElementById("dprice" + id).value = f_price;

            }

            var quill = new Quill('#info', {
                placeholder: 'Type Here...',
                theme: 'snow'
            });

            function addImage(id) {
                var newImg = document.getElementById("imgchooser" + id); //file chooser
                var imgWindow = document.getElementById("image" + id); //image tag

                newImg.onchange = function() {
                    var file0 = this.files[0];
                    var r = new XMLHttpRequest();

                    var f = new FormData();
                    f.append("image", newImg.files[0]);

                    r.onreadystatechange = function() {
                        if (r.readyState == 4) {

                            var text = r.responseText;

                            if (text == 'success') {

                                var url0 = window.URL.createObjectURL(file0);

                                document.getElementById("removeStauts" + id).value = '0';

                                document.getElementById("remove" + id).style.display = 'inline-block';

                                imgWindow.src = url0;


                            } else {
                                document.getElementById("imgchooser" + id).value = "";
                                Swal.fire({
                                    title: text,
                                    icon: 'error',
                                    showClass: {
                                        popup: 'animate__animated animate__fadeInDown'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__fadeOutUp'
                                    }
                                })
                            }

                        }
                    };
                    r.open("POST", "image_validate_process.php", true);
                    r.send(f);

                }
            }

            function removeImage(id) {
                var imgWindow = document.getElementById("image" + id); //image tag

                document.getElementById("removeStauts" + id).value = 'remove';

                imgWindow.src = "assets/images/addImage.png";
                document.getElementById("imgchooser" + id).value = '';

                document.getElementById("remove" + id).style.display = 'none';
            }

            function loadSubCategory() {
                var id = document.getElementById('category').value;

                var form = new FormData();
                form.append("id", id);

                var r = new XMLHttpRequest();

                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var text = r.responseText;
                        document.getElementById('subCategory').innerHTML = text;
                    }
                }

                r.open("POST", "subcategoryLoad.php", true);
                r.send(form);
            }

            function submit(ref, id) {

                if (id == 1) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to save changes?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#fafafa',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            update(ref, id);
                        } else {
                            Swal.fire('Cancelled!', '', 'error');
                        }
                    })
                } else if (id == 2) {

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to reject this product?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            update(ref, id);
                        } else {
                            Swal.fire('Cancelled!', '', 'error');
                        }
                    })
                } else if (id == 3) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Do you want to delete this product from database?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            update(ref, id);
                        } else {
                            Swal.fire('Cancelled!', '', 'error');
                        }
                    })
                }

            }

            function update(ref, id) {

                var category = document.getElementById('category').value;
                var subCategory = document.getElementById('subCategory').value;
                var title = document.getElementById('title').value;
                var brand = document.getElementById('brand').value;
                var stock = document.getElementById('stockAVB').checked;
                var description = document.getElementById('description').value;
                var info = quill.root.innerHTML;
                var image1 = document.getElementById("imgchooser0");
                var image2 = document.getElementById("imgchooser1");
                var image3 = document.getElementById("imgchooser2");
                var removeStauts0 = document.getElementById("removeStauts0").value;
                var removeStauts1 = document.getElementById("removeStauts1").value;
                var removeStauts2 = document.getElementById("removeStauts2").value;

                var form = new FormData();
                form.append("ref", ref);
                form.append("id", id);
                form.append("category", category);
                form.append("sub_category", subCategory);
                form.append("title", title);
                form.append("brand", brand);
                form.append("stock", stock);
                form.append("description", description);
                form.append("info", info);
                form.append("stock", stock);
                form.append("image1", image1.files[0]);
                form.append("image2", image2.files[0]);
                form.append("image3", image3.files[0]);
                form.append("removeStatus1", removeStauts0);
                form.append("removeStatus2", removeStauts1);
                form.append("removeStatus3", removeStauts2);

                var r = new XMLHttpRequest();

                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var text = r.responseText;

                        if (text == 'success1') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Now you can see updated product'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'all_products.php';
                                } else {
                                    window.location = 'all_products.php';
                                }
                            })
                        } else if (text == 'success2') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Product has been rejected successfully'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'all_products.php';
                                } else {
                                    window.location = 'all_products.php';
                                }
                            })
                        } else if (text == 'success3') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Product has been completely deleted from database.'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = 'all_products.php';
                                } else {
                                    window.location = 'all_products.php';
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: text
                            })
                        }
                    }
                }

                r.open("POST", "updateProcess.php", true);
                r.send(form);
            }


            function changePackage(id, pid) {

                var form = new FormData();
                form.append("id", id);
                form.append("pid", pid);

                var r = new XMLHttpRequest();

                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var text = r.responseText;

                        document.getElementById('tableBody').innerHTML = text;

                        document.getElementById('mesureTypeContent').classList.toggle('d-none');


                    }
                }

                r.open("POST", "packageTypes2.php", true);
                r.send(form);
            }

            function addRow() {
                var unit = document.getElementById('mesureType');
                var table = document.getElementById('priceTable');
                var id = table.tBodies[0].rows.length;

                var form = new FormData();
                form.append("id", id);
                form.append("unit", unit.value);

                var r = new XMLHttpRequest();

                r.onreadystatechange = function() {
                    if (r.readyState == 4) {
                        var text = r.responseText;

                        if (text == 'Please select mesuring type') {
                            Swal.fire(
                                'Not Selected',
                                text,
                                'question'
                            )
                        } else {
                            unit.disabled = 'true';
                            var row = table.insertRow(id);
                            var cell = row.insertCell(0);
                            cell.innerHTML = text;
                        }

                    }
                }

                r.open("POST", "priceTableRow2.php", true);
                r.send(form);
            }

            function resetMPrice() {
                var unit = document.getElementById('mesureType');
                var table = document.getElementById('priceTable');
                var id = table.tBodies[0].rows.length - 1;

                for (var x = 0; x < id; x++) {
                    table.deleteRow(1);
                }

            }
        </script>

    <?php

    } else {
    ?>
        <script>
            window.location = "index.php";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location = "index.php";
    </script>
<?php
}

?>
<?php require_once('footer.php'); ?>