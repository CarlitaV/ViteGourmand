<?php

namespace App\Repositories;

use App\Config\Database;

class OrderRepository{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function insertOrder($idUser, $idPlat , $nbPersonnes, $total, $numeroSuivi){
        $stmt = $this->pdo->prepare(
            "INSERT INTO orders (user_id, plat_id, quantite, total, numero_suivi) VALUE (?, ?, ?, ?, ?) "
        );

        $stmt->execute([$idUser, $idPlat, $nbPersonnes, $total, $numeroSuivi]);
    }
}