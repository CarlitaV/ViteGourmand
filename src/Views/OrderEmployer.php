<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande à traiter</title>
</head>
<body>
    <h1>Commande à traiter </h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Plat</th>
                <th>Quantité</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande):?>
                <tr>
                    <td><?= $commande['idCommande']; ?></td>
                    <td><?= $commande['idPlat']; ?></td>
                    <td><?= $commande['ndPersonnes']; ?></td>
                    <td><?= $commande['statut']; ?></td>
                    <td>
                        <?php if ($commande['statut'] !== 'en attente'): ?>
                            <form method="POST" action="/employe/valider">
                                <input type="hidden" name="id" value="<?=  $commande['idCommande']; ?>">
                                <button type="submit"> Valider</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
</body>
</html>