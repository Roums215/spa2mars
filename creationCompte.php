<?php
$servername = "mysql-portfolio215.alwaysdata.net";
$username = "343348_";
$password = "BTSsio123!";
$dbname = "portfolio215_343348";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification des entrées POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST['firstName']);
    $age = htmlspecialchars($_POST['age']);
    $number = htmlspecialchars($_POST['number']);
    $lastname = htmlspecialchars($_POST['lastName']);
    $street = htmlspecialchars($_POST['street']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = htmlspecialchars($_POST['email']);

    // Préparation de la requête
    $stmt = $conn->prepare("INSERT INTO utilisateur (UNom, UAge, UTel, UPrenom, UAdress, mdp, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siissss", $firstname, $age, $number, $lastname, $street, $password, $email);

    if ($stmt->execute()) {
        header("location: connexion.html");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
