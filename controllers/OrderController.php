<?php

namespace controllers;

use PDO;

class OrderController
{
    public function loadView(): void
    {
        require 'views/Orders.view.php';
    }
}