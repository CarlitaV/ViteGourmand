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
        int $idUser,
        string $adresseLivraison,
        int $nbPersonnes,
        float $totalHt, 
        ):void{
        $stmt = $this->pdo->prepare(
            "INSERT INTO Commande (
            adresseLivraison, nbPersonne, statut, totalHt, idUser) VALUE (?, ?, ?, ?, ?) "
        );

        $stmt->execute([$idUser, $adresseLivraison, $nbPersonnes, $totalHt, 'en_attente']);
    }
}