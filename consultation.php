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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/Navbar.css">

    <title>Gestion des Consultations</title>
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
            
                
        </div>
    </div>
    <div class="container">
            <h2>Ajouter un Vétérinaire</h2>
            <form action="ajouterVeterinaire.php" method="post" class="form-container">
                <label for="NomMedecin">Nom du Vétérinaire:</label>
                <input type="text" id="NomMedecin" name="NomMedecin" required>
                <button type="submit">Ajouter</button>
            </form>

            <h2>Ajouter une Consultation</h2>
            <form action="ajouterConsultation.php" method="post" class="form-container">
                <label for="Vaccination">Vaccination:</label>
                <input type="checkbox" id="Vaccination" name="Vaccination">
                <label for="dateVaccPuce">Date de la Vaccination/Puce:</label>
                <input type="date" id="dateVaccPuce" name="dateVaccPuce" required>
                <button type="submit">Ajouter</button>
            </form>

            <h2>Assigner une Consultation à un Animal et un Vétérinaire</h2>
            <form action="lierConsultationAnimalVeterinaire.php" method="post" class="form-container">
                <label for="animal">Sélectionner un Animal:</label>
                <select name="animal" id="animal" required>
                    <?php
                    $sql = "SELECT Id_Animal, AnPrenom FROM animal";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Id_Animal"] . "'>" . $row["AnPrenom"] . "</option>";
                        }
                    }
                    ?>
                </select>

                <label for="consultation">Sélectionner une Consultation:</label>
                <select name="consultation" id="consultation" required>
                    <?php
                    $sql = "SELECT Id_Consultation FROM consultation";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Id_Consultation"] . "'>Consultation " . $row["Id_Consultation"] . "</option>";
                        }
                    }
                    ?>
                </select>

                <label for="veterinaire">Sélectionner un Vétérinaire:</label>
                <select name="veterinaire" id="veterinaire" required>
                    <?php
                    $sql = "SELECT Id_Veterinaire, NomMedecin FROM veterinaire";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Id_Veterinaire"] . "'>" . $row["NomMedecin"] . "</option>";
                        }
                    }
                    ?>
                </select>

                <button type="submit">Assigner</button>
            </form>

            <h2>Liste des Consultations des Animaux</h2>
            <div class="consultation-list">
                <?php
                $sql = "SELECT animal.AnPrenom, consultation.Id_Consultation, consultation.Vaccination, consultation.dateVaccPuce, veterinaire.NomMedecin 
                        FROM effectuer
                        JOIN animal ON effectuer.Id_Animal = animal.Id_Animal
                        JOIN consultation ON effectuer.Id_Consultation = consultation.Id_Consultation
                        JOIN veterinaire ON consultation.Id_Consultation = veterinaire.Id_Consultation";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<ul>";
                    while ($row = $result->fetch_assoc()) {
                        $vaccination = $row["Vaccination"] ? "Oui" : "Non";
                        echo "<li>
                                <strong>Animal:</strong> " . $row["AnPrenom"] . "<br>
                                <strong>Consultation ID:</strong> " . $row["Id_Consultation"] . "<br>
                                <strong>Vaccination:</strong> " . $vaccination . "<br>
                                <strong>Date:</strong> " . $row["dateVaccPuce"] . "<br>
                                <strong>Vétérinaire:</strong> " . $row["NomMedecin"] . "
                              </li>";
                    }
                    echo "</ul>";
                } else {
                    echo "Aucune consultation trouvée.";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
$conn->close();
?>
