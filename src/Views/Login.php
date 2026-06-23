<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
    <title>Connexion</title>
</head>
<body>
    <section class="formContact">
        <h2>Connexion</h2>
        <form class="format" action="/connexion" method="post">
            <div class="logo">
                <img src="/../asset/images/Logo_Vite_Goumourmand_Gemini_Generated_Image.png" alt="">
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

            <button type="submit">Se connecter</button>
            
        </form>
<br>
        <p>Pas encore inscrit ? <a href="/inscription">Créér votre compte</a></p>
        
    </section>
    
</body>
</html>