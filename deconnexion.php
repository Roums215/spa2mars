<?php
session_start();

// tout prendre
$_SESSION = array();


session_destroy();

// Rediriger vers la page de connexion ou d'accueil
header("Location: connexion.html");
exit();
?>
