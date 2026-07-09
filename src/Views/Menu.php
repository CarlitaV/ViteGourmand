<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
    <title>Nos Menu</Menu></title>
</head>
<body>
<?php require_once __DIR__ .'/includes/header.php'?>

<section> 
    <h2>Nos Menus</h2>
        
        <!--<img src="/asset/images/Carte_Gemini_Generated_Image.png" 
        alt="Representation plat"
        width="400" >-->
        <h3>Rechercher un plat :</h3>
        <input type="text" id="searchInput" placeholder="Rechercher un plat...">
        <div id="resultats"></div>
</section>

<?php require_once __DIR__ .'/includes/footer.php'?>
    
</body>
</html>