<?php
$servername = "mysql-portfolio215.alwaysdata.net";
$username = "343348_";
$password = "BTSsio123!";
$dbname = "portfolio215_343348";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]) && isset($_POST["animal_id"])) {
    $animal_id = $_POST["animal_id"];
    $target_dir = "photos_animaux/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Erreur, trop grand format.";
            exit;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Mauvais format";
            exit;
        }
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $sql = "UPDATE animal SET image_filename='" . basename($_FILES["image"]["name"]) . "' WHERE Id_Animal=" . $animal_id;
            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded.";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Désolé, il y a une erreur lors du téléchargement";
        }
    } else {
        echo "Erreur";
    }
}

$conn->close();

header("Location: pageAdoption.php");
exit();
?>
