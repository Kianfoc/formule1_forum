<?php
session_start();
include_once("app/templates/bovenstukhtml.php");
?>
			<form action="app/register/registration.php" method="POST">
			
			<div class="container">
			<label for="email"><b>Gebruikersnaam</b></label><br>
			<input class="registerf" type="text" placeholder="Gebruikersnaam" name="uname" required><br>

			<label for="email"><b>Voornaam</b></label><br>
			<input class="registerf" type="text" placeholder="Voornaam" name="vnaam" required><br>


			<label for="email"><b>Email</b></label><br>
			<input class="registerf" type="text" placeholder="Email" name="email" required><br>


			<label for="psw"><b>Wachtwoord</b></label><br>
			<input class="registerf" type="password" placeholder="Enter wachtwoord" minlength="6" name="psw" required><br>

			<label for="psw-repeat"><b>Herhaal wachtwoord</b></label><br>
			<input class="registerf" type="password" placeholder="Herhaal wachtwoord" minlength="6" name="psw-repeat" required><br>
			

			<button type="submit" class="registerbtn">Register</button>
			</div>
		

		</div>
		</form>
<?php
include_once("app/templates/onderstukfixed.php");