
    <?php require __DIR__ . '/includes/header.php'; ?> 

    <h1>Commande à traiter </h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Adresse</th>
                <th>Nb Personnes</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php /** @var array $commandes */?>
            <?php foreach ($commandes as $commande):?>
                <tr>
                    <td><?= $commande['idCommande']; ?></td>
                    <td><?= $commande['adresseLivraison']; ?></td>
                    <td><?= $commande['nbPersonnes']; ?></td>
                    <td><?= $commande['statut']; ?></td>
                    <td>
                        <?php if ($commande['statut'] === 'en_attente'): ?>
                            <form method="POST" action="/employe/commandes/prepare">
                                <input type="hidden" name="id" value="<?=  $commande['idCommande']; ?>">
                                <button type="submit"> Préparee</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    
    <?php require __DIR__ . '/includes/footer.php'; ?>