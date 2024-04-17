<?php


use Database\Database;

require 'config.php';
require 'database/Database.php';

$db = new Database(...$config['database']);

var_dump($db);

//change