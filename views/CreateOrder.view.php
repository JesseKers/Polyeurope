<?php
global $db;
$title = 'Create order';
require 'views/partials/head.view.php';
$order = [];

$decoProducts = $db->query('SELECT * FROM DecoProducts')->fetchAll(PDO::FETCH_ASSOC);

?>
<body class="grid grid-cols-12">
    <header class="col-start-2 col-span-10 h-12 bg-gray-300">

    </header>
    <div class="col-start-2 col-span-10 bg-gray-100 my-12 rounded h-fit">
        <div class="m-4 rounded p-4 bg-gray-200">
            <table class="w-full text-center border-collapse my-4">
                <thead>
                <tr class="bg-gray-600 text-white">
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
                <tr>
                    <td class="border px-4 py-2">2A</td>
                    <td class="border px-4 py-2">2.000"</td>
                    <td class="border px-4 py-2">12</td>
                    <td class="border px-4 py-2">A80</td>
                    <td class="border px-4 py-2">Solid</td>
                    <td class="border px-4 py-2">75%</td>
                    <td class="border px-4 py-2">x</td>
                    <td class="border px-4 py-2">x</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">4A</td>
                    <td class="border px-4 py-2">4.000"</td>
                    <td class="border px-4 py-2">8</td>
                    <td class="border px-4 py-2">A80</td>
                    <td class="border px-4 py-2">Foam</td>
                    <td class="border px-4 py-2">100%</td>
                    <td class="border px-4 py-2">50/95</td>
                    <td class="border px-4 py-2">140</td>
                </tr>
                </tbody>
            </table>
            <a href="#" id="addDecoProductBtn" class="px-3 py-2 my-6 rounded bg-gray-900 text-sky-50">Add Deco product</a>
        </div>
        <form action="/storeProduct" method="post" id="decoProductForm" class="m-4 rounded p-4 bg-gray-200 grid grid-cols-10 gap-4 py-4">
            <label for="size" class="col-span-2">Size</label>
            <select name="size" id="size" class="col-span-2 px-8 py-2">
                <?php foreach ($decoProducts as $product) { ?>
                    <option value="<?= $product['Size'] ?>"><?= $product['Size'] ?></option>
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
                <option value="100">100%</option>
                <option value="75">75%</option>
                <option value="50">50%</option>
                <option value="0">0%</option>
            </select>

            <label for="core" class="col-start-9 col-span-2 row-start-1">Core</label>
            <select name="core" id="core" class="col-start-9 col-span-2 px-8 py-2" required>
                <option value="solid">Solid</option>
                <option value="foam">Foam</option>
            </select>

            <input type="submit" value="Add product" class="px-3 py-2 rounded bg-gray-900 text-sky-50 col-start-9 col-span-2">
        </form>
    </div>
    <div class="col-start-2 col-span-10 bg-gray-100 my-12 rounded h-fit">
        <div class="m-4 rounded p-4 bg-gray-200">
            <table class="w-full text-center border-collapse my-4">
                <thead>
                <tr class="bg-gray-600 text-white">
                    <th class="py-2">Mal code</th>
                    <th class="py-2">Size</th>
                    <th class="py-2">Quantity</th>
                    <th class="py-2">Density</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border px-4 py-2">2A</td>
                    <td class="border px-4 py-2">2.000"</td>
                    <td class="border px-4 py-2">12</td>
                    <td class="border px-4 py-2">High</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">4A</td>
                    <td class="border px-4 py-2">4.000"</td>
                    <td class="border px-4 py-2">8</td>
                    <td class="border px-4 py-2">Low</td>
                </tr>
                </tbody>
            </table>
            <a href="#" id="addDecoProductBtn" class="px-3 py-2 my-6 rounded bg-gray-900 text-sky-50">Add Deco product</a>
        </div>
        <form action="/storeProduct" method="post" id="decoProductForm" class="m-4 rounded p-4 bg-gray-200 grid grid-cols-10 gap-4 py-4">
            <label for="size" class="col-span-2">Size</label>
            <select name="size" id="size" class="col-span-2 col-start-1 px-8 py-2">
                <?php foreach ($decoProducts as $product) { ?>
                    <option value="<?= $product['Size'] ?>"><?= $product['Size'] ?></option>
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

            <input type="submit" value="Add product" class="px-3 py-2 rounded bg-gray-900 text-sky-50 col-start-9 col-span-2 row-start-3">
        </form>
    </div>
</body>
</html>