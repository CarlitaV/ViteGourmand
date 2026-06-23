    
<?php require_once __DIR__ .'/includes/header.php'?>

<h2>Mon panier</h2>

<?php /** @var array $plats */ ?>
<?php /*initialisation des variables*/
    $totalPanier = 0; 
    $tva = 0; 
    $totalTtc = 0;
    ?>
<?php foreach($plats as $plat): ?>

    <?php 
    $totalLigne = $plat['prix'] * $plat['quantite'];
    $totalPanier += $totalLigne;
    $tva = $totalPanier * 0.20;
    $totalTtc = $totalPanier + $tva;
    ?>

    <div class="card">

        <h3><?= htmlspecialchars($plat['titre']) ?></h3>
        <p><?= htmlspecialchars($plat['description']); ?></p>
        <p>Quantité : 
            <?= $plat['quantite'] ?></p>
        <p>Prix unitaire: 
            <?= $plat['prix'] ?> €</p>
        <p>Total HT : <?= $totalPanier ?></p>
        <p>TVA (20%) : <?= $totalPanier * .20 ?> € </p>
        <p>Total TTC : <?= $totalTtc ?> € </p>

        <form method="POST" action="/panier/delete">
            <input type="hidden"
            name="idPlat"
            value="<?= $plat['idPlat']; ?>">

            <button type="submit">Suprimer</button>
        </form>
    </div>
<?php endforeach; ?>

<h3>Total panier : <?= $totalTtc; ?> € </h3>
<form method="POST" action="/order">

    <label>Adresse de livraison :</label>
    <input type="text" name="adresse" required>

    <br><br>

    <label>Nombre de personnes :</label>
    <input type="number" name="nbPersonnes" min="1" required>

    <br><br>

    <label>Mode de paiement :</label>
    <select name="modePaiement">
        <option value="cb">Carte bancaire</option>
        <option value="paypal">Paypal</option>
    </select>

    <br><br>

    <!-- temporaire -->
    <input type="hidden" name="idPlat" value="<?= $plats[0]['idPlat'] ?? '' ?>">

    <button type="submit">
        Commander
    </button>

</form>

<?php require_once __DIR__ .'/includes/footer.php'?>
