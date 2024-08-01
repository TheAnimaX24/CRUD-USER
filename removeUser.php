<?php
require_once './db/connexion.php';
$id = $_GET['id'];
echo $id;
$codeSQL = $db -> prepare ("DELETE FROM utilisateurs WHERE id = $id ");

$codeSQL -> execute();
header('Location: ./index.php' );
?>