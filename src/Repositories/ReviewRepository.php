<?php
namespace App\Repositories;

use App\Config\Database;
use PDO;

class ReviewRepository{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function insertReview(
        int $idUser,
        string $statut, 
        string $commentaire):void{

        $stmt = $this->pdo->prepare(
            "INSERT INTO avis (idUser, statut, commentaire) VALUES (?, ?, ?)"
        );


    $stmt->execute([$idUser, 'en_attente', $commentaire]);
    }  
}
