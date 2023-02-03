<?php
require_once('header.php');
?>

<div class="pc-container" style="z-index: 0;">
    <div class="pcoded-content" style="z-index: 0;">
        <!-- [ breadcrumb ] start -->

        <div class="page-header-title pb-4" style="z-index: 0;">
            <h4 class="m-b-10" style="z-index: 0;">Dashboard</h4>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row gx-4">

            <div class="col-12 col-md-4 p-4">
                <div class="rounded rounded-4 p-4 animate__animated animate__backInLeft" style="height: 140px;  background: linear-gradient(to right, #a8ff78, #78ffd6);">
                    <h4>Active Products</h4>
                    <h6 class="text-end mt-4 pt-2 me-2 fs-4"><?= Database::search("SELECT * FROM `product` WHERE `id`!='0' AND `status_id` = '1' ")->num_rows ?></h6>
                </div>
            </div>
            <div class="col-12 col-md-4 p-4">
                <div class="rounded rounded-4 p-4 animate__animated animate__backInLeft" style="height: 140px;    background: linear-gradient(to right, #a8ff78, #78ffd6);">
                    <h4>Active Brands</h4>
                    <h6 class="text-end mt-4 pt-2 me-2 fs-4"><?= Database::search("SELECT * FROM `brand` WHERE `id`!='0' AND `status_id` = '1' ")->num_rows ?></h6>
                </div>
            </div>
            <div class="col-12 col-md-4 p-4">
                <div class="rounded rounded-4 p-4 animate__animated animate__backInLeft" style="height: 140px;  background: linear-gradient(to right, #a8ff78, #78ffd6);">
                    <h4>Active Categories</h4>
                    <h6 class="text-end mt-4 pt-2 me-2 fs-4"><?= Database::search("SELECT * FROM `category` WHERE `id`!='0' AND `status_id` = '1' ")->num_rows ?></h6>
                </div>
            </div>
            <div class="col-12 col-md-4 p-4">
                <div class="rounded rounded-4 p-4 animate__animated animate__backInLeft" style="height: 140px;  background: linear-gradient(to right, #a8ff78, #78ffd6);">
                    <h4>Active Sub Categories</h4>
                    <h6 class="text-end mt-4 pt-2 me-2 fs-4"><?= Database::search("SELECT * FROM `sub_category` WHERE `id`!='0' AND `status_id` = '1' ")->num_rows ?></h6>
                </div>
            </div>
            <div class="col-12 col-md-4 p-4">
                <div class="rounded rounded-4 p-4 animate__animated animate__backInLeft" style="height: 140px;  background: linear-gradient(to right, #a8ff78, #78ffd6);">
                    <h4>Messages</h4>
                    <h6 class="text-end mt-4 pt-2 me-2 fs-4"><?= Database::search("SELECT * FROM `messages` ")->num_rows ?></h6>
                </div>
            </div>
            <div class="col-12 col-md-4 p-4">
                <div class="rounded rounded-4 p-4 animate__animated animate__backInLeft" style="height: 140px;  background: linear-gradient(to right, #a8ff78, #78ffd6);">
                    <h4>Subscribers</h4>
                    <h6 class="text-end mt-4 pt-2 me-2 fs-4"><?= Database::search("SELECT * FROM `subscribe` ")->num_rows ?></h6>
                </div>
            </div>


        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>

<?php require_once('footer.php'); ?>