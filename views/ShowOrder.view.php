<?php
global $db;
$title = 'Create order';
require 'views/partials/head.view.php';

$decoProducts = $db->query('SELECT * FROM DecoProducts')->fetchAll(PDO::FETCH_ASSOC);

?>
<body>
<?= $_GET['ID']?></body>
</html>