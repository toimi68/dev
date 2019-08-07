-- Jointure interne ou INNER JOIN sert à lier plusieurs tables entre elles.
-- Cette commande retourne les enregistrments lorsqu'il y a au moins une ligne dans chaque colonne qui correspondent à la condition
SELECT * FROM nom_de_la_table INNER JOIN nom_de_la_table_2 ON condition;
-- OU
SELECT * FROM nom_de_la_table CROSS JOIN nom_de_la_table_2 WHERE condition;

-- CROSS JOIN sert à croiser chaque ligne d'un tableau A avec les lignes d'un tableau B. Retourne le produit (*) de ces 2 tableaux. En général la commande CROSS JOIN est combinée avec la commande WHERE pour filtrer les résultats qui respectent certaines conditions.

SELECT * FROM nom_de_la_table_1 CROSS JOIN nom_de_la_table_2;
-- Alternative à la commande CROSS JOIN
SELECT * FROM nom_de_la_table_1, nom_de_la_table_2;

/* 
LEFT JOIN permet de lister tous les enregistrements de la table gauche même si il n'y a pas de correspondances dans la 2ème table.
*/

SELECT * FROM nom_de_la_table_1 LEFT JOIN nom_de_la_table_2 ON condition;
-- OU
SELECT * FROM nom_de_la_table_1 LEFT OUTER JOIN nom_de_la_table_2 ON condition; 

/* 
RIGHT JOIN permet de lister tous les enregistrements de la table droite même si il n'y a pas de correspondances dans la 2ème table.
*/

SELECT * FROM nom_de_la_table_1 RIGHT JOIN nom_de_la_table_2 ON condition;
-- OU
SELECT * FROM nom_de_la_table_1 RIGHT OUTER JOIN nom_de_la_table_2 ON condition; 
