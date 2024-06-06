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
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // requête
    $stmt = $conn->prepare("SELECT Id_Utilisateur, UNom, UAge, UTel, UPrenom, UAdress, mdp, email FROM utilisateur WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // utilisateur existe?
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nom, $age, $tel, $prenom, $adresse, $hashed_password, $email);
        $stmt->fetch();
        
        if (password_verify($password, $hashed_password)) {
            $_SESSION['Id_Utilisateur'] = $id;
            $_SESSION['UNom'] = $nom;
            $_SESSION['UAge'] = $age;
            $_SESSION['UTel'] = $tel;
            $_SESSION['UPrenom'] = $prenom;
            $_SESSION['UAdress'] = $adresse;
            $_SESSION['email'] = $email;

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
