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

if (isset($_POST['dateVaccPuce'])) {
    $vaccination = isset($_POST['Vaccination']) ? 1 : 0;
    $dateVaccPuce = $_POST['dateVaccPuce'];

    $stmt = $conn->prepare("INSERT INTO consultation (Vaccination, dateVaccPuce) VALUES (?, ?)");
    $stmt->bind_param("is", $vaccination, $dateVaccPuce);

    if ($stmt->execute()) {
        echo "Consultation ajoutée avec succès";
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Veuillez remplir tous les champs";
}

$conn->close();
?>
