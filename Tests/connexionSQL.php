<?php
// Code pour tester la connection avec ma base de donnée database.php
/*
try{
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8mb4",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
        );
} catch (PDOException $e){
    die("Erreur connexion DB : " . $e->getMessage());
}*/



 //-----------------Afficher mes tables index.php
 /*
$stmt = $pdo->query("SHOW TABLES");
$tables = $stmt->fetchAll();

echo"<pre>";
print_r($tables);*/