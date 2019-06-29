<?php
session_start();
require('app/connection/db_connect.php');
include_once("app/templates/bovenstukhtml.php");
?>
		<div class="threadpagina" id="reactie">
			<form method="POST">
			<h1>Topic toevoegen</h1>
            <input id="titel" type="text" name="titel" id="titel"placeholder="Titel"><br>
            <textarea name="verhaal" placeholder="Schrijf hier je verhaal"></textarea>
			<button type="submit" name="submit" id="submittoevoegen">Topic toevoegen</button>
			<form>
		</div>

<?php
$titel = $_POST['titel'];
$verhaal = $_POST['verhaal'];
$datum= date("d/m/y");
try{
    $db_query = $db_connection->prepare(
        "INSERT INTO topics(title, content, date)
         VALUES(:titel, :verhaal, '$datum')"
    );
    //Als het niet goed gaat word het opgevangen in een error variabele
} catch (PDOException $error) {
    echo "ERROR: " . $error->getMessage();
    die();
}
    
include_once("app/templates/onderstukhtml.php");