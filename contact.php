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

$animal_id = null;
$animal = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['animal_id'])) {
    $animal_id = $_POST['animal_id'];

    // Requête pour récupérer les informations de l'animal
    $sql = "SELECT * FROM animal WHERE Id_Animal = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $animal_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $animal = $result->fetch_assoc();
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Contact pour Adoption</title>
</head>
<body>
    <?php if ($animal): ?>
        <div class="navbar">
            <ul>
                <li><img src="assets/img/accueil.png" alt="Logo"></li>
                <li><a href="Accueil.php">Accueil</a></li>
                <li><a href="pageAdoption.php">J'adopte</a></li>
                <li><a href="monCompte.php">Mon compte</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </div>
        <div class="contact-info">
            <h2>Contactez-nous pour adopter <?php echo htmlspecialchars($animal['AnPrenom']); ?></h2>
            <p>Prénom: <?php echo htmlspecialchars($animal['AnPrenom']); ?></p>
            <p>Âge: <?php echo htmlspecialchars($animal['AnAge']); ?></p>
            <p>Date de naissance: <?php echo htmlspecialchars($animal['dateNaiss']); ?></p>
            <p>Puce: <?php echo htmlspecialchars($animal['AnPuce']); ?></p>
            <!-- Ajoutez vos informations de contact ici -->
            <p>Email: contact@spa2mars.com</p>
            <p>Téléphone: 01 23 45 67 89</p>
        </div>
    <?php else: ?>
        <p>Animal non trouvé.</p>
    <?php endif; ?>
</body>
</html>
