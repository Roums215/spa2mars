<?php

session_start();

if (!isset($_SESSION['Id_Admin'])) {
    header('Location: connexion.html');
    exit();
}

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
$AnPrenom = $_POST['AnPrenom'];
$AnAge = $_POST['AnAge'];
$dateNaiss = $_POST['dateNaiss'];
$AnPuce = $_POST['AnPuce'];

// Traitement de l'image
$target_dir = "photos_animaux/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;

// Vérification si le fichier image est une image réelle
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
}

// Vérification de la taille de l'image
if ($_FILES["image"]["size"] > 500000) {
    echo "Désolé, votre fichier est trop volumineux.";
    $uploadOk = 0;
}

// Autoriser certains formats de fichiers
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
    $uploadOk = 0;
}

// Vérifier si $uploadOk est défini à 0 par une erreur
if ($uploadOk == 0) {
    echo "Désolé, votre fichier n'a pas été téléchargé.";
// Si tout est correct, téléchargez le fichier
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["image"]["name"])). " a été téléchargé.";
    } else {
        echo "Une erreur s'est produite lors du téléchargement du fichier.";
    }
}

$sql = "INSERT INTO animal (AnPrenom, AnAge, dateNaiss, AnPuce, image_path, image_filename)
VALUES ('$AnPrenom', '$AnAge', '$dateNaiss', '$AnPuce', '$target_dir', '" . htmlspecialchars(basename($_FILES["image"]["name"])) . "')";

if ($conn->query($sql) === TRUE) {
    echo "Nouvel animal ajouté avec succès.";
} else {
    echo "Erreur: " . $sql . "<br>" . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

