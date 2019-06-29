<?php
session_start();
include_once('app/connection/db_connect.php');
include_once("app/templates/bovenstukhtml.php");
?>	
		<button onclick="location.href='admin.php'" class="topictoevoegen">Topic toevoegen</button>
		<div class="threads">
			<?php 
				$db_query = $db_connection->prepare('SELECT * FROM threads'); //Haalt alles op

				$db_query->execute([

				]);

				$threads = $db_query->fetchAll(PDO::FETCH_ASSOC); //Worden uit de array gehaald
			
			?>
			<?php foreach($threads as $thread => $t): ?> <!--Herhaalt dit net zo vaak als dat er threads zijn -->
			<div onclick="location.href='topics.php?id=<?= $t['id'] ?>&title=<?= $t['title'] ?>';" class="thread">
				<label><?= $t['title']; ?></label>
				<img class="kleine_foto"  src="data:image/jpg;base64, 
			<?= base64_encode($t['image']) ?>" alt="<?=$t['title']?>">
			</div>
			<br>
			<?php endforeach ?>

		</div>
		
<?php
include_once("app/templates/onderstukhtml.php");