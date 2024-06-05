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

session_start();
if (!isset($_SESSION['Id_Utilisateur'])) {
    header('Location: connexion.html');
    exit();
}

$userId = $_SESSION['Id_Utilisateur'];
$username = $_SESSION['UNom']; // Assuming the username is stored in the session

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image']) && isset($_POST['animalName'])) {
    $target_dir = "photos_utilisateurs/";
    
    // Vérifier si le dossier existe, sinon le créer
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifiez si le fichier image est une image réelle ou une fausse image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }

    // Vérifiez si le fichier existe déjà
    if (file_exists($target_file)) {
        echo "Désolé, le fichier existe déjà.";
        $uploadOk = 0;
    }

    // Vérifiez la taille du fichier
    if ($_FILES["image"]["size"] > 500000) {
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = 0;
    } 

    // Limiter les formats de fichier
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = 0;
    }

    // Vérifiez si $uploadOk est défini à 0 par une erreur
    if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    // si tout va bien, essayez de télécharger le fichier
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $animalName = $_POST['animalName'];
            $userName = $_SESSION['UNom'];

            // Insérer les informations de la photo dans la base de données
            $stmt = $conn->prepare("INSERT INTO user_photos (userId, userName, animalName, filePath) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("isss", $userId, $userName, $animalName, $target_file);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    }
}

// Requête pour récupérer les photos des utilisateurs
$sql = "SELECT * FROM user_photos";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/Navbar.css">
    <link rel="stylesheet" href="assets/css/utilisateur.css">
    <title>Mon Compte</title>
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
    <!-- Formulaire pour télécharger une photo -->
    <div class="container">
            <h2>Ajouter une photo de votre animal adopté</h2>
            <form action="monCompte.php" method="post" enctype="multipart/form-data">
                <label for="animalName">Nom de l'animal:</label>
                <input type="text" id="animalName" name="animalName" required>
                <label for="image">Photo de l'animal:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <button type="submit">Télécharger</button>
            </form>
        </div>

        <!-- Affichage des photos des utilisateurs -->
        <div class="card-container">
            <?php
            // Affichage des informations des photos des utilisateurs dans des cartes
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<img src='" . $row["filePath"] . "' alt='Photo de l'animal'>";
                    echo "<h2>" . htmlspecialchars($row["userName"]) . " & " . htmlspecialchars($row["animalName"]) . "</h2>";
                    echo "</div>";
                }
            } else {
                echo "<p>Aucune photo trouvée.</p>";
            }
            ?>
        </div>
</body>
</html>
