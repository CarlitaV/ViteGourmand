<?php
namespace App\Controllers\Admin;

use App\Services\AdminCommandeService;

class AdminCommandeController{
    private AdminCommandeService $adminCommandeService;

    public function __construct()
    {
        $this->adminCommandeService = new AdminCommandeService();
    }

//Affiche moi la liste ds commande
    public function index(){

        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
            die("Accès interdit");
        }

        $commandes = $this->adminCommandeService->getAllCommandes();

        require __DIR__ . '/../../Views/OrderGestion.php';

    }

    //Valider une commande

    public function valider(){
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
            die ('Accès interdit');
        }

        $idCommande = (int)($_POST['id'] ?? 0);

        $this->adminCommandeService->validerCommande($idCommande);
        header('Location: /admin/commandes');

        exit();
    }

    //Affiche les stats
    public function stats(){
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
            die('Accès interdit');
        }
        require __DIR__ .'/../../Views/stats.php';
    }
}
