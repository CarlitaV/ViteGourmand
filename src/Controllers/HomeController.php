<?php
namespace App\Controllers;

class HomeController{
    public function index(){
        require __DIR__ . '/../Views/Home.php';
    }

    public function apropos(){
        require __DIR__ . '/../Views/APropos.php';
    }
}