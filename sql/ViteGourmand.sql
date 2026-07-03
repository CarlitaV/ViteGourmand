CREATE DATABASE IF NOT EXISTS ViteGourmand;
USE ViteGourmand;

/*Table des Roles Admin, Employé et Client */
CREATE TABLE Role(
    idRole INT AUTO_INCREMENT PRIMARY KEY, 
    libelle ENUM('user','admin', 'employe') NOT NULL DEFAULT 'user'
    );

CREATE TABLE Utilisateur(
    idUser INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    motDePasse VARCHAR(255) NOT NULL,
    numTelephone VARCHAR(20),
    adresse VARCHAR(255),
    ville VARCHAR(100),
    idRole INT NOT NULL,
    FOREIGN KEY (idRole) REFERENCES Role(idRole)
);

CREATE TABLE Menu(
    idMenu INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description VARCHAR(255),
    prixPersonnel DECIMAL(10, 2),
    valide BOOLEAN DEFAULT TRUE
);

CREATE TABLE Commande(
    idCommande INT AUTO_INCREMENT PRIMARY KEY,
    dateCommande DATETIME DEFAULT CURRENT_TIMESTAMP,
    datePrestation DATETIME,
    adresseLivraison VARCHAR(255),
    nbPersonnes INT NOT NULL,
    statut VARCHAR(50) DEFAULT 'en attente',
    totalHt DECIMAL(10,2),
    idUser INT NOT NULL,
    Foreign Key (idUser) REFERENCES Utilisateur(idUser)
);

CREATE TABLE LigneCommande(
    idLigne INT AUTO_INCREMENT PRIMARY KEY,
    idCommande INT NOT NULL,
    idMenu INT NOT NULL,
    quantite INT NOT NULL,
    prixUnitaire DECIMAL(10,2),
    Foreign Key (idCommande) REFERENCES Commande(idCommande),
    Foreign Key (idMenu) REFERENCES Menu(idMenu)

);

CREATE TABLE Plat(
    idPlat INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(150) NOT NULL,
    description VARCHAR(255),
    prix DECIMAL(10,2) NOT NULL,
    photo VARCHAR(255),
    stockDisponible INT DEFAULT 0
);

CREATE Table Allergene(
    idAllergene INT AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(100) NOT NULL
    
);

CREATE TABLE Plat_Allergene(
    idPlat INT NOT NULL,
    idAllergene INT NOT NULL,
    PRIMARY KEY (idPlat, idAllergene),
    FOREIGN KEY (idPlat) REFERENCES Plat(idPlat),
    FOREIGN KEY (idAllergene) REFERENCES Allergene(idAllergene)
);

CREATE TABLE Avis(
    idAvis INT AUTO_INCREMENT PRIMARY KEY,
    note INT NOT NULL CHECK (note BETWEEN 1 AND 5),
    commentaire TEXT,
    statut VARCHAR(50) DEFAULT 'en attente',
    idUser INT NOT NULL,
    idPlat INT NOT NULL,
    dateAvis DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idUser) REFERENCES Utilisateur(idUser),
    FOREIGN KEY(idPlat) REFERENCES Plat(idPlat)
);

CREATE TABLE Contact(
    idContact INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telephone VARCHAR(20),
    message TEXT NOT NULL,
    dateContact DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Role (libelle) 
VALUES
    ('user'),
    ('admin'),
    ('employe');

INSERT INTO Plat(titre,description,prix,photo,stockDisponible)
VALUES
    ('Filet de boeuf','Sauce forestière',24.90,'boeuf.jpg',20),
    ('Saumon grillé','Légumes de saison',18.90,'saumon.jpg',20),
    ('Risotto aux champignons','Crémeux parmesan',15.90,'risotto.jpg',20),
    ('Burger Gourmet','Frites maison',16.90,'burger.jpg',20),
    ('Salade César','Poulet croustillant',13.90,'salade.jpg',20);

INSERT INTO Menu(titre,description,prixPersonnel,valide)
VALUES
    ('Menu Midi','Entrée + Plat',19.90,TRUE),
    ('Menu Gourmet','Entrée + Plat + Dessert',29.90,TRUE);

INSERT INTO Allergene(libelle)
VALUES
    ('Gluten'),
    ('Lait'),
    ('Oeuf'),
    ('Poisson'),
    ('Arachides');

INSERT INTO Plat_Allergene(idPlat,idAllergene)
VALUES
    (2,4),
    (3,2),
    (4,1),
    (5,3);

INSERT INTO Utilisateur(nom,prenom,email,motDePasse,idRole)
VALUES
    ('Admin',
    'ViteGourmand', 
    'admin@vitegourmand.fr',
    '$2y$10$9O69TIhKO1BKIwey2n.bWuZpWpCNW0Oi9Bt3L2F4mAArXp0FWTSk2',
    2
    );

INSERT INTO Utilisateur(nom,prenom,email,motDePasse,idRole)
VALUES
    ('Employe',
    'Test', 
    'employe@vitegourmand.fr',
    '$2y$10$ENNbpOeg47335RHLwQeXtuqxKvDM3wMBZwRUWUydLCgLZfdD1bTeq',
    3
    );

INSERT INTO Utilisateur(nom,prenom,email,motDePasse,idRole)
VALUES
    ('Client',
    'Test', 
    'client@vitegourmand.fr',
    '$2y$10$G3Ed5B2Zt8uuXO7E.Qk3l.s4A8n0IFAF6jSyHEEK4Zn7GiKgGtRl.',
    1
    );

