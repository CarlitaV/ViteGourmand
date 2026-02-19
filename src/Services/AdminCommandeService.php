<?php

namespace App\Services;

use App\Repositories\Admin\CommandeRepository;

class AdminCommandeService{
    private $commandeRepository;

    public function __construct()
    {
        $this->commandeRepository = new CommandeRepository();
    }

    public function getAllCommandes(){
        return $this->commandeRepository->findAll();
    }

    public function validerCommande($id){
        return $this->commandeRepository->updateStatut($id, 'valide');
    }
}