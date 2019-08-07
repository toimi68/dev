--- Connexion a la BDD ---

mysql -u root -p--- Afficher les BDD ---

SHOW DATABASES;--- Creer une BDD ---

CREATE DATABASE nom_de_la_BDD;--- Selectionner une BDD ---

USE nom_de_le_BDD;--- Création d'une TABLE dans la BDD ---

-- Type de donnée( INT, VARCHAR, TEXT, FLOAT ...)

CREATE TABLE fruit (id_fruit INT(3), nom VARCHAR(60), origine VARCHAR(50), calibre INT(1),  prix FLOAT, categorie VARCHAR(20));--- Afficher toutes les tables ---

SHOW TABLES--- Insertion dans la BDD ---

INSERT INTO nom_de_la_TABLE ('1', 'pomme', 'France', '5', '12.50' , 'Golden');--- Selectionner toutes les données d'une table ---

SELECT * FROM nom_de_la_table;---Selectionner les données d'une ou plusieurs colonnes specifiques d'une table ---

SELECT nom_de_la_colonne, nom_de_la_colonne FROM nom_de_la_table;--- Supprimer une ligne de la table avec une condition ---

DELETE FROM nom_de_la_table WHERE 'condition';--- Supprimer tout le contenu d'une table ---

DELETE FROM nom_de_la_table; :!\ si vous faite ça vous effacerez tout le contenu de la table /!\--- Mettre a jour une colonne d'une table ---

UPDATE nom_de_la_table SET nom_colonne 'condition';

ex: UPDATE fruit SET calibre = '4' WHERE id_fruit = '2';--- Mettre a jour plusieurs colonnes d'une table ---

UPDATE nom_de_la_table SET nom_colonne , nom_de_la_colonne WHERE 'condition';

ex: UPDATE fruit SET origine= 'Espagne', calibre ='4', prix ='3.99' WHERE id_fruit= '2';--- Ajouter une colonne a une table ---

ALTER TABLE nom_de_la_table ADD nom_de_la_colonne;--- Operateur de comparaison ---

= :Egale
<> :Pas Egale
!= :Pas Egale
> :Superieur
< :Inferieur
=> :Superieur ou égale à
<= :Inferieur ou égale à
IN :Liste de plusieur valeurs possibles
BEETWEEN : recherche des valeurs comprises dans un interval donné (utile pour les nombres ou dates)
LIKE : recherche en specifiant le debut, le milieu ou la fin d'un mot
IS NULL :valeur est nulle
IS NOT NULL : valeur n'est pas nulle

------------------------------------------EXERCICE-------------------------------

-- Selectionner des données entre (BETWEEN) un interval (fonctionne dans uine requete utilisant WHERE) ---
ex: SELECT * FROM bonbons WHERE id_bonbon BETWEEN 3 and 6

-- AFFicher les données par rapport à une valeur --
SELECT nom_colonne FROM nom_de_la_table WHERE nom_colonne ='valeur';
ex:  SELECT prenom FROM stagiaires WHERE yeux = 'marron';
autre : SELECT * FROM stagiaires WHERE yeux = 'marron';

-- Afficher les données dans un ordre défini --
SELECT * FROM stagiaires WHERE yeux= 'marron' ORDER BY prenom;

-- Afficher les données dans l'ordre décroissant --
SELECT * FROM stagiaires WHERE yeux= 'marron' ORDER BY prenom DESC;

-- Afficher Tous les stagiaires dont le prénom commencent par L --
SELECT * FROM stagiaires WHERE prenom LIKE 'L%';

-- Afficher ls stagiaires dont le prénom se terminent par n --
SELECT * FROM stagiaires WHERE prenom LIKE '%N';

-- Afficher les stagiaires dont le prénom contient un a --
SELECT * FROM stagiaires WHERE prenom LIKE '%a%';

-- Afficher les stagiaires dont le prénom commence par J et qui contient un 'a' et se terminent par 'n'
SELECT * FROM stagiaires WHERE prenom LIKE 'J%a%n';

-- Afficher un nombre limité de données --
SELECT * FROM stagiaires LIMIT 2; 

-- Afficher un nombre limité de données en sautant des lignes --
SELECT * FROM stagiaires LIMIT 1,2;
(le premier chiffre après LIMIT représente l'offset,donc le nombre de ligne ignoré. Le second chiffre correspond au nombres de données à afficher)

-- Modifier le nom d'une colonne --
ALTER TABLE nom_de_la_table CHANGE ancien_nom_colonne nouvea_nom_colonne


 ---------------------------------------EXERCICES----------------------------------

 -- Exercice: Créé une base de données magasin

-- Créé une table produit qui contient les colonnes suivantes:

-- id -> INT PRIMARY KEY AUTO_INCREMENT NOT NULL

CREATE TABLE magasin (id INT(3) PRIMARY KEY AUTO_INCREMENT NOT NULL);

-- nom_produit -> débrouillez-vous

-- catégorie_produit -> débrouillez-vous

-- reference_produit -> débrouillez-vous

-- prix_produit -> débrouillez-vous

-- stock_produit -> débrouillez-vous

-- date_ajout -> débrouillez-vous

-- Insérer au moins 20 produits

-- Afficher tous les produits classé du plus récent au plus ancien

-- Afficher les 10 premiers produits

-- Afficher les 10 derniers produits

-- Ajouter une colonne date_vente

-- Afficher les produits entre 2 date de vente

-- Afficher les 10 derniers produits

-- Afficher les 10 produits du milieu

-- Afficher les produits commencent par une lettre spécifique



