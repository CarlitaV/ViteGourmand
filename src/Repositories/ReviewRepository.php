<?php
namespace App\Repositories;

use App\Config\Database;

class ReviewRepository{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function insertReview($idUser, $idPlat, $commentaire){
        $stmt = $this->pdo->prepare(
            "INSERT INTO avis (user_id, plat_id, comment) VALUES (?, ?, ?)"
        );


    $stmt->execute([$idUser, $idPlat, $commentaire]);
    }  
}
