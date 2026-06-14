<?php
namespace App\Controllers\Employe;

use App\Services\EmployeCommandeService;

class EmployeCommandeController{
    private EmployeCommandeService $employeCommandeService;

    public function __construct()
    {
        $this->employeCommandeService = new EmployeCommandeService();
    }

//Affiche moi la liste ds commande
    public function index(){

        if (!isset($_SESSION['role']) || $_SESSION['role'] !=='employe'){
            die("Accès interdit");
        }

        $commandes = $this->employeCommandeService->getAllCommandes();

        require __DIR__ . '/../../Views/OrderEmploye.php'; 

    }

    //Valider une commande

    public function valider(){
        if (!isset($_SESSION['role']) || $_SESSION['role'] !=='employe'){
            die ('Accès interdit');
        }

        $data = json_decode(
            file_get_contents('php://input'), true
        );

        $idCommande = $data['id'] ?? null;

        $this->employeCommandeService->validerCommande($idCommande);

        header('Location: /employe/Commandes');
        exit();
    }
}