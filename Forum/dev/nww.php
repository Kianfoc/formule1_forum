<?php
session_start();
include_once("app/templates/bovenstukhtml.php");
?>
        <form action="/action_page.php">
        <div class="container" id="nwwcontainer">
        <label for="psw"><b>Huidig wachtwoord</b></label><br>
        <input class="registerf" type="text" placeholder="Huidig wachtwoord" name="psw" required><br>


        <label for="psw"><b>Password</b></label><br>
        <input class="registerf" type="password" placeholder="Wachtwoord" name="npsw" required><br>

        <label for="psw-repeat"><b>Repeat Password</b></label><br>
        <input class="registerf" type="password" placeholder="Herhaal wachtwoord" name="npsw-repeat" required><br>
        

        <button type="submit" class="registerbtn">Wachtwoord aanpassen</button>
        <button type="submit" id="cancelnww" onclick="location.href='profiel.php'">Cancel</button>
        </div>
		

		</div>
		</form>
<?php
include_once("app/templates/onderstukfixed.php");