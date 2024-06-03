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
                foreach ($decoProducts as $product) { ?>
                    <option value="<?= $product['ID'] ?>"><?= $product['Size'] ?></option>
                <?php } ?>
            </select>

            <label for="quantity" class="col-start-3 col-span-2 row-start-1">Quantity</label>
            <input id="quantity" type="number" name="quantity" class="col-start-3 col-span-2 px-8 py-2" value="1" required>

            <label for="density" class="col-start-5 col-span-2 row-start-1">Density</label>
            <select name="density" id="density" class="col-start-5 col-span-2 px-8 py-2" required>
                <option value="hard">Hard</option>
                <option value="medium">Medium</option>
                <option value="soft">Soft</option>
            </select>

            <label for="stud" class="col-start-7 col-span-2 row-start-1" >Stud</label>
            <select name="stud" id="stud" class="col-start-7 col-span-2 px-8 py-2" required>
                <option value="100%">100%</option>
                <option value="75%">75%</option>
                <option value="50%">50%</option>
                <option value="0%">0%</option>
            </select>

            <label for="core" class="col-start-9 col-span-2 row-start-1">Core</label>
            <select name="core" id="core" class="col-start-9 col-span-2 px-8 py-2" required>
                <option value="solid">Solid</option>
                <option value="foam">Foam</option>
            </select>

            <input type="submit" value="Add product" class="px-4 py-2 rounded bg-customLightBlue text-sky-50 col-start-10">
        </form>
        <div class="m-4 rounded p-4 bg-gray-200">
            <table class="w-full text-center border-collapse my-4">
                <thead>
                <tr class="bg-customBlue text-white">
                    <th class="py-2">Mal code</th>
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
                if (!$_SESSION['order']) {
                    $_SESSION['order'] = [];
                }
                $itemNum = 0;
                foreach ($_SESSION['order'] as $order) {
                    ?>
                    <tr class="bg-customSuperLightBlue">
                        <td class="border px-4 py-2"><?= $order['malCode'] ?></td>
                        <td class="border px-4 py-2"><?= $order['size'] ?>"</td>
                        <td class="border px-4 py-2"><?= $order['quantity'] ?></td>
                        <td class="border px-4 py-2"><?= $order['density'] ?></td>
                        <td class="border px-4 py-2"><?= $order['core'] ?></td>
                        <td class="border px-4 py-2"><?= $order['stud'] ?></td>
                        <td class="border px-4 py-2"><?= $order['sizeFc'] ?></td>
                        <td class="border px-4 py-2"><?= $order['sizeRod'] ?></td>
                        <td class="w-48">
                            <a href="/delete?item=<?=$itemNum?>" class="px-3 py-2 rounded bg-red-900 text-sky-50 col-start-9 col-span-2">Del</a>
                            <a href="/copy?item=<?=$itemNum?>" class="px-3 py-2 rounded bg-green-900 text-sky-50 col-start-9 col-span-2">Copy</a>
                        </td>
                    </tr>
                    <?php
                    $itemNum ++;
                }
                ?>
                </tbody>
            </table>
            <button class="px-4 py-2 rounded bg-customLightBlue text-sky-50" id="show">Store</button>
        </div>
    </div>
    <div id="orderFormContainer" class="bg-customBlue rounded-lg shadow-lg p-8 absolute inset-0 m-auto w-1/2 h-fit hidden">
        <button id="x" class="px-4 py-2 rounded bg-red-500 text-sky-50">x</button>
        <form action="/storeOrder" class="bg-customLightBlue rounded-lg p-6 space-y-4">
            <div>
                <label for="orderID" class="block text-white font-bold mb-2">Order ID</label>
                <input type="number" name="orderID" id="orderID" class="w-full p-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-300" placeholder="Enter your order ID" required>
            </div>
            <div>
                <input type="submit" value="Create" class="w-full bg-green-500 text-white p-2 rounded cursor-pointer hover:bg-green-600 transition-colors duration-300">
            </div>
        </form>
    </div>
<?php
require 'views/partials/footer.view.php';
?>
<script>
    document.getElementById('show').addEventListener('click', function() {
        document.getElementById('orderFormContainer').classList.remove('hidden');
    });
    document.getElementById('x').addEventListener('click', function() {
        document.getElementById('orderFormContainer').classList.add('hidden');
    });

</script>