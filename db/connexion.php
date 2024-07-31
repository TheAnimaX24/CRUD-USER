<?php

$servername = "localhost";
$username = "root";
$pass = "";

try {
    $db = new PDO("mysql:host=$servername;dbname=gestion_utilisateurs", $username, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo ("Connexion reussit");
} catch (PDOException $error) {
    echo ("Err:" . $error);
}
?>