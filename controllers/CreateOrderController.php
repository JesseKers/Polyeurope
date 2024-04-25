<?php

namespace controllers;

use PDO;

class CreateOrderController
{
    public function loadview(): void
    {
        require 'views/CreateOrder.view.php';
    }
    public function createOrder(): void
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
}