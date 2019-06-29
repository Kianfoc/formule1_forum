<?php
session_start();
require('app/connection/db_connect.php');
include_once("app/templates/bovenstukhtml.php");
$topic = $_GET['topic']; //Get request die meegenomen word van de topic.php pagina
?>
		<div class="threadpagina" id="topictoevoegen" >
            <br/>
            <br/>
            <form action="app/threads-topics/reactie.php" method="POST">
            <input type='hidden' name='id' value='<?php echo "$topic";?>'/> <!--Zo geef ik de id mee naar reactie.php, zo kan ik het daar gebruiken -->
            <textarea type="text" name="reactie" style="border-radius: 5px;"placeholder="Schrijf je reactie"></textarea>
            <button max-length="10"type="submit" id="submittoevoegen">Topic toevoegen</button>
            </form>
		</div>
<?php
include_once("app/templates/onderstukfixed.php");
