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

// Récupérer les animaux qui n'ont pas d'utilisateur et qui ont une consultation
$animals = $conn->query("
    SELECT a.Id_Animal, a.AnPrenom
    FROM animal a
    INNER JOIN effectuer e ON a.Id_Animal = e.Id_Animal
    INNER JOIN consultation c ON e.Id_Consultation = c.Id_Consultation
    WHERE a.Id_Utilisateur IS NULL
");

// Récupérer les utilisateurs
$users = $conn->query("SELECT Id_Utilisateur, UNom, UPrenom FROM utilisateur");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/Navbar.css">
    <title>SPA2MARS</title>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><img src="assets/img/accueil.png" alt="Logo"></li>
            <li><a href="admin_accueil.php">Accueil</a></li>
            <li><a href="pageAdoptionAdmin.php">Ajouter</a></li>
            <li><a href="consultation.php">Consultation</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        </ul>
    </div>

    <div class="background">
        <div class="container">
            <h2>BIENVENUE À SPA2MARS</h2>
            <p>La SPA2MARS est une société spécialisée dans la protection et le bien-être des animaux.</p>
        </div>
        <div class="form-container">
            <h2>Lier un animal à un utilisateur</h2>
            <form action="lierAnimalUtilisateur.php" method="post">
                <label for="animal">Sélectionner un animal :</label>
                <select name="animal" id="animal" required>
                    <?php
                    if ($animals->num_rows > 0) {
                        while ($row = $animals->fetch_assoc()) {
                            echo "<option value='" . $row["Id_Animal"] . "'>" . $row["AnPrenom"] . "</option>";
                        }
                    }
                    ?>
                </select>

                <label for="user">Sélectionner un utilisateur :</label>
                <select name="user" id="user" required>
                    <?php
                    if ($users->num_rows > 0) {
                        while ($row = $users->fetch_assoc()) {
                            echo "<option value='" . $row["Id_Utilisateur"] . "'>" . $row["UNom"] . " " . $row["UPrenom"] . "</option>";
                        }
                    }
                    ?>
                </select>

                <button type="submit">Lier</button>
            </form>
        </div>
    </div>
</body>
</html>
