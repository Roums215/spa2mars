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

if (isset($_POST['animal']) && isset($_POST['consultation']) && isset($_POST['veterinaire'])) {
    $animalId = $_POST['animal'];
    $consultationId = $_POST['consultation'];
    $veterinaireId = $_POST['veterinaire'];

    // Insérer dans la table effectuer
    $stmt = $conn->prepare("INSERT INTO effectuer (Id_Animal, Id_Consultation) VALUES (?, ?)");
    $stmt->bind_param("ii", $animalId, $consultationId);

    if ($stmt->execute()) {
        // Mettre à jour la consultation du vétérinaire
        $stmt = $conn->prepare("UPDATE veterinaire SET Id_Consultation = ? WHERE Id_Veterinaire = ?");
        $stmt->bind_param("ii", $consultationId, $veterinaireId);
        
        if ($stmt->execute()) {
            echo "Consultation assignée avec succès à l'animal et au vétérinaire";
        } else {
            echo "Erreur: " . $stmt->error;
        }
    } else {
        echo "Erreur: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Veuillez remplir tous les champs";
}

$conn->close();
?>
