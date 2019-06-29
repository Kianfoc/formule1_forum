<?php
session_start();
include_once("app/templates/bovenstukhtml.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="threadpagina" id="onderstepagina">
            <h1>Cookie beleid</h1>
            <br/>
            <p id='ondertext'>Hieronder kan je de cookies beleid downloaden van Formule 1 forum, voor verdere vragen mail naar kianvos@formule1forum.nl</p>
            <br/>
            <button class="downloadbtn">
            <a class="cookiedownload" href="app/pdf/cookiebeleid.pdf" download="">Download</a>
            </button>
        </div>
<?php
include_once("app/templates/onderstukhtml.php");