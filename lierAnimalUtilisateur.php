<?php
session_start();

if (!isset($_SESSION['Id_Admin'])) {
    header('Location: connexionAdmin.html');
    exit();
}

$servername = "mysql-portfolio215.alwaysdata.net";
$username = "343348_";
$password = "BTSsio123!";
$dbname = "portfolio215_343348";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $animalId = $_POST['animal'];
    $userId = $_POST['user'];

    $stmt = $conn->prepare("UPDATE animal SET Id_Utilisateur = ? WHERE Id_Animal = ?");
    $stmt->bind_param("ii", $userId, $animalId);

    if ($stmt->execute()) {
        echo "Animal lié à l'utilisateur avec succès.";
    } else {
        echo "Erreur lors de la liaison de l'animal à l'utilisateur.";
    }

    $stmt->close();
}

$conn->close();
?>
