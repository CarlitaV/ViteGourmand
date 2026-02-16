<?php

namespace App\Repositories;

use App\Config\Database;

class PlatRepository{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function findByName($keyword) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM plat WHERE titre LIKE ? "
        );
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getStock($idPlat){
        $stmt = $this->pdo->prepare( "SELECT stockDisponible FROM plat WHERE idPlat = ?");

        $stmt->execute([$idPlat]);

        $result = $stmt->fetch();

        return $result ? $result['stockDisponible'] : 0;
    }

    public function getPrice($idPlat){
        $stmt = $this->pdo->prepare("SELECT prix FROM plat WHERE idPlat = ?");

        $stmt->execute([$idPlat]);

        $result = $stmt->fetch();

        return $result ? $result['prix'] : 0;
    }

    public function decrementStock($idPlat){
        $stmt = $this->pdo->prepare(
            //Fait moi la maj des stocks
            "UPDATE plat SET stock = stock = 1 WHERE idPlat = ?");

            $stmt->execute([$idPlat]);

    }
}