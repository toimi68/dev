-- Lister tous les services :
SELECT service FROM employes;

--lister tous les services sans doublons:

 SELECT DISTINCT service FROM employes;

-- Lister tous les salariés avec un salaire entre 3000-4000 :
SELECT prenom,nom FROM employes WHERE salaire BETWEEN 3000 AND 4000;
-- il ne faut pas avoir accès à l'id et ne jamais le montrer,c'est une donnée sensible.

-- Lister tous les salariée  avec un nom commençant par la lettre "c" :
SELECT nom FROM employes WHERE nom LIKE  'c%';

-- lISTER tous les salariée avec un nom qui contient la lettre "c" :
SELECT nom FROM employes WHERE nom LIKE '%c%';

-- lister toutes les salariées :

 SELECT nom, prenom FROM employes WHERE sexe = 'f';

-- Lister tous les salariés entrer dans l'entreprise avant le 2005-01-01:
 
SELECT nom, prenom FROM employes WHERE date_embauche <= '2005_01_01';

SELECT nom,prenom, date_embauche FROM employes WHERE date_embauche <= '2005-01-01';

-- Afficher tout les salariées embauché avant 2005-01-01:
SELECT prenom,nom,date_embauche FROM employes WHERE date_embauche <='2005-01-01' AND sexe ='f';

--Supprimer tous les salariés en CDI:
DELETE id_employés FOR employes WHERE status ='cdi'; --table cdi à rajouter

-- Afficher tous les salariés pour chaque services (pas de doublon):
SELECT nom,prenom,service FROM employes; -- affiche tt les salaries et leur services
SELECT DISTINCT nom,prenom, service FROM employes;
SELECT DISTINCT nom,prenom, service FROM employes ORDER BY service;
SELECT COUNT(nom),service FROM employes GROUP BY service;
--Afficher les salarié par le SEXE:

SELECT nom,prenom,sexe FROM employes; --affichera tt les noms,prénom de la table et leur SEXE.