<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/Navbar.css">

    <title>Liste des animaux</title>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['Id_Admin'])) {
        header('Location: connexionAdmin.html');
        exit();
    }
    ?>

    <div class="background">
        <div class="navbar">
            <ul>
                <li><img src="assets/img/accueil.png" alt="Logo"></li>
                <li><a href="admin_accueil.php">Accueil</a></li>
                <li><a href="pageAdoptionAdmin.php">Ajouter</a></li>
                <li><a href="consultation.php">Consultation</a></li>
                <li><a href="deconnexion.php">Déconnexion</a></li>
            </ul>
        </div>

        <div class="container">
            <h2>Un nouveau parmis nous ?</h2>

        </div>
        
    </div>
    <div class="container">
            <h2>Ajouter un animal</h2>
            <form action="ajouterAnimal.php" method="post" enctype="multipart/form-data" class="form-container">
                <label for="AnPrenom">Prénom de l'animal:</label>
                <input type="text" id="AnPrenom" name="AnPrenom" required>
                <label for="AnAge">Âge de l'animal:</label>
                <input type="number" id="AnAge" name="AnAge" required>
                <label for="dateNaiss">Date de naissance de l'animal:</label>
                <input type="date" id="dateNaiss" name="dateNaiss" required>
                <label for="AnPuce">Puce de l'animal:</label>
                <input type="text" id="AnPuce" name="AnPuce" required>
                <label for="image">Photo de l'animal:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <button type="submit">Ajouter</button>
            </form>

            <h2>Sélectionner un animal</h2>
            <form action="ajouterEspeceType.php" method="post" class="form-container">
                <label for="animal">Sélectionner un animal :</label>
                <select name="animal" id="animal">
                    <?php
                    $servername = "mysql-portfolio215.alwaysdata.net";
                    $username = "343348_";
                    $password = "BTSsio123!";
                    $dbname = "portfolio215_343348";
                    
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM animal";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["Id_Animal"] . "'>" . $row["AnPrenom"] . "</option>";
                        }
                    }
                    ?>
                </select>

                <label for="type">Type de l'animal :</label>
                <input type="text" id="type" name="type" required>

                <label for="espece">Espèce de l'animal :</label>
                <input type="text" id="espece" name="espece" required>

                <button type="submit">Continuer</button>
            </form>

            <h2>Liste des Animaux</h2>
            <div class="animal-list">
                <?php
                $sql = "SELECT * FROM animal";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<ul>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>
                                <strong>Prénom:</strong> " . $row["AnPrenom"] . "<br>
                                <strong>Âge:</strong> " . $row["AnAge"] . "<br>
                                <strong>Date de Naissance:</strong> " . $row["dateNaiss"] . "<br>
                                <strong>Puce:</strong> " . $row["AnPuce"] . "<br>
                                <img src='photos_animaux/" . $row["image_filename"] . "' alt='" . $row["AnPrenom"] . "' width='100'>
                              </li>";
                    }
                    echo "</ul>";
                } else {
                    echo "Aucun animal trouvé.";
                }
                ?>
            </div>
        </div>
</body>
</html>
