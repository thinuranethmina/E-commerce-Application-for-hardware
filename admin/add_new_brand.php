<?php
require_once('header.php');
?>

<div class="pc-container" style="z-index: 0;">
    <div class="pcoded-content" style="z-index: 0;">
        <!-- [ breadcrumb ] start -->

        <div class="page-header-title pb-4" style="z-index: 0;">
            <h4 class="m-b-10" style="z-index: 0;">Add New Brand</h4>
        </div>

        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row px-4">
            <div class="col-12 card">
                <div class="row px-4">

                    <div class="col-12">
                        <label class="form-label">Name</label>
                        <div class="input-group mb-3">
                            <input type="text" id="brand" class="form-control" />
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary" onclick="addBrand();">Register</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function addBrand() {
        var brand = document.getElementById("brand").value;

        var form = new FormData();
        form.append("brand", brand);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var text = r.responseText;

                if (text == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: 'New Brand Added to Database',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        window.location = 'all_brands.php';
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

        r.open("POST", "addBrandProcess.php", true);
        r.send(form);
    }
</script>

<?php require_once('footer.php'); ?>