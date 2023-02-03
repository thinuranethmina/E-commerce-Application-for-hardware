<?php
require_once('header.php');
?>

<div class="pc-container" style="z-index: 0;">
    <div class="pcoded-content" style="z-index: 0;">
        <!-- [ breadcrumb ] start -->

        <div class="page-header-title pb-4" style="z-index: 0;">
            <h4 class="m-b-10" style="z-index: 0;">Add New Sub Category</h4>
        </div>

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row px-4">
            <div class="col-12 card">
                <div class="row px-4">
                    <div class="col-12">
                        <label class="form-label">Category</label>
                        <div class="input-group mb-3">

                            <select id="category" class="form-control my-2">
                                <option value="0">Select Category</option>
                                <?php
                                $resultset3 = Database::search("SELECT * FROM `category` WHERE `status_id` != '0' ORDER BY name ASC;");
                                while ($category = $resultset3->fetch_assoc()) {
                                ?>
                                    <option value="<?= $category['id'] ?>" <?php if (isset($_GET['category'])) {
                                                                                if ($_GET['category'] == $category['id']) {
                                                                                    echo "selected";
                                                                                }
                                                                            } ?>><?= $category['name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Name</label>
                        <div class="input-group mb-3">
                            <input type="text" id="name" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" onclick="addSubCategory();">Register</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('select').select2();
</script>
<script>
    function addSubCategory() {
        var category = document.getElementById("category").value;
        var name = document.getElementById("name").value;

        var form = new FormData();
        form.append("name", name);
        form.append("category", category);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;

                if (text == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: 'New Category Added to Database',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        window.location = 'all_categories.php';
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: text,
                    })
                }
            }
        }

        r.open("POST", "addSubCategoryProcess.php", true);
        r.send(form);
    }
</script>

<?php require_once('footer.php'); ?>