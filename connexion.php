<?php
session_start();

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "spa2mars";
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
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparation de la requête
    $stmt = $conn->prepare("SELECT Id_Utilisateur, UNom, UAge, UTel, UPrenom, UAdress, mdp, email FROM utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Vérifier si l'utilisateur existe
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nom, $age, $tel, $prenom, $adresse, $hashed_password, $email);
        $stmt->fetch();
        
        // Vérifier le mot de passe
        if (password_verify($password, $hashed_password)) {
            // Stocker les informations dans la session
            $_SESSION['Id_Utilisateur'] = $id;
            $_SESSION['UNom'] = $nom;
            $_SESSION['UAge'] = $age;
            $_SESSION['UTel'] = $tel;
            $_SESSION['UPrenom'] = $prenom;
            $_SESSION['UAdress'] = $adresse;
            $_SESSION['email'] = $email;

            // Rediriger vers la page d'accueil
            header('Location: index.html'); 
            exit();
        } else {
            echo "Mot de passe invalide";
        }
    } else {
        echo "Email non trouvé";
    }

    $stmt->close();
} else {
    echo "Veuillez remplir tous les champs";
}

$conn->close();
?>
