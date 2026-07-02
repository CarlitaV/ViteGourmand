<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
    <title>Page d'accueil</title>
</head>
<body>
    <?php require_once __DIR__ .'/includes/header.php'?>
    <section class="container">
        <h1 class="titre">Vite & Gourmand</h1>
        <div class="imgAccueil">
            <img  src="/asset/images/Plat_Gemini_Image1.png" alt="image d'acueil Vite & Gourmand">
        </div>
        <form class="formRecherche" action="/menu" method="GET">
            <input type="text" name="q" placeholder="Recherche un plat">
            <button type="submit">Recherche</button>
        </form>

    </section>
    <section class="cards">
        <a href="/menu" class="card">
            <img class="imgCard" src="/asset/images/Plat_nos_menus_ChatGPT.png" alt="">
            <h3>Nos Menus</h3>
            <p>Découvrez nos offres</p>
        </a>
        <a href="/avis" class="card">
            <img class="imgCard" src="/asset/images/Avis_Client_Gemini_Generated_Image.png" alt="">
            <h3>Avis Clients</h3>
            <p>Ce que disent nos clients</p>
        </a>
        <a href="#contact" class="card">
            <img class="imgCard" src="/asset/images/Nous_contacter_ChatGPT.png" alt="">
            <h3>Contacter-Nous</h3>
            <p>Ecrivez-nous ou appellez nous</p>
        </a>
    </section>
    <section class="experience">
        <h2>Une expérience gastronomique unique</h2>
        <p>Découvrez une cuisine raffinée où créativité et produits de saison se rencontrent. Chaque plat est pensé avec passion pour éveiller vos sens, dans un cadre élégant et chaleureux. Notre équipe vous accueille pour transformer chaque repas en un moment d’exception.</p>
        <a href="/menu">Découvrire nos menus</a>
    </section>
    <section class="info">
        <h2> Infos pratiques</h2>
        <h3>Cuisine</h3>
        <p>Fait maison, Produits frais & Traditionnelle</p>
        <br>

        <h3>Services</h3>
        <p>Proposition de menu adapté à vos événements</p>
        <br>
        
        <h3>Livraison</h3>
        <p>Bordeaux prix de base<br>
        Hors Bordeaux des frais kilométriques seront facturés</p>
        <br>
        
        <h3>Moyens de paiement</h3>
        <p>Mastercard Visa, Carte Bleue</p>
        <br>

    </section>
    <section id="horaires" class="horaires">
        <h2>Horaires</h2>
        <p>
        Lundi : 10h - 22h<br>
        Mardi : 10h - 22h<br>
        Mercredi : 10h - 22h<br>
        Jeudi : 10h - 22h<br>
        Vendredi : 10h - 23h<br>
        Samedi : 10h - 23h<br>
        Dimanche : 10h - 22h
        </p>

    </section>
    <section id="contact" class="formContact">
        <h2 class="titreContact">Nous contacter</h2>
        <p class="pContact">Vous désirez nous contacter ? Remplissez le formulaire ci-dessous !</p>
        <div class="contactMap">
            <form action="/" method="post">
                <ul>
                    <li>
                        <label for="name">Nom</label>
                        <input type="text" id="nom" name="nom" />
                    </li>
                    <li>
                        <label for="name">Prénom</label>
                        <input type="text" id="prenom" name="prenom" />
                    </li>
                    <li>
                        <label for="mail">E-mail</label>
                        <input type="email" id="email" name="email" />
                    </li>
                    <li>
                        <label for="tel">Téléphone</label>
                        <input type="tel" id="tel" name="numeroTelephone" pattern="^[0-9]{10}$" />
                    </li>
                    <li>
                        <label for="msg">Message</label>
                        <textarea id="msg" name="user_message"></textarea>
                    </li>
                </ul>
                <button class="btnEnvoyer" type="submit">Envoyer</button>
            </form>
            <map class="map" name="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2829.193333319492!2d-0.5802771239215337!3d44.83799597107057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5527c483604d5b%3A0x8f2d09019bfdb140!2sPl.%20Pey%20Berland%2C%2033000%20Bordeaux!5e0!3m2!1sfr!2sfr!4v1772205878013!5m2!1sfr!2sfr" 
                    width="600" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </map>
        </div>
    </section>
    <?php require_once __DIR__ .'/includes/footer.php'?>

</body>
</html>