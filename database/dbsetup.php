<?php
	require_once(__DIR__ . '/../framework/framework.php');
	$pdo = Database::getInstance();
	$pdo->exec(file_get_contents("table.sql")); 

	$exercises = json_decode(file_get_contents("exerciseList.json"), true);
	print_r($exercises);
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

	$gymMembers = json_decode(file_get_contents("gymMember.json"), true);
	// print_r($gymMembers);

	// foreach ($gymMembers as $gymMember) {
	// 	$stmt = $pdo->prepare('INSERT INTO gymMember
	// 		(barcode, name, phone, )')
	// }

	$members = json_decode(file_get_contents("member.json"), true);

	// foreach ($members as $member) {
	// 	$stmt = $pdo->prepare("INSERT INTO member 
	// 		(email, password, name, phone, barcode, birthday, facebook, sex, registerDate, nickname, active)
	// 		VALUES (:email, :password, :name, :phone, :barcode, :birthday, :facebook, :sex, :registerDate, :nickname, :active)");
	// 	$stmt->execute(array(
	// 		':email'=>$member['email'],
	// 		':password'=>sha1($member['password']),
	// 		':name'=>$member['name'],
	// 		':phone'=>$member['phone'],
	// 		':barcode'=>$member['barcode'],
	// 		':birthday'=>$member['birthday'],
	// 		':facebook'=>$member['facebook'],
	// 		':sex'=>$member['sex'],
	// 		':registerDate'=>$member['registerDate'],
	// 		':nickname'=>$member['nickname'],
	// 		':active'=>$member['active']
	// 	));
	// }
?>
<a href="/index.php">gogo</a>
