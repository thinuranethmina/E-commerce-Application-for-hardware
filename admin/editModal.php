<?php

session_set_cookie_params(60 * 60 * 24);
session_start();
require "connection.php";


if (isset($_SESSION['admin_email'])) {
    $employeeId = $_GET["e"];

    $statusrs = Database::search("SELECT * FROM `brand` WHERE `id`='" . $employeeId . "';");
    $sn = $statusrs->num_rows;

    if ($sn == 1) {
        $user = $statusrs->fetch_assoc();
?>
        <div class="col-12">
            <div class="row d-3 p-2 px-3 p-lg-5 pt-lg-5">

                <div class="col-12 mb-5" style="background-color: pink;">
                    <span class="close" onclick="document.getElementById('modal').style.display='none';">&times;</span>
                    <h2 class="my-auto">Edit Brand</h2>
                </div>

                <!-- Modal -->

                <div class="col-12">
                    <label class="form-label">Name</label>
                    <div class="input-group mb-3">
                        <input type="text" id="name" value="<?= $user['name'] ?>" class="form-control" />
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 p-4" style="text-align: right;">
            <button type="button" onclick="document.getElementById('modal').style.display='none';" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="saveChange('<?= $user['id'] ?>');">Save</button>
        </div>
<?php
    }
} else {
    echo "Please Sign In or Register.";
}
