<?php
global $db;
$title = 'Create order';
require 'views/partials/head.view.php';
require 'views/partials/header.view.php';
?>
<div class="col-start-2 col-span-10 bg-gray-300 my-12 rounded h-fit">
    <table>
        <thead>
            <tr>
                <th>Size</th>
                <th>Mal code</th>
                <th>Size foam core</th>
                <th>Size rod</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $decoProducts = $db->query('SELECT * FROM DecoProducts')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($decoProducts as $product) {
            ?>
            <tr>
                <td><?= $product['Size']?></td>
                <td><?= $product['MalCode']?></td>
                <td><?= $product['SizeFC']?></td>
                <td><?= $product['SizeRod']?></td>
                <td><a href="edit-product?ID=<?=$product['ID']?>" class="px-3 py-2 rounded bg-customBlue text-sky-50 col-start-9 col-span-2">Edit</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php
require 'views/partials/footer.view.php';
?>

