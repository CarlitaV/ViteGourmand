<?php

namespace App\Repositories;

use App\Config\Database;
use PDO;

class OrderRepository{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function insertOrder(
        string $adresseLivraison,
        int $idUser,
        int $nbPersonnes,
        string $statut,
        float $totalHt, 
        float $totalTtc,
        string $numeroSuivi

        ):void{
        $stmt = $this->pdo->prepare(
            "INSERT INTO Commande (
            adresseLivraison, 
            idUser, 
            nbPersonnes, 
            statut,
            totalHt, 
            totalTtc,  
            numeroSuivi
            ) 
            VALUE (?, ?, ?, ?, ?, ?, ?) "
        );

        $stmt->execute([$adresseLivraison, $idUser, $nbPersonnes, $statut, $totalHt, $totalTtc, $numeroSuivi]);
    }
}