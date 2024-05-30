<?php
global $db;
$title = 'Create order';
require 'views/partials/head.view.php';
require 'views/partials/header.view.php';
?>
<div class="col-start-2 col-span-10 bg-gray-300 my-12 rounded h-fit">
    <form action="/createProduct" method="post" id="decoProductForm" class="m-4 rounded p-4 bg-gray-200 grid grid-cols-10 gap-4 py-4">
        <label for="size" class="col-span-2">Size</label>
        <select name="size" id="size" class="col-span-2 px-8 py-2">
            <?php
            $decoProducts = $db->query('SELECT * FROM DecoProducts')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($decoProducts as $product) {
            ?>
            <option value="<?= $product['ID'] ?>" <?= isset($_POST['size']) && $_POST['size'] == $product['ID'] ? 'selected' : '' ?>><?= $product['Size'] ?></option>
            <?php } ?>
        </select>
    </form>
</div>
<?php
require 'views/partials/footer.view.php';
?>

