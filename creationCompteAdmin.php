<?php
            $servername = "mysql-portfolio215.alwaysdata.net";
            $username = "343348_";
            $password = "BTSsio123!";
            $dbname = "portfolio215_343348";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verif POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = htmlspecialchars($_POST['firstName']);
    $lastname = htmlspecialchars($_POST['lastName']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = htmlspecialchars($_POST['email']);

    $stmt = $conn->prepare("INSERT INTO admin (ANom, APrenom, email, mdp) VALUES ( ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);

    if ($stmt->execute()) {
        header("location: connexion.html");
        exit();
    } else {
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
