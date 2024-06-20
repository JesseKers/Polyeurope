<?php

namespace controllers;

class EditProductsController
{
    public function loadView(): void
    {
        require 'views/Products.view.php';
    }
    public function loadEditView(): void
    {
        require 'views/EditProducts.view.php';
    }
    public function updateProduct(): void
    {
        global $db;
        if (!isset($_POST)) {
            header('Location: /edit');
        }
        $query = "UPDATE DecoProducts SET MalCode = :malCode, Size = :size, SizeFC = :sizeFc, SizeRod = :sizeRod, Price = :price WHERE ID = :id;";
        $params = [
            ':malCode' => $_POST['malCode'],
            ':size' => $_POST['size'],
            ':sizeFc' => $_POST['sizeFc'],
            ':sizeRod' => $_POST['sizeRod'],
            ':price' => $_POST['price'],
            ':id' => $_GET['ID']
        ];
        header('Location: /edit-product?ID=' . $_GET['ID']);

        $db->query($query, $params);
    }

}