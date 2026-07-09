<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
    <title>Mes Statistiques</title>
</head>
<body>

<?php require_once __DIR__.'/includes/header.php'; ?>

<?php

$stats = json_decode(
    file_get_contents(__DIR__ . '/../storage/stats.json'
    ), 
    true
); ?>

<h2>Statistiques</h2>

<p>Total des commandes :
    <?=  $stats['totalCommandes']; ?></p>

<p>Total avis :
    <?= $stats['totalAvis']; ?>
</p>

<p>Plats vendu :</p>

<ul>
    <?php foreach($stats['platsVendus'] as $plat => $nb): ?>
    <li><?= $plat ?> : <?= $nb ?></li>
    <?php endforeach; ?>
</ul>

<?php require_once __DIR__.'/includes/footer.php'; ?>
</body>
</html>