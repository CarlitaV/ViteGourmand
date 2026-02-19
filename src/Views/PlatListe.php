<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de recherche</title>
</head>
<body>
    <h1>Resultats de votre recherche</h1>
    <?php if (!empty($plats)) : ?>
        <ul>
            <?php foreach ($plats as $plat) : ?>
                <li>
                    <strong><?= htmlspecialchars(($plat['nom'])) ?></strong>
                    <?= htmlspecialchars($plat['description']) ?>
                    <?=  htmlspecialchars($plat['prix']) ?> €
                </li>

            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <a href="/accueil">Retour</a>

    
</body>
</html>