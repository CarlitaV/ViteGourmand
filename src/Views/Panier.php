<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
</head>
<body>
    
<?php require_once __DIR__ .'/includes/header.php'?>
<h2>Mon panier</h2>

<?php foreach($panier as $id): ?>
    <div class="card">
        <p>Produits ID : <?=$id ?></p>
        <p>Quantité : <?=$quantite ?></p>
    </div>
<?php endforeach; ?>

<?php require_once __DIR__ .'/includes/footer.php'?>
<script src="/asset/JS/script.js"></script>
</body>
</html>