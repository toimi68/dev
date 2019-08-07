-- Exercice: Créé une base de données magasin

CREATE DATABASE magasin;

-- Créé une table produit qui contient les colonnes suivantes:

-- id -> INT PRIMARY KEY AUTO_INCREMENT NOT NULL

CREATE TABLE voitures(id_car INT (3) PRIMARY KEY AUTO_INCREMENT NOT NULL, marque VARCHAR (50), model VARCHAR(60), couleur VARCHAR(30), prix FLOAT, date_vente DATE)-- DATE gère les dates ici annee-mois-jour-- 

-- nom_produit -> débrouillez-vous

 type =>VARCHAR

-- catégorie_produit -> débrouillez-vous

type => VARCHAR

-- reference_produit -> débrouillez-vous

type => VARCHAR

-- prix_produit -> débrouillez-vous

type => INT / FLOAT

-- stock_produit -> débrouillez-vous

type => INT

-- date_ajout -> débrouillez-vous

type => DATE -- a-m-j-- 

     => DATETIME -- a-m-j H-m-s --

     => TIMESTAMP -- les seconde ecoulé depuis 01-01-1970 --

     => TIME 

     => YEAR -1999--

-- Insérer au moins 20 produits

INSERT INTO voitures (marque, model,couleur, prix,date_vente) VALUES ('Lamborghini', 'Countach', 'blanc', '330000', '2018-02-30'); 

-- Afficher tous les produits classé du plus récent au plus ancien

SELECT*FROM voitures ORDER BY date_vente DESC;

-- Afficher les 3 premiers produits

SELECT*FROM voitures LIMIT 3;

-- Afficher les 2 derniers produits

SELECT*FROM voitures LIMIT 4,2;

-- Ajouter une colonne livraison

ALTER TABLE voitures ADD date_livraison DATE;

-- Afficher les produits entre 2 date de vente

SELECT*FROM voitures WHERE date_vente BETWEEN '2019-02-20' AND '2019-03-30';

-- Ajouter une date de livraison aux produits

UPDATE voitures SET date_livraison = '2019-09-01' WHERE id_car = 6;

-- Afficher les 4 produits du milieu

SELECT*FROM voitures LIMIT 1,4;

SELECT*FROM voitures WHERE id_car BETWEEN 2 AND 5;

-- Afficher les produits commencent par une lettre spécifique

SELECT*FROM voitures WHERE marque LIKE 'l%';