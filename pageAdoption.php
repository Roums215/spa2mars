<?php
$servername = "mysql-portfolio215.alwaysdata.net";
$username = "343348_";
$password = "BTSsio123!";
$dbname = "portfolio215_343348";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Animaux avec consultation et sans Id_Utilisateur
$sql = "SELECT animal.*, consultation.Id_Consultation 
        FROM animal 
        INNER JOIN effectuer ON animal.Id_Animal = effectuer.Id_Animal
        INNER JOIN consultation ON effectuer.Id_Consultation = consultation.Id_Consultation
        WHERE animal.Id_Utilisateur IS NULL";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Navbar.css">
    <link rel="stylesheet" href="assets/css/utilisateur.css">

    <title>Liste des animaux</title>
</head>
<body>
<div class="background">
    <div class="navbar">
        <ul>
            <li><img src="assets/img/accueil.png" alt="Logo"></li>
            <li><a href="index.html">Accueil</a></li>
            <li><a href="pageAdoption.php">J'adopte</a></li>
            <li><a href="monCompte.php">Mon compte</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>BIENVENUE À SPA2MARS</h2>
        <p>La SPA2MARS est une société spécialisée dans la protection et le bien-être des animaux.</p>
    </div>
</div>
<div class="card-container">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
            echo "<h2>" . $row["AnPrenom"] . "</h2>";
            echo "<p>Age: " . $row["AnAge"] . "</p>";
            echo "<p>Date de naissance: " . $row["dateNaiss"] . "</p>";
            echo "<p>Puce: " . $row["AnPuce"] . "</p>";
            // VErif si photo
            if (!empty($row["image_filename"])) {
                $image_path = "photos_animaux/" . $row["image_filename"];
                echo "<img src='" . $image_path . "' alt='Photo de l'animal' class='photo'>";
            } else {
                echo "<p>Aucune photo disponible.</p>";

                echo "<form action='upload_image.php' method='post' enctype='multipart/form-data' class='upload-form'>";
                echo "<input type='hidden' name='animal_id' value='" . $row["Id_Animal"] . "'>";
                echo "<input type='file' name='image' accept='image/*' required>";
                echo "<button type='submit'>Ajouter une photo</button>";
                echo "</form>";
            }

            echo "<form action='contact.php' method='post'>";
            echo "<input type='hidden' name='animal_id' value='" . $row["Id_Animal"] . "'>";
            echo "<button type='submit' class='contact-button'>Prendre Contact</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "Aucun animal trouvé.";
    }
    ?>
</div>
</body>
</html>

<?php
$conn->close();
?>
