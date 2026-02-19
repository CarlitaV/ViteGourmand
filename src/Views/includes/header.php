<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
</head>
<body>
    <nav>
        <div class="logo">
            <img src="/public/asset/images/Logo_Vite_Goumourmand_Gemini_Generated_Image.png" alt="Logo vite et gourmand">
        </div>

        <ul>
            <li><a href="/accueil">ACCUEIL</a></li>
            <li><a href="/cartes">CARTES</a></li>
            <li><a href="/apropos">A PROPOS</a></li>
            <li><a href="/avis">AVIS</a></li>
            <?php
            /*Ici si l'utilisateur est connecter on affiche deconnexion**/
            if (isset($_SESSION['utilisateur'])): ?>
                <li><a href="/deconnexion">DECONNECTION</a></li>

            <?php else: ?>
                <li><a href="/connexion">CONNECTION</a></li>
            <?php endif; ?>
                
        </ul>
    </nav>
    
</body>
</html>