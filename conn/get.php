<?php
require('db.php');
$query = 'SELECT * FROM users';
$stm = $conn->prepare($query);
$stm->execute();
$row = $stm->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($row);
?>