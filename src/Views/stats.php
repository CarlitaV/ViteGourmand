<?php

$stats = json_decode(
    file_get_contents(__DIR__ . '/../storage/stats.json'
    ), 
    true
); ?>

<h1>Statistiques</h1>

<p>Total des commandes :
    <?=  $stats['totalCommandes']; ?></p>

<p>Total avis :
    <?= $stats['totalAvis']; ?>
</p>

<p>Plats vendu :</p>

<pre>
    <?=  print_r($stats['platsVendus'], true); ?>
</pre>