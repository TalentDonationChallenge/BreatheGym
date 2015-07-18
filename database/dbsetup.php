<?php
	require_once(__DIR__ . '/../framework/framework.php');
	$pdo = Database::getInstance();
	$pdo->exec(file_get_contents("table.sql")); 

	$exercises = json_decode(file_get_contents("exerciseList.json"), true);

	foreach ($exercises as $exercise) {
		$stmt = $pdo->prepare("INSERT INTO exerciseList (name, type, time, count) 
		VALUES (:name, :type, :time, :count)");
		$stmt->execute(array(
			":name"=>$exercise["name"],
			":type"=>$exercise["type"],
			":time"=>$exercise["time"],
			":count"=>$exercise["count"]
		));
	}
?>
<a href="/index.php">gogo</a>