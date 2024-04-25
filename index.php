<?php

use Database\Database;

session_start();

require 'config.php';
require 'database/Database.php';

global $db;
$db = new Database(...$config['database']);

require 'Route.php';
