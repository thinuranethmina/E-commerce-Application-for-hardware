<?php
require_once('header.php');
?>

<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

<div class="pc-container" style="z-index: 0;">
    <div class="pcoded-content" style="z-index: 0;">
        <!-- [ breadcrumb ] start -->

        <div class="page-header-title pb-4" style="z-index: 0;">
            <h4 class="m-b-10" style="z-index: 0;">Change Username & Password</h4>
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
                                <label class="form-label">Old Username</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <input type="text" class="form-control" id="ousername" placeholder="">
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label class="form-label">Old Password</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <input type="text" class="form-control" id="opassword" placeholder="">
                            </div>
                        </div>

                        <hr class="my-5" />

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label class="form-label">New Username</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <input type="text" class="form-control" id="nusername" placeholder="">
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label class="form-label">New Password</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <input type="text" class="form-control" id="npassword" placeholder="">
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-12 col-lg-3">
                                <label class="form-label">Confirm New Password</label>
                            </div>
                            <div class="col-12 col-lg-9">
                                <input type="text" class="form-control" id="cpassword" placeholder="">
                            </div>
                        </div>


                        <div class="row my-3">
                            <div class="col-12 pt-4">
                                <button onclick="submit();" id="submit-btn" class="btn btn-primary w-100">Save</button>
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
    function submit() {
        var nusername = document.getElementById('nusername').value;
        var ousername = document.getElementById('ousername').value;
        var npassword = document.getElementById('npassword').value;
        var opassword = document.getElementById('opassword').value;
        var cpassword = document.getElementById('cpassword').value;

        var form = new FormData();
        form.append("nusername", nusername);
        form.append("ousername", ousername);
        form.append("npassword", npassword);
        form.append("opassword", opassword);
        form.append("cpassword", cpassword);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {

            if (r.readyState == 4) {

                var text = r.responseText;

                if (text == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Admin profile updated'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'signout.php';
                        } else {
                            window.location = 'signout.php';
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: text
                    });
                }

            } else {}
        }

        r.open("POST", "changeDetails.php", true);
        r.send(form);


    }
</script>

<?php require_once('footer.php'); ?>