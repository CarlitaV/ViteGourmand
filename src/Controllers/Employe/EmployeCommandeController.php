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

    public function prepare(){
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employe') {
            die('Accès interdit');
        }

        $idCommande = (int)($_POST['id']  ?? 0);
        if ($idCommande > 0){
            $this->employeCommandeService->preparerCommande($idCommande);
        }

        header('Location: /employe/commandes');
        exit();
    }
}