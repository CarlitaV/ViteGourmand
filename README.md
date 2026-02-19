# ViteGourmand
Application web Vite & Gourmand PHP, MySQL, DOCKER et architecture MVC permettant de consulter, commander des menus traiteur, données sont avis, et gestion des utilisateurs et leurs roles (Admin, Employé, Utilisateur).

# Fonctionnalités de l'application
Client :
 - Inscription, connexion, déconnexion
 - Passer des commandes
 - Laisser des avis
 - Rechercher des plats

Employé :
 - Voir les commandes à preparer
 - Valider lescommandes

Admin :
 - Voir toutes les commandes
 - Valider les commandes
 - Gestion des menus et plats

# Technologie & outils utiliser
 - PHP 8.3 + PDO
 - MYSQL 8
 - DOCKER & Docker compose
 - phpmyadmin
 - Composer pour dependances PHP
 - Architecture MVC (Controllers / Services / Repositories / Views)

# Installation & Setup
 - GitHub (git clone <repo>)
 - Installation des dépendances (composer)
   *docker-compose app composer install
 - lancer Docker 
   *docker-compose up -d
 - Accéder au site et à phpMyAdmin
   *Http://localhost:8080

# Arborésance de mon projet
public/
sql/
src/
    Config/
    Controllers/
    Repositories/
    Routes/
    Security/
    Services/
    Views/
.env
.gitignore
composer.json
composer.lock
docker-compose.yml
dockerfile

# Gestiondes roles & securité
Cette aplication utilisa un système de session pour gérer l'authentification des utilisateurs.

Chaque utilisateur a un role defini :
 - Admin : a un accès complt à toutes les commandes validation de commande et gestion des plats
 - Employé : a accès uniquement aux commandes à preparer et a la posibilité de valider le statut d'une commande
 - Client : peut passer des commandes et laisser des avis  sur les plats.

 Le rôle de l'utilisateur est stoké dans '$_SESSION['role']' apres la connexion. Les controleurs verifient ce role avant d'autoriser l'accès au pages ou fonctionnalités sensibles.

# REST A FAIRE 
 Par la suite j'intégrerais les tokens CSRF pour sécuriser les formulaires et empecher les attaques de type cross-site request forgery.
 - Validation plus poussé ds formulaires 
 - Emails automatisé apres commande
 - Interface responsive complète
 - Tests unitaires
 - Deploiement de l'application
 - CSS et JS pour le visuelle et le dynamisme.
 - NoSQL pour les statistiques tableau de bord

# Ressources en lien avec mon projet
- Trello : 
- Figma 
- Draio




