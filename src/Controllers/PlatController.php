<?php
namespace App\Controllers;

use App\Services\PlatService;
use App\Repositories\PlatRepository;

class PlatController{
    private PlatService $platService;
    private PlatRepository $platRepository;

    public function __construct()
    {
        $this->platService = new PlatService();
        $this->platRepository = new PlatRepository();
    }

    public function menu(){
        $plats = $this->platService->getAllPlats();
        require __DIR__ . '/../Views/Menu.php';
    }
    
    public function search(){
        $keyword = $_GET['keyword'] ??''; //keyword met cles dans la barre de recherche
        $plats = $this->platService->searchPlat($keyword);

        header('Content-Type: application/json');

        echo json_encode($plats);
    } 

    //Affichage du panier
    public function panier(){
        $panier = $_SESSION['panier'] ?? [];
        $plats = [];

        foreach($panier as $idPlat => $quantite){
            $plat = $this->platRepository->findById($idPlat);
            $plat['quantite'] = $quantite;

        $plats[] = $plat;
        }
        require __DIR__ . '/../Views/Panier.php';
    }

    //Ajouter au panier
    public function addToCart(){
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id'] ?? null;

        if(!$id){
            echo json_encode(["error"=>"ID manquant"]);
            return;
        }

        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = [];
        }

        if(isset($_SESSION['panier'][$id])){
            $_SESSION['panier'][$id]++;
        } else {
            $_SESSION['panier'][$id] = 1;
        }

        echo json_encode(["success"=>true]);
    }

    public function deleteFromCart():void{
        $idPlat = $_POST['idPlat'];

        unset($_SESSION['panier'][$idPlat]);

        header('Location: /panier');
        exit();
    }
}