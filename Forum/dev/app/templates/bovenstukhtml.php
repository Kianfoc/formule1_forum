<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="language" content="Dutch">
    <link rel="shortcut icon" href="img/icon.jpg">
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="author" content="Kian Vos">

    <title>Formule 1 forum</title>


</head>
<body>
		<script type="text/javascript" src="js/Java.js"></script>
	<header>
				<!--De navbar-->
				
				<img class onclick="location.href='index.php'"src="img/icon.jpg" alt="F1">
	    <span class="head_tekst">Forum<br>Formule 1</span>
			<?php if(isset($_SESSION['user_id'])): ?>
			<button style="width:auto;"  class="register" onclick="location.href='app/login-uit/logout.php?origin=<?= $_SERVER['PHP_SELF'] ?>'">Log Out</button>
			<button style="width:auto;"  class="register" onclick="location.href='profiel.php?origin=<?= $_SERVER['PHP_SELF'] ?>'"><?= $_SESSION['username'] ?></button>
				<?php else: ?>
	    	    <button onclick="document.getElementById('id01').style.display='block'" class="login"style="width:auto;">Login</button>
	    	   <button onclick="location.href='register.php'" class="register" style="width:auto;">Nieuw</button>
	<?php endif ?>
		<div id="id01" class="modal">
		  
		  <form class="modal-content animate" action="app/login-uit/login.php?origin=<?= $_SERVER['PHP_SELF']; ?>" method="POST">
		    <div class="imgcontainer">
		    </div>

		    <div class="containeri">
		      <label for="uname"><b>Gebruikersnaam</b></label>
		      <input type="text" placeholder="Gebruikersnaam" name="uname" required>

		      <label for="psw"><b>Wachtwoord</b></label>
		      <input type="password" placeholder="Wachtwoord" name="psw" required>
		        
		      <button type="submit">Login</button>
		      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		    </div>
 
		  </form>
		</div>
	</header>
	<main>