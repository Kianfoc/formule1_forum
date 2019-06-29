<?php
session_start();
include_once("app/templates/bovenstukhtml.php");
require('app/connection/db_connect.php');

$title = $_GET['title'];
$threadid = $_GET['id'];
	$dbQuery= $db_connection->prepare("SELECT topics.*,
			users.username
	FROM topics
	INNER JOIN users ON topics.user_id = users.id 
	WHERE thread_id = :id
	ORDER BY id DESC
	");
	//Haalt de topics met gebruikersnaam op in volgorde hoogste id nummer naar nieuwste, nieuwste dus bovenaan
	$dbQuery->execute([
		':id' => $threadid,
	]);
	$topics = $dbQuery->fetchAll();

	$db_query = $db_connection->prepare("SELECT * FROM threads");
	$threads = $db_query->fetchAll();
?>
		<div class="threadpagina">
					<h1><?= $title ?></h1>
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Zoek naar topics">
					<?php if(isset($_SESSION['user_id'])): ?>
						<button onclick="location.href='topictoevoegen.php?id=<?= $threadid ?>&origin=<?= $_SERVER['PHP_SELF']?>'" class="topictoevoegen">Topic toevoegen</button>
					<?php endif; ?>
<br>
<br>
<br>
						<ul id="myUL">
							<?php foreach($topics as $topic => $a):?>
								<li style="text-decoration: none;list-style-type: none;"onclick="location.href='topic.php?topic_id=<?=$a['id']?>&topic_title=<?= $a['title'] ?>'" class="litopic"><a id="atopic" >
								<h3><?= $a['title'];?></h3></a>
										<br>
										<br>
										<div class="text"><h5><?= $a['content'];?></h5></div>
										<p class="posted">Gemaakt door <?= $a['username']?></p>
										<p class="date"><?= $a['date']?></span>
								</li>
							<?php endforeach; ?>
						</ul>
		</div>
		
<?php
include_once("app/templates/onderstukhtml.php");

?>