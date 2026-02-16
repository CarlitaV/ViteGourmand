<?php

namespace App\Repositories;

use App\Config\Database;
use PDO; 

class UserRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function userExists($email, $utilisateur)
    {
        $stmt = $this->pdo->prepare(
            "SELECT id FROM utilisateur WHERE email = ? OR username = ?"
        );

        $stmt->execute([$email, $utilisateur]);

        return $stmt->fetch() ? true : false;
    }

    public function createUser($email, $utilisateur, $motDePasse) // A VERIFIER HASH OU PAS
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO utilisateurs (email, utilisateur, motDePasse)
            VALUES (?, ?, ?)"
        );

        $stmt->execute([$email, $utilisateur,$motDePasse]);
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM utilisateur WHERE email = ?"
        );

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}