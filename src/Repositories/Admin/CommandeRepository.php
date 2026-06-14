<?php

namespace App\Repositories\Admin;

use App\Config\Database;
use PDO;

class CommandeRepository{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function updateStatut(
        int $id, 
        string $statut){
        $stmt = $this->pdo->prepare("UPDATE Commande SET statut = ? WHERE idCommande = ?");
        return $stmt->execute([$statut, $id]);
    }

    public function findAll(){
        $stmt = $this->pdo->query("SELECT * FROM Commande ORDER BY idCommande DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}