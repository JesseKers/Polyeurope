<?php

use Database\Database;

require 'config.php';
require 'database/Database.php';

$db = new Database(...$config['database']);

require 'views/WoDeco.view.php';