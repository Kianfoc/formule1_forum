<?php
session_start();
require('app/connection/db_connect.php');
include_once("app/templates/bovenstukhtml.php");
?>
		<div class="threadpagina" >
			<form method="POST" action="app/threads-topics/threadstoevoegen.php" > <!--Via een POST request gaat de link achter action het afhandelen -->
			<h1>Thread toevoegen</h1>
            <input id="titel" type="text" name="titel" id="titel"placeholder="Titel"><br>
            <h3 style="text-align:center;"> Image toevoegen</h3>
			
            <input type="file" name="avatar" id="avatar">
			<h3 style="text-align:center;"> Informatie over het onderwerp</h3>
            <textarea name="verhaal" placeholder="Schrijf hier je verhaal"></textarea>
			<button type="submit" name="submit" id="submittoevoegen">Thread toevoegen</button>
			<form>
		</div>



<?php
include_once('app/templates/onderstukfixed.php');