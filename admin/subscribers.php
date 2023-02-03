<?php
require_once('header.php');
?>

<div class="pc-container" style="z-index: 0;">
    <div class="pcoded-content" style="z-index: 0;">
        <!-- [ breadcrumb ] start -->

        <div class="page-header-title pb-4" style="z-index: 0;">
            <h4 class="m-b-10" style="z-index: 0;">Subscribers</h4>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-12 card px-3 py-5">
                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultset = Database::search("SELECT * FROM `subscribe` WHERE `id`!='0' ORDER BY `email` ");
                        $rows = $resultset->num_rows;
                        if ($rows > 0) {

                            for ($x = 1; $x <= $rows; $x++) {
                                $row = $resultset->fetch_assoc();
                        ?>
                                <tr>
                                    <td><?= $x ?></td>
                                    <td class="text-center"><?= $row['email'] ?></td>
                                    <td class="text-center"><img onclick="deleteSubscriber('<?= $row['id'] ?>');" style="cursor: pointer;" height="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAnklEQVR4nOWTMQ7CMAxF33EY4A6oE9yKkfPBwN7YrZRLFH2JSh5LQ0oplqxYtvJfYifwF+ZwcRiiG1znig0lztcB2zCv3R7fFMDgkeBo0IdcTtA43IoBCRrlethLWK5YuRek+AZ5FNQaY9U+MgOD3MIh1HexZesGWO0WpQWGfJdQPO34TFVb/0fzSoA0A9BOBnRw1oZ3xDs4TQb8lD0BbZKmNGfUJjMAAAAASUVORK5CYII="></td>
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