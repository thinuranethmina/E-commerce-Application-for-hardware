<?php
require_once('db_connection.php');

if (isset($_POST['id'])) {

    $subcat = Database::search("SELECT * FROM sub_category WHERE category_id= '" . $_POST['id'] . "' AND status_id='1' ORDER BY `name` ASC  ");
    if ($subcat->num_rows == 0) {
?>
        <select id="subCategorySelect" class="form-control my-2">
            <option value="0">Select Sub Category</option>
        </select>
    <?php
    } else {
    ?>
        <select id="subCategorySelect" class="form-control my-2">
            <option value="0">Select Sub Category</option>
            <?php
            while ($category = mysqli_fetch_array($subcat)) {
            ?>
                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
            <?php
            }
            ?>
        </select>
<?php
    }
}
