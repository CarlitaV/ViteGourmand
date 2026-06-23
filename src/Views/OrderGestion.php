<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
    <title>Gestion des Commande</title>
</head>
<body>
    <?php require_once __DIR__ . '/includes/header.php'; ?> 

    <h1>Gestion des Commandes (Admin) </h1>

    <table class="adminTable">
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
            
        <?php
        /**@var array $commandes */
        ?>
            <?php foreach ($commandes as $commande):?>
                <tr>
                    <td><?= $commande['idCommande']; ?></td>
                    <td><?= $commande['idUser']; ?></td>
                    <td><?= $commande['totalHt']; ?></td>
                    <td><?= $commande['statut']; ?></td>
                    <td>
                        <?php if ($commande['statut'] !== 'validée'): ?>
                            <form method="POST" action="/admin/commandes/valider">
                                <input type="hidden" name="id" value="<?=  $commande['idCommande']; ?>">
                                <button class="btnValider" type="submit"> Valider</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
    <?php require_once __DIR__ . '/includes/footer.php'; ?> 
