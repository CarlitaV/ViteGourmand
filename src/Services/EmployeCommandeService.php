<?php
namespace App\Services;

use App\Repositories\Employe\CommandeRepository;

class EmployeCommandeService{
    private $commandeRepository;

    public function __construct()
    {
        $this->commandeRepository = new CommandeRepository();

    }

    public function getAllCommandes() {
        return $this->commandeRepository->findAll();
    }

    public function validerCommande($id){
        return $this->commandeRepository->updateStatut($id, 'validee');
    }
}