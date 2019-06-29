<?php
session_start();
require('app/connection/db_connect.php');
include_once("app/templates/bovenstukhtml.php");
?>		<div class="profielinfo">
			<h2 style="margin-right: 0;" id="gebruikersnaam">Welkom <?= $_SESSION['username'] ?></h2>
			<?php
	$avatar = $db_connection->prepare("SELECT * FROM users WHERE id = :id");
			$avatar->execute([
				':id' => $_SESSION['user_id']
			]);
			$avatar2 = $avatar->fetch(PDO::FETCH_ASSOC);
			?>
			<img src="data:image/jpg;base64, 
			<?= base64_encode($avatar2['avatar']) ?>">
			<br />
			<h5>profielfoto aanpassen
			<br />
			<form method="POST" enctype="multipart/form-data" action="profielfoto.php">
			<input type="file" name="avatar" id="avatar">
			<br />
			<input type="submit">
			</form>
			<br />
			<input style="margin-left:auto; margin-right:auto;"type="button" name="passwordchange" id="kww" value="Wachtwoord wijzigen" onclick="location.href='nww.php'">
		</div>
<?php
include_once("app/templates/onderstukfixed.php");