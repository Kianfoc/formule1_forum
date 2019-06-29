<?php
//Hiermee starten we de SESSIE engine
session_start();
//Controleren of we via een formulier dit scriptje hebben opgestart
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    // We keren terug index.php

    echo 'Niet toegestaan';
    die();
}
//Kijken of het wachtwoord gelijk is
if($_POST['psw']!==$_POST['psw-repeat']) { 
    header('Location: ../../register.php');
    
    exit;
    } else {
    
    // success page here
$username = $_POST['uname'];
$voornaam = $_POST['vnaam'];
$email = $_POST['email'];
$password = $_POST['psw'];

$imagefileHandle = fopen("../../img/profielfoto.png", 'rb');
$imageData = fread($imagefileHandle, filesize("../../img/profielfoto.png"));
fclose($imagefileHandle);


require('../connection/db_connect.php');
try{

    //SQL Query samenstellen
    $db_query = $db_connection->prepare(
        "SELECT * FROM users 
                  WHERE username = :gebruikersnaam
                  OR email = :mailadres"
    );

    $db_query->execute([
        ':gebruikersnaam' => $username,
        ':mailadres' => $email  
    ]);

//Controleren of er een user gevonden is
    if($db_query->rowCount() > 0) {
        $_SESSION['error'] = 'Gebruikersnaam en/of email bestaat al!';
        header('Location: ../../register.php');
        exit(0);
    }

} catch(PDOException $error) {
    echo 'ERROR: ' .$error->getMessage();
    die();
}

/*
 * User bestaat nog niet, dus sla ik de user nu
 * op in de database. En daarna breng ik deze user naar de login pagina
 */

try{
    $db_query = $db_connection->prepare(
        "INSERT INTO users(username, voornaam, email, password, avatar)
         VALUES(:gebruikersnaam, :voornaam, :mailadres, :wachtwoord, :avatar)"
    );
    //Password gehashed opgeslagen
    $password = password_hash($password, PASSWORD_DEFAULT);

    $db_query->execute([
        ':gebruikersnaam' => $username,
        ':voornaam' => $voornaam,
        ':mailadres' => $email,
        ':wachtwoord' => $password,
        ':avatar' => $imageData
    ]);
} catch (PDOException $error) {
    echo "ERROR: " . $error->getMessage();
    die();
}
    }
header('Location: ../../index.php');
