<?php
global $db;
$title = 'Create order';
require 'views/partials/head.view.php';
require 'views/partials/header.view.php';
$orders = $db->query('SELECT * FROM Orders')->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-start-2 col-span-10 bg-gray-100 my-12 rounded h-fit">
    <div class="m-4 rounded p-4 bg-gray-200">
        <table class="w-full text-center border-collapse my-4">
            <thead>
            <tr class="bg-gray-600 text-white">
                <th class="py-2">OrderID</th>
                <th class="py-2"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($orders as $order) {
                ?>
                <tr>
                    <td class="border px-4 py-2"><?= $order['OrderID'] ?></td>
                    <td class="px-3 py-2 rounded bg-gray-900 text-sky-50 col-start-9 col-span-2"><a href="/showOrder?ID=<?= $order['ID'] ?>">Show details</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php
require 'views/partials/footer.view.php';
?>