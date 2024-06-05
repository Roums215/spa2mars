<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/compte.css">

</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Créer un compte</h2>
            <form id="signupForm" method="post" action="creationCompte.php">
                <label for="firstName">Nom :</label>
                <input type="text" id="firstName" name="firstName" required>
                
                <label for="lastName">Prénom :</label>
                <input type="text" id="lastName" name="lastName" required>
                
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>

                <label for="number">Téléphone :</label>
                <input type="number" id="number" name="number" required>
                
                <label for="street">Adresse :</label>
                <input type="text" id="street" name="street" required>

                <label for="age">Âge :</label>
                <input type="number" id="age" name="age" required>

                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <a href="connexion.html">Retour</a>

                <input type="submit" value="Créer un compte">
            </form>
        </div>
    </div>
</body>
</html>
