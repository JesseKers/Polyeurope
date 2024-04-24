<?php

use controllers\CreateOrderController;
use Database\Database;

require 'config.php';
require 'database/Database.php';

global $db;
$db = new Database(...$config['database']);

require 'controllers/CreateOrderController.php';

$create = new CreateOrderController();

$create->loadview();

