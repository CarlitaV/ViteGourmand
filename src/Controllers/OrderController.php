<?php

namespace App\Controllers;

use App\Services\OrderService;

class OrderController{
    private OrderService $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }
    public function store(){
        // Recuperation des données du formulaire
        $idUser = $_SESSION['idUser']; 
        $idPlat = $_POST['idPlat'];
        $nbPersonnes = $_POST['nbPersonnes'];
        $adresse = $_POST['adresse'];
        $modePaiement = $_POST['modePaiement'];

        // Fait apel au service orderservice
        $result = $this->orderService->createOrder(
            $idUser,
            $idPlat,
            $nbPersonnes,
            $adresse,
            $modePaiement 
        );

        //Affichage dse vues
        if ($result['success']){
            require __DIR__ . '/../Views/OrderSucces.php';
        }else{
            $error = $result['message'];
            require __DIR__ . '/../Views/OrderError.php';
        }
    }
}