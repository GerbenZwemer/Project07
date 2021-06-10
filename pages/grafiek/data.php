<?php
header('Content-Type: application/json');

require_once('../../conn/db.php');

$query = "SELECT cliënt_id, woonplaats, allergie_id FROM allergie_woonplaats ORDER BY woonplaats";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$data = array();
foreach ($result as $row) {
	$data[] = $row['cliënt_id'];
	$data[] = $row['allergie_id'];
	$data[] = $row['woonplaats'];
}


echo json_encode($data);
?>