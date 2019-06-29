<?php
session_start();
include_once("app/templates/bovenstukhtml.php");
$threadid = $_GET['id'];
?>		<form method="POST" action="app/threads-topics/topicvoegen.php">
		<div class="threadpagina" id="topictoevoegen">
			<h1>Topic toevoegen</h1>
			<input type='hidden' name='id' value='<?= $threadid;?>'>
            <input id="titel" type="text" name="Titel" placeholder="Titel"><br>
            <textarea name="verhaal" placeholder="Schrijf hier je verhaal"></textarea>
			<button type="submit" id="submittoevoegen">Topic toevoegen</button>
		</div>
		</form>
<?php
include_once("app/templates/onderstukhtml.php");