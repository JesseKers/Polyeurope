<?php
global $db;
$title = 'Create order';
require 'views/partials/head.view.php';
require 'views/partials/header.view.php';
$items = $db->query('SELECT * FROM DecoProducts WHERE id = :id', [':id' => $_GET['ID']])->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-start-2 col-span-10 bg-gray-300 my-12 rounded h-fit p-6">
    <form action="/update-product?ID=<?= $_GET['ID'] ?>" method="post" id="decoProductForm" class="rounded p-4 bg-gray-200 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($items as $item) { ?>
            <div class="col-span-1">
                <label for="malCode" class="block text-sm font-medium text-gray-700">Mal Code</label>
                <input type="text" name="malCode" id="malCode" value="<?= $item['MalCode']?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="col-span-1">
                <label for="size" class="block text-sm font-medium text-gray-700">Size</label>
                <input type="text" name="size" id="size" value="<?= $item['Size']?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="col-span-1">
                <label for="sizeFc" class="block text-sm font-medium text-gray-700">Size Foam Core</label>
                <input type="text" name="sizeFc" id="sizeFc" value="<?= $item['SizeFC']?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="col-span-1">
                <label for="sizeRod" class="block text-sm font-medium text-gray-700">Size Rod</label>
                <input type="text" name="sizeRod" id="sizeRod" value="<?= $item['SizeRod']?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="col-span-1">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="text" name="price" id="price" value="<?= $item['Price'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>
            <div class="col-span-1">
                <input type="submit" name="change" id="change" value="Save" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 hover:bg-green-500">
            </div>
        <?php } ?>
    </form>
</div>

<?php
require 'views/partials/footer.view.php';
?>