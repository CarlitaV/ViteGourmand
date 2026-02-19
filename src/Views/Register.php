<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Créer un compte</h1>

    <form action="/register" method="POST">
        <div>
            <label for="">Nom d'utilisateur : :</label>
            <input type="text" name="utilisateur" required>
            <br><br>
        </div>
        
        <div>
            <label for="">Prenom :</label>
            <input type="prenom" name="prenom" required>
            <br><br>
        </div>
        

        <address>
            <label for="">Adresse :</label>
            <input type="adresse" name="adresse" required>
            <br><br>
        </address>

        <div>
            <label for="tel">Telephone :</label>
            <input type="tel" name="numTelephone" id="tel" pattern="[0-9]{10}">
        </div>

        
        <div>
            <label for="">Email :</label>
            <input type="email" name="email" required>
            <br><br>
        </div>
        
        <div>
            <label for="">Mot de passe :</label>
            <input type="password" name="motDePasse" required>
            <br><br>
        </div>

        <button type="submit">S'inscrire</button>

    </form>
    <p> Déja un compte ? <a href="/login">Se connecter</a></p>    
</body>
</html>