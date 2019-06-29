<?php
session_start();
require('../connection/db_connect.php');
//Kijkt of je via POST request binnen bent gekomen
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    // We keren terug index.php
    header('Location: ../../index.php');
    die();
}
$topic = $_POST['id']; //Haalt de get waarden op
$reactie = $_POST['reactie'];
try{
    $db_query = $db_connection->prepare(
        "INSERT INTO reply(content, topic_id, user_id)
         VALUES( :reactie, :topic,'$_SESSION[user_id]' )"
    );
	$db_query->execute([
        ':reactie' => $reactie,
        ':topic' => $topic,
        ]);


} catch (PDOException $error) {
    echo "ERROR: " . $error->getMessage();
    die();
}
header('Location: ../../index.php');