<?php
session_start();
include_once("app/templates/bovenstukhtml.php");

include_once('app/connection/db_connect.php');

$topic_id = $_GET['topic_id'];
$topic_title = $_GET['topic_title'];


$state = $db_connection->prepare('SELECT * FROM reply WHERE topic_id = :topic_id');

$state->execute([
	':topic_id' => $topic_id
]);

$replies = $state->fetchAll(PDO::FETCH_ASSOC);


$state = $db_connection->prepare('SELECT * FROM topics WHERE id = :topic_id');

$state->execute([
	':topic_id' => $topic_id
]);

$topic = $state->fetch();

$db_query = $db_connection->prepare('SELECT * FROM users WHERE id = :user_id');

					$db_query->execute([
						':user_id' => $topic['user_id']
					]);
					
					$maker = $db_query->fetch();



?>



		<div class="topicpage">
			<!--Topic-->
			<div class="reactie">
					<div class="re">
							<p> <?= $topic_title ?></p>
								<p class="datum"><?= $topic['date'] ?></p>
					</div>
					<div class="Gebruiker">
						<p><?= $maker['username'] ?></p>
					</div>
					<hr>
					<div class="bericht">
						<p class="berichttext"><?= $topic['content'] ?></p>
					</div>
					<?php if(isset($_SESSION['user_id'])): ?> <!-- Als de session user_id aanwezig is die tijdens het inloggen aangemaakt is dan kan je pas reageren -->
						<a class="reageer" href="reageer.php?topic=<?= $topic['id'] ?>">
						<img src="img/reageerbutton.png" alt="Reageer">
						</a>
					<?php endif; ?>
				</div>
			<!--Einde topic-->
			<div class="reactie">
					<?php foreach($replies as $reply => $r): ?>
					<?php 
					$db_query = $db_connection->prepare('SELECT username FROM users WHERE id = :user_id');

					$db_query->execute([
						':user_id' => $r['user_id']
					]);
					
					$user = $db_query->fetch();
					?>

					<div class="re">
							<p> RE: <?= $topic_title ?></p>
								<p class="datum"><?= $r['date'] ?></p>
					</div>
					<div class="Gebruiker">
						<p><?= $user[0] ?></p>
					</div>
					<hr>
					<div class="bericht">
						<p class="berichttext"><?= $r['content'] ?></p>
					</div>
					<?php if(isset($_SESSION['user_id'])): ?>
						<a class="reageer" href="reageer.php?topic=<?= $topic['id'] ?>">
						<img src="img/reageerbutton.png" alt="Reageer">
						</a>
					<?php endif; ?>
				</div>
				<?php endforeach ?>

			
		</div>
<?php
include_once("app/templates/onderstukhtml.php");