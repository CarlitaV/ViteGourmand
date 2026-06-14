<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="/asset/CSS/Styles.css">
</head>
<body>

<?php require_once __DIR__ .'/includes/header.php'?>

<form id="formAvis">
    <textarea name="commentaire"></textarea>
    <input type="number" name="note" min="1" max="5">
    <button class="btnEnvoyer">Envoyer</button>
</form>

<?php require_once __DIR__ .'/includes/footer.php'?>
<script src="/asset/JS/script.js"></script>
</body>
</html>