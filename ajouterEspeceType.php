<?php
// Connexion à la base de données
$servername = "mysql-portfolio215.alwaysdata.net";
$username = "343348_";
$password = "BTSsio123!";
$dbname = "portfolio215_343348";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupération des données du formulaire
if (isset($_POST['animal'], $_POST['type'], $_POST['espece'])) {
    $animal_id = $_POST['animal'];
    $type = $_POST['type'];
    $espece = $_POST['espece'];

    // Préparation de la requête d'insertion
    $sql = "INSERT INTO typeanimal (LibelTypeAnimal, Id_Animal) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $type, $animal_id);

    // Exécution de la requête
    if ($stmt->execute()) {
        $stmt->close();

        // Préparation de la requête d'insertion
        $sql = "INSERT INTO espece (LibelEspece, Id_Animal) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $espece, $animal_id);

        // Exécution de la requête
        if ($stmt->execute()) {
            echo "Type et espèce ajoutés avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'espèce : " . $conn->error;
        }
    } else {
        echo "Erreur lors de l'ajout du type : " . $conn->error;
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
} else {
    echo "Veuillez remplir tous les champs.";
}
?>
