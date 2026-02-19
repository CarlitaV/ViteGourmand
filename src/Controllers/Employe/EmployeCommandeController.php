<?php
namespace App\Controllers\Employe;

use App\Services\EmployeCommandeService;

class EmployeCommandeController{
    private $employeCommandeService;

    public function __construct()
    {
        $this->employeCommandeService = new EmployeCommandeService();
    }

//Affiche moi la liste ds commande
    public function index(){

        if ($_SESSION['role'] !=='employe'){
            die("Accès interdit");
        }

        $commandes = $this->employeCommandeService->getAllCommandes();

        require __DIR__ . '/../Views/OrderEmploye.php'; 

    }

    //Valider une commande

    public function valider(){
        if ($_SESSION['role'] !=='employe'){
            die ('Accès interdit');
        }

        $idCommande = $_POST['id'];

        $this->employeCommandeService->validerCommande($idCommande);

        header('Location: /employeCommandes');
        exit();
    }
}