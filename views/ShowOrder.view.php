<?php
global $db;
$title = 'Create order';
require 'views/partials/head.view.php';
require 'views/partials/header.view.php';
$products = $db->query("SELECT * FROM Orders WHERE id = :id", [':id' => $_GET['ID']])->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-start-2 col-span-10 bg-gray-300 my-12 rounded h-fit">
    <div class="m-4 rounded p-4 bg-gray-200">
        <p>Order ID: <?= $products[0]['OrderID'] ?></p>
        <table class="w-full text-center border-collapse my-4">
            <thead>
            <tr class="bg-customBlue text-white">
                <th class="py-2">Mal Code</th>
                <th class="py-2">Size</th>
                <th class="py-2">Quantity</th>
                <th class="py-2">Density</th>
                <th class="py-2">Core</th>
                <th class="py-2">Stud</th>
                <th class="py-2">Size FC</th>
                <th class="py-2">Size rod</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($products as $product) {
                $items = json_decode($product['Order'], true);
                foreach ($items as $item) {
                ?>
                    <tr class="bg-customSuperLightBlue">
                        <td class="border px-4 py-2"><?= $item['malCode'] ?></td>
                        <td class="border px-4 py-2"><?= $item['size'] ?></td>
                        <td class="border px-4 py-2"><?= $item['quantity'] ?></td>
                        <td class="border px-4 py-2"><?= $item['density'] ?></td>
                        <td class="border px-4 py-2"><?= $item['core'] ?></td>
                        <td class="border px-4 py-2"><?= $item['stud'] ?></td>
                        <td class="border px-4 py-2"><?= $item['sizeFc'] ?></td>
                        <td class="border px-4 py-2"><?= $item['sizeRod'] ?></td>
                    </tr>

            <?php
                }
            }
            ?>
            </tbody>
        </table>
        <a href="/deleteOrder?ID=<?=$_GET['ID']?>" class="px-3 py-2 rounded bg-red-900 text-sky-50 col-start-9 col-span-2">Del</a>
    </div>
</div>
<?php
require 'views/partials/footer.view.php';
?>

