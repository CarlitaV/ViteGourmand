<?php

//Chemin adsolu basé sur la racine du projet
namespace App\Config;
use Dotenv\Dotenv;

class Config{

    /** 
     * @param string $path le chemin vers le dossier contenant le fichier .env
    */

    public static function load($path = __DIR__ . '../'):void{
        //On va rechercher le dossier parent ou se trouve le .env
        $path = dirname(__DIR__, 2);

        //on verifie si le fichier .env existe avant de tenter de le charger
        if(file_exists($path . '/.env')){
            $dotenv = Dotenv::createImmutable($path);
            $dotenv->load();
        }
    }

    /**
     * @param string $key le nom de la variable 
     * @param mixed $default une valeur par défaut à retourner si la variable n'existe pas
     * @return mixed la valeur de la variable ou la valeur par defaut
     */

    public static function get(string $key, $default = null){
        return $_ENV[$key] ?? $default;
    }

}