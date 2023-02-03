<?php
require_once('header.php');
?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

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

<div class="pc-container" style="z-index: 0;">
    <div class="pcoded-content" style="z-index: 0;">
        <!-- [ breadcrumb ] start -->

        <div class="page-header-title pb-4" style="z-index: 0;">
            <h4 class="m-b-10" style="z-index: 0;">Add New Product</h4>
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
                                    <option value="0">Select Category</option>
                                    <?php
                                    $resultset3 = Database::search("SELECT * FROM `category` WHERE `status_id` != '0' ORDER BY name ASC;");
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
                                <label class="form-label">Sub Category</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <select id="subCategory" class="form-control">
                                    <option value="0">Select Sub Category</option>
                                </select>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label class="form-label">Title</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter Title">
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
                                    $resultset3 = Database::search("SELECT * FROM `brand` ORDER BY `name` ASC;");
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
                                <label class="form-label">Stock</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <label for="stockAVB">
                                    <input type="radio" class="form-check-input" name="stock" id="stockAVB" checked> Available
                                </label>
                                <label class="ms-4" for="stockNAVB">
                                    <input type="radio" class="form-check-input" name="stock" id="stockNAVB"> Not Available
                                </label>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label>This product has</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <label for="1price">
                                    <input type="radio" class="form-check-input" name="1price" id="1price" onchange="changePackage('1');" checked> One package type
                                </label>
                                <label class="ms-4" for="mprice">
                                    <input type="radio" class="form-check-input" name="1price" id="mprice" onchange="changePackage('m');"> Multiple package types
                                </label>
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-12" id="priceContent">
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
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label class="form-label">Short Description</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <textarea class="form-control" id="discription" cols="30" rows="6"></textarea>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label class="form-label">More Details</label>
                            </div>
                            <div class="col-12 col-lg-9 pb-5 mb-5 mb-lg-0">
                                <div class="p-0 m-0" id="info">
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label class="control-label" for="ad_cover_image">Cover Image</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <img class="d-none" id="remove0" width="30" height="30" src="https://img.icons8.com/color/48/cancel--v1.png" alt="X" />

                                <label for="imgchooser0" style="cursor: pointer;">
                                    <img class="p-2" id="image0" src="assets/images/addImage.png" style="min-width: 100px; max-width: 180px; height: auto; border-radius: 5px;" onmouseover="this.style.backgroundColor='#FFE9D7';" onmouseout="this.style.backgroundColor='white';" />
                                </label>
                                <input type="file" accept="image/png, image/jpeg" onclick="addImage('0');" class="form-control post-ad-form d-none" id="imgchooser0" name="ad_cover_image">
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label class="control-label" for="ad_images">Other Images (Optional)</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <div class="form-group">
                                    <label for="imgchooser1" style="cursor: pointer;">
                                        <img onclick="removeImage('1');" id="remove1" style="position: absolute; z-index: 1; cursor: pointer; display:none " width="30" height="30" src="https://img.icons8.com/color/48/cancel--v1.png" alt="X" />
                                        <img id="image1" class="mx-1 p-2" src="assets/images/addImage.png" onmouseover="this.style.backgroundColor='rgba(0, 0, 0, 0.21)';" onmouseout="this.style.backgroundColor='white';" style="min-width: 70px; max-width: 180px; height: auto; border-radius: 5px;" />
                                    </label>
                                    <input type="file" onclick="addImage('1');" accept="image/png, image/jpeg" class="form-control post-ad-form d-none" id="imgchooser1" name="ad_cover_image">

                                    <label for="imgchooser2" style="cursor: pointer;">
                                        <img onclick="removeImage('2');" id="remove2" style="position: absolute; z-index: 1; cursor: pointer; display:none " width="30" height="30" src="https://img.icons8.com/color/48/cancel--v1.png" alt="X" />
                                        <img id="image2" class="mx-1 p-2" src="assets/images/addImage.png" onmouseover="this.style.backgroundColor='rgba(0, 0, 0, 0.21)';" onmouseout="this.style.backgroundColor='white';" style="min-width: 70px; max-width: 180px; height: auto; border-radius: 5px;" />
                                    </label>
                                    <input type="file" onclick="addImage('2');" accept="image/png, image/jpeg" class="form-control post-ad-form d-none" id="imgchooser2" name="ad_cover_image">

                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 pt-4">
                                <button onclick="submit();" id="submit-btn" class="btn btn-primary w-100">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- customer-section end -->




        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.0.0/animate.min.css">
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
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

    function submit() {

        document.getElementById('submit-btn').disabled = true;

        var category = document.getElementById('category').value;
        var subCategory = document.getElementById('subCategory').value;
        var title = document.getElementById('title').value;
        var brand = document.getElementById('brand').value;
        var stock = document.getElementById('stockAVB').checked;
        var description = document.getElementById('discription').value;
        var info = quill.root.innerHTML;
        var image1 = document.getElementById("imgchooser0");
        var image2 = document.getElementById("imgchooser1");
        var image3 = document.getElementById("imgchooser2");

        var package = document.getElementById('mprice').checked;



        var form = new FormData();

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
        form.append("package", package);

        if (package) {
            var table = document.getElementById('priceTable');
            var mesureType = document.getElementById('mesureType').value;

            var rows = table.tBodies[0].rows.length;
            rows = rows - 2;

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
                document.getElementById('submit-btn').disabled = false;
                var text = r.responseText;

                if (text == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'New product added to database.'
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

        r.open("POST", "addProductProcess.php", true);
        r.send(form);
    }

    function changePackage(id) {

        var form = new FormData();
        form.append("id", id);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;

                document.getElementById('tableBody').innerHTML = text;

                document.getElementById('priceContent').classList.toggle('border');
                document.getElementById('priceContent').classList.toggle('rounded');
                document.getElementById('priceContent').classList.toggle('rounded-3');
                document.getElementById('priceContent').classList.toggle('py-3');


            }
        }

        r.open("POST", "packageTypes.php", true);
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

        r.open("POST", "priceTableRow.php", true);
        r.send(form);
    }
</script>

<?php require_once('footer.php'); ?>