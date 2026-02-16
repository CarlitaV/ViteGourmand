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
    statut VARCHAR(50),
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
    note INT CHECK (note BETWEEN 1 AND 5),
    commentaire VARCHAR(500),
    statut VARCHAR(50),
    idUser INT NOT NULL,
    FOREIGN KEY (idUser) REFERENCES Utilisateur(idUser)
);


