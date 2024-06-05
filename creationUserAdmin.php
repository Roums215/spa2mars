<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Créer un compte</h2>
            <form id="signupForm" method="post" action="creationCompteAdmin.php">
                <label for="firstName">Nom :</label>
                <input type="text" id="firstName" name="firstName" required>
                
                <label for="lastName">Prénom :</label>
                <input type="text" id="lastName" name="lastName" required>
                
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>


                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                
                <input type="submit" value="Créer un compte">
            </form>
        </div>
    </div>
</body>
</html>
