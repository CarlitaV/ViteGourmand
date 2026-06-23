<?php
namespace App\Services;

use App\Repositories\Employe\CommandeRepository;

class EmployeCommandeService{
    private CommandeRepository $commandeRepository;

    public function __construct()
    {
        $this->commandeRepository = new CommandeRepository();

    }

    public function getAllCommandes() {
        return $this->commandeRepository->findAll();
    }

    public function validerCommande(int $id): bool{
        return $this->commandeRepository->updateStatut($id, 'validee');
    }
    public function preparerCommande(int $id): bool{
        return $this->commandeRepository->updateStatut($id, 'preparation');
    }
}