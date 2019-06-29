<?php
session_start();
require('../connection/db_connect.php');

// de inputs van het login formulier
$username=$_POST['uname']; 
$password=$_POST['psw']; 

// beveiliging tegen SQL injectie
$sql=$db_connection->prepare("SELECT * FROM users 
    WHERE username= :username");

$sql->execute([
    ':username' => $username,
]);
// hier zetten we de data in een variabele
$user = $sql->fetch();

// Vergelijk wachtwoorden
if(password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    // Terug naar pagina
    header('Location: ../../index.php' );
    exit(0);
}
echo 'Wachtwoord of Gebruikersnaam klopt niet';


?>
