<?php
	require_once(__DIR__ . '/../framework/framework.php');
	$pdo = Database::getInstance();
   	$pdo->exec(file_get_contents("table.sql")); ?>
<a href="/index.php">gogo</a>