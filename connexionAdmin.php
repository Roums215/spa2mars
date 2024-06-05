<?php
session_start();

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

    $stmt = $conn->prepare("SELECT Id_Admin, ANom, APrenom, email, mdp FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nom, $prenom, $email, $hashed_password);
        $stmt->fetch();
        
        if (password_verify($password, $hashed_password)) {
            $_SESSION['Id_Admin'] = $id;
            $_SESSION['ANom'] = $nom;
            $_SESSION['APrenom'] = $prenom;
            $_SESSION['email'] = $email;
            header('Location: admin_accueil.php'); 
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
