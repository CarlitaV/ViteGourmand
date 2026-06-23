<?php
namespace App\Controllers;

class HomeController{
    public function index(){
        require __DIR__ . '/../Views/home.php';
    }

    public function apropos(){
        require __DIR__ . '/../Views/APropos.php';
    }
}