<?php
require_once('header.php');
?>

<div class="pc-container" style="z-index: 0;">
    <div class="pcoded-content" style="z-index: 0;">
        <!-- [ breadcrumb ] start -->

        <div class="page-header-title pb-4" style="z-index: 0;">
            <h4 class="m-b-10" style="z-index: 0;">Image Gallery</h4>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-12 col-md-9 mx-auto card px-3 py-5">
                <button class="btn btn-primary mb-3" onclick="openModal();">Upload new image</button>
                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultset = Database::search("SELECT * FROM `gallery` WHERE `id`!='0' ORDER BY `path` ");
                        $rows = $resultset->num_rows;
                        if ($rows > 0) {

                            for ($x = 1; $x <= $rows; $x++) {
                                $row = $resultset->fetch_assoc();
                        ?>
                                <tr>
                                    <td><?= $x ?></td>
                                    <td class="text-center"><img src="../<?= $row['path'] ?>" style="height: 60px;"></td>
                                    <td class="text-center"><img onclick="deleteImg('<?= $row['id'] ?>');" style="cursor: pointer;" height="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAnklEQVR4nOWTMQ7CMAxF33EY4A6oE9yKkfPBwN7YrZRLFH2JSh5LQ0oplqxYtvJfYifwF+ZwcRiiG1znig0lztcB2zCv3R7fFMDgkeBo0IdcTtA43IoBCRrlethLWK5YuRek+AZ5FNQaY9U+MgOD3MIh1HexZesGWO0WpQWGfJdQPO34TFVb/0fzSoA0A9BOBnRw1oZ3xDs4TQb8lD0BbZKmNGfUJjMAAAAASUVORK5CYII="></td>
                                </tr>
                        <?php
                            }
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- [ Main Content ] end -->

        <!-- -----------------------modal---------------------- -->

        <div id="modal1" class="modal1" style="z-index: 0;">
            <!-- <div> -->
            <div class="col-12 col-md-6 offset-md-3 modal--content">
                <div class="row" id="modalContent">

                    <div class="col-12">
                        <div class="row d-3 p-2 px-3 p-lg-5 pt-lg-5">

                            <div class="col-12 mb-5" style="background-color: pink;">
                                <span class="close" onclick="closeModal();">&times;</span>
                                <h2 class="my-auto">Image</h2>
                            </div>


                            <div class="col-12 my-3 text-center">
                                <img id="img-preview" class="img-preview border border-2 border-warning" src="">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Choose Image File</label>
                                <div class="mb-3">
                                    <input type="file" id="image" accept="image/png, image/jpeg, image/jpg, image/webp" onclick="addImage();" class="form-control border-0" />
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-12 p-4" style="text-align: right;">
                        <button type="button" onclick="closeModal();" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="btn-submit" onclick="uploadImage();">Submit</button>
                    </div>

                </div>
            </div>
            <!-- </div> -->
        </div>

    </div>
</div>

<script>
    // MODAL

    function openModal() {
        document.getElementById('modal1').style.display = "block";
    }

    function closeModal() {
        document.getElementById('modal1').style.display = "none";
    }


    function deleteImg(id) {

        Swal.fire({
            icon: 'info',
            title: 'Are you sure?',
            showDenyButton: true,
            showCancelButton: false,
            confirmButtonText: 'Yes',
            denyButtonText: `No`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var form = new FormData();
                form.append("id", id);

                var r = new XMLHttpRequest();

                r.onreadystatechange = function() {

                    if (r.readyState == 4) {
                        var text = r.responseText;

                        if (text == "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Image has been deleted',
                                text: text
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location = window.location.href;
                                } else {
                                    window.location = window.location.href;
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: text
                            }).then((result) => {});
                        }

                    }
                }

                r.open("POST", "deleteImg.php", true);
                r.send(form);
            }
        })


    }


    function addImage() {
        document.getElementById('btn-submit').disabled = true;

        var newImg = document.getElementById("image"); //file chooser
        var imgWindow = document.getElementById("img-preview"); //image tag

        newImg.onchange = function() {
            var file0 = this.files[0];
            var r = new XMLHttpRequest();

            var f = new FormData();
            f.append("image", newImg.files[0]);

            r.onreadystatechange = function() {
                if (r.readyState == 4) {
                    document.getElementById('btn-submit').disabled = false;

                    var text = r.responseText;

                    if (text == 'success') {

                        var url0 = window.URL.createObjectURL(file0);
                        imgWindow.src = url0;


                    } else {

                        imgWindow.src = "";

                        document.getElementById("image").value = "";
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


    function uploadImage() {

        var image = document.getElementById('image');

        var form = new FormData();
        form.append("image", image.files[0]);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {

            if (r.readyState == 4) {

                var text = r.responseText;

                if (text == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully',
                        text: text
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = window.location.href;
                        } else {
                            window.location = window.location.href;
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: text
                    }).then((result) => {});
                }

            }
        }

        r.open("POST", "imageUploadProcess.php", true);
        r.send(form);

    }
</script>
<?php require_once('footer.php'); ?>