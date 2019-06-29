<?php
session_start();
$db_connection = new PDO(
	'mysql:host=localhost;dbname=forum',
	'root',
	''
);
$imagefileHandle = fopen($_FILES['avatar']['tmp_name'], 'rb');
$imageData = fread($imagefileHandle, filesize($_FILES['avatar']['tmp_name']));
fclose($imagefileHandle);

$query = $db_connection->prepare('UPDATE users SET avatar = :data WHERE id = :id');
$query->execute([
    ':data' => $imageData,
    ':id' => $_SESSION['user_id']
]);
header("Location: profiel.php");