<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commande</title>
</head>
<body>
    <h1>Gestion des Commandes (Admin) </h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Total</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande):?>
                <tr>
                    <td><?= $commande['idCommande']; ?></td>
                    <td><?= $commande['idUser']; ?></td>
                    <td><?= $commande['total']; ?></td>
                    <td><?= $commande['statut']; ?></td>
                    <td>
                        <?php if ($commande['statut'] !== 'validée'): ?>
                            <form method="POST" action="/admin/valider">
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