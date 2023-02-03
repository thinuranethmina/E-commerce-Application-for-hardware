<?php
require_once('header.php');
?>

<div class="pc-container" style="z-index: 0;">
    <div class="pcoded-content" style="z-index: 0;">
        <!-- [ breadcrumb ] start -->

        <div class="page-header-title pb-4" style="z-index: 0;">
            <h4 class="m-b-10" style="z-index: 0;">Rejected Categories</h4>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row px-4">
            <div class="col-12 card px-3">
                <div class="row px-4 pb-3">
                    <div class="col-12 table-title p-2 px-3" style="background-color: rgba(255, 168, 221, 0.64); color: black;">
                        <div class="row">
                            <?php
                            $active = Database::search("SELECT * FROM `category` WHERE `id`!='0' AND `status_id` = '1' ORDER BY `name` ")->num_rows;
                            $deactive = Database::search("SELECT * FROM `category` WHERE `id`!='0' AND `status_id` = '0' ORDER BY `name` ")->num_rows;
                            ?>
                            <div style="text-align: center;" class="my-auto col-4 d-none d-lg-block">Active Brands: <?= $active ?></div>
                            <div style="text-align: center;" class="my-auto col-4 d-none d-lg-block">Rejected Brands: <?= $deactive ?></div>
                            <div style="text-align: center;" class="my-auto col-lg-4 col-12"><button class="btn btn-primary" onclick="window.location='add_new_categories.php';">Add new Category</button></div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultset = Database::search("SELECT * FROM `category` WHERE `id`!='0' AND `status_id`='0' ORDER BY `name` ");
                        $rows = $resultset->num_rows;
                        if ($rows > 0) {

                            for ($x = 1; $x <= $rows; $x++) {
                                $row = $resultset->fetch_assoc();
                        ?>
                                <tr>
                                    <td><?= $x ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td>
                                        <label class="container">
                                            <input id="toggleStatus<?= $row['id'] ?>" type="checkbox" onclick="changeStatusCategory('<?= $row['id'] ?>');">
                                            <div class="checkmark"></div>
                                        </label>
                                    </td>
                                    <td style="text-align: center;"><img onclick="modalOpenCategory('<?= $row['id'] ?>');" style="cursor: pointer;" height="30px" src="data:image/png;base64,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"></td>
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
        <div id="modal" class="modal1" style="z-index: 0;">
            <!-- <div> -->
            <div class="col-12 col-md-6 offset-md-3 modal--content">
                <div class="row" id="modalContent">

                </div>
            </div>
            <!-- </div> -->
        </div>


    </div>
</div>

<?php require_once('footer.php'); ?>