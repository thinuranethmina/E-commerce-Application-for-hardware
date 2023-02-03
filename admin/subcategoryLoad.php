<?php
require_once('connection.php');

if (isset($_POST['id'])) {

    $subcat = Database::search("SELECT * FROM sub_category WHERE category_id= '" . $_POST['id'] . "' ORDER BY `name` ASC  ");
    if ($subcat->num_rows == 0) {
?>
        <option value="0">Select Sub Category</option>
    <?php
    } else {
    ?>
        <option value="0">Select Sub Category</option>
        <?php
        while ($category = mysqli_fetch_array($subcat)) {
        ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php
        }
        ?>
<?php
    }
}
