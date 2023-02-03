<?php
require_once('header.php');
?>

<div class="pc-container" style="z-index: 0;">
    <div class="pcoded-content" style="z-index: 0;">
        <!-- [ breadcrumb ] start -->

        <div class="page-header-title pb-4" style="z-index: 0;">
            <h4 class="m-b-10" style="z-index: 0;">Messages</h4>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-12 card px-3 py-5">
                <table class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Mobile</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultset = Database::search("SELECT * FROM `messages` WHERE `id`!='0' ORDER BY `date` DESC ");
                        $rows = $resultset->num_rows;
                        if ($rows > 0) {

                            for ($x = 1; $x <= $rows; $x++) {
                                $row = $resultset->fetch_assoc();
                        ?>
                                <tr>
                                    <td><?= $x ?></td>
                                    <td class="text-center"><?= $row['name'] ?></td>
                                    <td class="text-center"><?= $row['mobile'] ?></td>
                                    <td class="text-center"><?= date('Y-m-d', strtotime($row['date'])) ?></td>
                                    <td class="text-center">
                                        <img onclick="viewMsg('<?= $row['id'] ?>');" style="cursor: pointer;" height="30px" class="me-2" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB1ElEQVR4nO2Vyy5kURSGvxZNJ1q5JC08g3ZJiIkBE02YeBkmbaLFLRKXeAEzl6EHkIiIqcaIROJWdIL0QIR0Wsmq/MWyFc4Jw/MlO1X7r7X+vfa1ICEhISE6hUA7MAGsA3+AW7UzaROKsdgPowYYBy6BTMR2qZzq9wycAmaAG2e8CQwCP1TYFzX73gEMA/su3nKn5BWLXuDEGdlyN0fM/QS0Aucu/1ieb1IMzLrEO30OBXFFWuK0Ch2T5hkJPDJa0TDugUpgTYH/tdTb6jfxlLE8+26ap0W6efySp/VXgYoglipgRwHn2mPjr7QwwW9PrpkWTigjD6MTuHBF2ZhZzHzLmdTyyLX0EuIX8FW6eeSodbm/cxMLC/juEvak10fYgtEgplH6rtPq8hWAlmPb3eG2rApz0n7ylCIVcfLKIRxQrnmgByr3ltiEvwXx2WpWFfAP6AO61D8FSolOSlc3I49+eVp/BSh/KfEzMO2WdcMZLQAFEQa3mEX3fmw4v8moz3QPcJhnn+eBslfy7LelPHkHQDcxSemxuQrM0joT9ZqNtQZp6SD2SoczzvY9o0qH7DjGn9GRBn646x9BgU6yPbHL+tO5UduXNqwbFOWsJCQkJGDcA3crwmw/XEzUAAAAAElFTkSuQmCC">
                                        <img onclick="deleteMsg('<?= $row['id'] ?>');" style="cursor: pointer;" height="30px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAAnklEQVR4nOWTMQ7CMAxF33EY4A6oE9yKkfPBwN7YrZRLFH2JSh5LQ0oplqxYtvJfYifwF+ZwcRiiG1znig0lztcB2zCv3R7fFMDgkeBo0IdcTtA43IoBCRrlethLWK5YuRek+AZ5FNQaY9U+MgOD3MIh1HexZesGWO0WpQWGfJdQPO34TFVb/0fzSoA0A9BOBnRw1oZ3xDs4TQb8lD0BbZKmNGfUJjMAAAAASUVORK5CYII=">
                                    </td>
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