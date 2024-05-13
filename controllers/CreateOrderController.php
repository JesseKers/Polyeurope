<?php

namespace controllers;

use PDO;

class CreateOrderController
{
    public function loadview(): void
    {
        require 'views/CreateOrder.view.php';
    }
    public function createProduct(): void
    {
        $product = $_POST;
        $productDetails = $this->getProductInfo($product['size']);
        foreach ($productDetails as $productDetail) {
            if ($product['core'] === 'solid') {
                $productDetail['SizeFC'] = 'x';
                $productDetail['SizeRod'] = 'x';
            }
            switch ($product['density']) {
                case 'hard':
                    $product['density'] = 'A85';
                    break;
                case 'medium':
                    $product['density'] = 'A80';
                    break;
                case 'soft':
                    $product['density'] = 'A75';
                    break;
            }
            $newProduct = [
                'malCode' => $productDetail['MalCode'],
                'size' => $productDetail['Size'],
                'quantity' => $product['quantity'],
                'density' => $product['density'],
                'core' => $product['core'],
                'stud' => $product['stud'],
                'sizeFc' => $productDetail['SizeFC'],
                'sizeRod' => $productDetail['SizeRod'],
            ];
            $_SESSION['order'] = array_merge($_SESSION['order'], [$newProduct]);
//            echo 'test';
            header('Location: /');
        }
    }
    private function getProductInfo(int $id): array
    {
        global $db;
        $query = "SELECT * FROM DecoProducts WHERE (id = :id)";
        $params = [
            ':id' => $id,
        ];
        return $db->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function storeOrder()
    {
        global $db;
        if (!$_SESSION['order'] OR empty($_SESSION['order'])){
            echo 'Empty order given';
//            header('Location: /');
        }
        $json = json_encode($_SESSION['order']);
        $query = "INSERT INTO Orders (OrderID, `Order`, ClientID) VALUES (:orderID, :orderJson, :clientID)";
        $params = [
            ':orderID' => '1234',
            ':orderJson' => $json,
            ':clientID' => 1
        ];
        session_destroy();
        header('Location: /');


        return $db->query($query, $params)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function delete(): void
    {
        unset($_SESSION['order'][(int)$_GET['item']]);
        header('Location: /');
    }
}