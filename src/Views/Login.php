<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form action="/login" method="post">
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

        <button type="submit">Se connecter</button>
        
    </form>

    <p>Pas encore inscrit ? <a href="/register">Créér votre compte</a></p>
    
</body>
</html>