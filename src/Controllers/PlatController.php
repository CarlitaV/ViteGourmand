<?php
namespace App\Controllers;

use App\Services\PlatService;

class PlatController{
    private $platService;

    public function __construct()
    {
        $this->platService = new PlatService();
    }

    public function search(){
        $keyword = $_GET['keyword']; //keyword met cles dans la barre de recherche
        $plats = $this->platService->searchPlat($keyword);

        require __DIR__ . '/../Views/PlatListe.php'; 
    }
}