<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
    <title>Inscription</title>
</head>
<body>
    <section class="formContact format" id="inscritpion">
        <h2>Créer un compte</h2>

        <?php if(isset($error)): ?>
            <p style="color:red"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form  action="/inscription" method="POST">
            <div>
                <label for="">Nom d'utilisateur :</label>
                <input type="text" name="nom" required>
                <br><br>
            </div>
            
            <div>
                <label for="">Prenom :</label>
                <input type="text" name="prenom" required>
                <br><br>
            </div>

            <address>
                <label for="">Adresse :</label>
                <input type="text" name="adresse" required>
                <br><br>
            </address>
            <div>
                <label for="">Ville</label>
                <input type="text" name="ville" required>
            </div>

            <div>
                <label for="tel">Telephone :</label>
                <input type="text" name="numTelephone" id="tel" pattern="[0-9]{10}" require>
            </div><br>

            <div>
                <label for="">Email :</label>
                <input type="text" name="email" required>
                <br><br>
            </div>
            
            <div>
                <label for="">Mot de passe :</label>
                <input type="text" name="motDePasse" required>
                <br><br>
            </div>

            <button type="submit">S'inscrire</button>

        </form>
        <p> Déja un compte ? <a href="/connexion">Se connecter</a></p> 
    </section>

</body>
</html>