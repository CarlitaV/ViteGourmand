<?php

namespace App\Repositories;

use App\Config\Database;
use PDO;

class PlatRepository{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function findByName(string $keyword) {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM Plat WHERE titre LIKE ? "
        );
        $stmt->execute(["%$keyword%"]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function findById(int $id): ?array{
        $stmt = $this->pdo->prepare(
            "SELECT * FROM Plat WHERE idPlat = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findAll() : array{
        $stmt = $this->pdo->query
        ("SELECT * FROM Plat"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStock( int $idPlat){
        $stmt = $this->pdo->prepare( "SELECT stockDisponible FROM Plat WHERE idPlat = ?");

        $stmt->execute([$idPlat]);

        $result = $stmt->fetch();

        return $result ? $result['stockDisponible'] : 0;
    }

    public function getPrice(int $idPlat){
        $stmt = $this->pdo->prepare("SELECT prix FROM Plat WHERE idPlat = ?");

        $stmt->execute([$idPlat]);

        $result = $stmt->fetch();

        return $result ? $result['prix'] : 0;
    }

    public function decrementStock(int $idPlat){
        $stmt = $this->pdo->prepare(
            //Fait moi la maj des stocks
            "UPDATE Plat
            SET stockDisponible = stockDisponible - 1
            WHERE idPlat = ?");

            $stmt->execute([$idPlat]);

    }
}