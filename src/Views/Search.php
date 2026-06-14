<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
    <title>Recherche</title>
</head>
<body>
    <search>
        <form method="GET" action="/search">
            <input type="text" id="searchInput" name="keyword" placeholder="Recherche un plat">
            <button type="submit">Rechercher</button>
            <div id="resultats"></div>
        </form>

        <div class="plat_list">
            <?php foreach($plats as $plat): ?>
                <div class="card">
                    <h3><?= $plat['titre'] ?></h3>
                    <p><?=  $plat['prix'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </search>

</body>
</html>