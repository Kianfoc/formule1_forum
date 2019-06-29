<?php
include_once('../connection/db_connect.php')
$avatar = $db_connection->prepare("SELECT * FROM users WHERE id = :id");
			$avatar->execute([
				':id' => $_SESSION['user_id']	//Hij vult the :id placeholder met de user_id
			]);
			$avatarfinal = $avatar->fetch(PDO::FETCH_ASSOC);
			?>
			<img src="data:image/jpg;base64, 
			<?= base64_encode($avatarfinal['avatar']) ?>">