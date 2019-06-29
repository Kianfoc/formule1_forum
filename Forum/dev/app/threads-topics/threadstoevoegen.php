<?php
session_start();
require('../connection/db_connect.php');

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    // We keren terug index.php
    header('Location: ../../index.php');
    die();
}

$titel = $_POST['titel'];
$verhaal = $_POST['verhaal'];
$imagefileHandle = fopen("../../img/profielfoto.png", 'rb');
$imageData = fread($imagefileHandle, filesize("../../img/profielfoto.png"));
fclose($imagefileHandle);
try{
    $db_query = $db_connection->prepare(
        "INSERT INTO threads(title, content, image, user_id, )
         VALUES(:titel, :verhaal, :image, '$_SESSION[user_id]' )" //Toevoegen van thread
    );
	$db_query->execute([
        ':verhaal' => $verhaal, //De placeholders vullen met de opgehaalde variabele
        ':titel' => $titel,
        ':image' => $imageData

        ]);
} catch (PDOException $error) {
    echo "ERROR: " . $error->getMessage();
    die();
}


// header('Location: ../../index.php' );