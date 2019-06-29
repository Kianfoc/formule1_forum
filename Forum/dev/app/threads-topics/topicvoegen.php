<?php
session_start();
require('../connection/db_connect.php');

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    // We keren terug index.php
    header('Location: ../../index.php');
    die();
}
$threadid = $_POST['id'];

$titel = $_POST['Titel'];
$verhaal = $_POST['verhaal'];
$datum= date("d/m/y");
try{
    $db_query = $db_connection->prepare(
        "INSERT INTO topics(title, content, thread_id, user_id)
         VALUES(:titel, :verhaal, :thread_id, :user_id )"
    );
	$db_query->execute([
        ':verhaal' => $verhaal,
        ':titel' => $titel,
        ':thread_id' => $threadid,
        ':user_id' => $_SESSION['user_id']

        ]);
} catch (PDOException $error) {
    echo "ERROR: " . $error->getMessage();
    die();
}
//Gaat terug naar de pagina die hiervoor was, en dan de goede thread
header('Location: ' . $_GET['origin'] . '?id=' . $threadid);