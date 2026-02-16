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

        require './src/views/'; //------------------------------------------------A CREER platList.php
    }
}