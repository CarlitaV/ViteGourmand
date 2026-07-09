<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
</head>
<body>

<?php require_once __DIR__ .'/includes/header.php'?>
<section>

    <h2>Vous pouvez donner votre avis :</h2>
    <?php if(isset($_SESSION['idUser'])): ?>

    <form id="formAvis" action="/review" method="POST">
        <textarea name="commentaire" required></textarea>
        <h3>Donner une note sur 5</h3>
        <input type="hidden" name="idPlat" value="1">
        <input type="number" name="note" min="1" max="5" required>
        <button class="btnEnvoyer" type="submit">Envoyer</button>
    </form>

    <?php else : ?>
    <p>Vous devez être connecté pour laisser un avis.</p>
    <a href="/connexion">Se connecter</a>
    <?php endif; ?>
    
</section>
<?php require_once __DIR__ .'/includes/footer.php'?>
</body>
</html>