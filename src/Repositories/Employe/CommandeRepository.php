<?php

namespace App\Repositories\Employe;

use App\Config\Database;

class CommandeRepository{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function updateStatut($id, $statut){
        $stmt = $this->pdo->prepare("UPDATE commande SET statut = ? WHERE idCommande = ?");
        return $stmt->execute([$statut, $id]);
    }

    public function findAll(){
        $stmt = $this->pdo->query("SELECT * FROM commande ORDER BY idCommande DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}