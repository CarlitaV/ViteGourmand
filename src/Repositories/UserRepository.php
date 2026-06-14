<?php

namespace App\Repositories;

use App\Config\Database;
use PDO; 

class UserRepository
{
    private  PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function userExists(
        string $email, 
        string $utilisateur)
    {
        $stmt = $this->pdo->prepare(
            "SELECT idUser FROM Utilisateur WHERE email = ? OR nom = ?"
        );

        $stmt->execute([$email, $utilisateur]);

        return $stmt->fetch() ? true : false;
    }

    public function createUser(
        string $email, 
        string $nom, 
        string $prenom, 
        string $motDePasse, 
        int $numTelephone, 
        string $adresse,
        string $ville)
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO Utilisateur 
            (email, nom, prenom, motDePasse, numTelephone, adresse,ville, idRole)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $stmt->execute([$email, $nom, $prenom, $motDePasse, $numTelephone, $adresse,$ville, 1]);
    }

    public function getUserByEmail(string $email)
    {
        $stmt = $this->pdo->prepare(

            //Selectionne toutes les colonnes de la table Utilisateur
            //et recupère le libellé du role depuis la table role
            //Joint la table pour recuperer le nom du role
            //en reliant la clé étrangere idRole
            //Enfin Fitre pour recuperer l'utilisateur associé a l'email
            "SELECT u.*, r.libelle AS role
            FROM Utilisateur u
            JOIN Role r on u.idRole = r.idRole
            WHERE email = ?"
        );

        $stmt->execute([$email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}