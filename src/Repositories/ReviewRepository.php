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
        int $idPlat, 
        string $commentaire,
        int $note):void{

        $stmt = $this->pdo->prepare(
            "INSERT INTO Avis (idUser, idPlat,statut, commentaire, note) 
            VALUES (?, ?, ?, ?, ?)"
        );


    $stmt->execute([$idUser,$idPlat, 'en_attente', $commentaire, $note]);
    }  
}
