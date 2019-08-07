<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Entrainement PHP</title>
</head>
<body>
    <div class="container">
        <h2 class="display-4 text-center">Ecriture et affichage</h2><hr>
        <!-- Nous pouvons écrire du HTML dans un fichier ayant l'extension PHP, l'inverse n'est pas possible -->

        <?php // ouverture de la balise PHP
        // Il est possible d'ouvir la balise PHP autant de fois que l'on souhaite sur un fichier PHP

        echo 'Bonjour'; // echo est une instruction d'affichage que l'on peut traduire par 'affiche moi'

        echo '<br>'; // Nous pouvons également y mettre du HTML

        print 'Bonjour'; // print est une autre instruction d'affichage, pas de différence avec 'echo'

        echo '<hr><h2 class="display-4 text-center">Commentaires</h2><hr>';
        // fermeture de la balise PHP
        ?>
        <?= "Allo" ?><!-- le = remplace le 'echo' -->
        <strong>Bonjour</strong><!-- nous voyons qu'il est égalmement possible de fermer et ré-ouvrir PHP pour mélanger du code HTML&PHP -->

        <?php 
        echo 'Texte'; // ceci est un commentaire sur une seule ligne
        echo 'Texte'; /* ceci est un commentaire 
            sur plusieurs lignes
        */
        echo 'Texte'; # ceci est un commentaire sur une seule ligne

        echo '<hr><h2 class="display-4 text-center">Variables : Types / Declaration / Affectation</h2><hr>';
        // Une variable est un espace nommé permettant de conserver une valeur 

        // $2a -> erreur !! / $a2 -> OK
        // Caractère autorisés : A à Z / a à z / de 0 à 9 
        // pas d'accents, pas d'espaces
        $a = 127; // affectation de 127 dans la variable nommé "a"
        // gettype() est un fonction prédéfinie qui retourne le type d'une variable
        echo gettype($a); // il s'agit d'un entier : INTEGER
        echo '<br>';

        $b = 1.5;
        echo gettype($b); //  un nombre à virgule : DOUBLE
        echo '<br>';

        $c = "une chaine";
        echo gettype($c); // une chaine de caractères : STRING 
        echo '<br>';

        // Entre quotes c'est une chaine de caractères
        $d = '127';
        echo gettype($d); // une chaine de caractères : STRING 
        echo '<br>';

        $e = true;
        echo gettype($e); // BOOLEAN
        echo '<br>';

        $f = false;
        echo gettype($f); // BOOLEAN
        echo '<br>';

        echo '<hr><h2 class="display-4 text-center">Concaténation</h2><hr>';

        $x = "Bonjour ";
        $y = "Tout le monde !!";
        echo $x . $y . '<br>'; // point de concaténation que l'on peut traduire par 'suivi de'
        echo "$x $y <br>"; // entre guillemets, les varaibles sont évaluées
        echo '$x $y <br>'; // entre simple quote, les variables ne sont pas évaluées, c'est une chaine de caractère
        echo 'aujourd\'hui<br>'; // si il y a une apostrophe dans la chaine de caractère, nous plaçons un antislah pour dire que c'est bien une apostrophe
        echo "aujourd'hui<br>";
        echo "Hey ! " . $x . $y . '<br>'; // concaténation texte et variable
        echo "<br>" , "coucou" , "<br>"; // concaténation avec une virgule (la virgule et le point de concaténation sont similaire)

        echo '<hr><h2 class="display-4 text-center">Concaténation lors de l\'affectation</h2><hr>';

        $prenom1 = "Bruno";
        $prenom1 = "Claire";
        echo $prenom1 . '<br>'; // cela remplace "Bruno" par "Claire", donc affiche "Claire"

        $prenom2 = "Nicolas";
        $prenom2 .= " Marie";
        echo $prenom2 . '<br>'; // cela ajoute SANS remplacer la valeur précédente grace à l'opérateur .= , affiche 'Nicolas Marie'

        echo '<hr><h2 class="display-4 text-center">Constante et constante magique</h2><hr>';
        // Une constante tout comme variable permet de conserver une valeur mais comme son nom l'indique, la valeur est... constante!! On ne pourra pas changer sa valeur durant l'execution du script
        define("CAPITALE", "Paris"); // Par convention, une constante se déclare toujours en majuscule
        // define("Nom_de_la_constante", "valeur_de_la_constante")
        echo CAPITALE . '<br>';

        // define("CAPITALE", "Rome"); /!\ erreur !! il n'est pas possible de rédéclarer une constante déja définit

        // constante magique
        echo __FILE__ . '<br>'; // chemin complet vers le fichier
        echo __LINE__ . '<br>'; // affiche le numéro de la ligne
        // __FUNCTION__ / __CLASS__ / __METHOD__

        // Exo : afficher vert-jaune-rouge (avec les tirets) en mettant chaque couleur dans une variable, faites en sorte que chaque mot soit de la bonne couleur
        $vert = '<span class="text-success">vert</span>';
        $jaune = '<span class="text-warning">Jaune</span>';
        $rouge = '<span class="text-danger">rouge</span>';
        // $rouge = '<span style="color:red">rouge</span>';

        echo "$vert-$jaune-$rouge<br>";
        echo $vert . '-' . $jaune . '-' . $rouge . '<br>';
        
        echo '<hr><h2 class="display-4 text-center">opérateurs arithmétique</h2><hr>';
        $a = 10; $b = 2;

        echo $a + $b . '<br>'; // affiche 12 
        echo $a - $b . '<br>'; // affiche 8
        echo $a * $b . '<br>'; // affiche 20
        echo $a / $b . '<br>'; // affiche 5

        // opération / affectation
        $a += $b; // equivaut à $a = $a + $b
        echo $a . '<br>'; // affiche 12
        $a -= $b; // equivaut à $a = $a - $b
        echo $a . '<br>'; // affiche 10
        $a *= $b; // equivaut à $a = $a * $b
        echo $a . '<br>'; // affiche 20
        $a /= $b; // equivaut à $a = $a / $b
        echo $a . '<br>'; // affiche 10
        // contexte : pratique pour le calcul d'un panier

        echo '<hr><h2 class="display-4 text-center">Structures conditionnelles (if / else) - opérateurs de comparaison</h2><hr>';

        // Isset & empty
        $var1 = 0;
        $var2 = '';

        // empty test si une variable est à 0, si elle est vide ou non définie
        // Si la condition entre les parenthèses du IF est vérifiée, si elle retourne 'true', le code entre les accolades sera executée
        if(empty($var1))
        {
            echo "0, vide ou non définie<br>";
        }
        //-------------------------------------------------------------
        // isset test l'existence d'une variable
        if(isset($var2))
        {
            echo "var2 existe et est définie par rien<br>";
        }

        /*
        OPERATEURS DE COMPARAISON
        =       égal à 
        ==      comparaison de la valeur
        ===     comparaison de la valeur ert du type
        <       strictement inférieur à
        >       strictement supérieur à
        <=      inférieur ou égal à
        >=      supérieur ou égal à
        !       n'est pas
        !=      différent de
        || OR   OU
        && AND  ET
        XOR     condition exclusive
        */

        $a = 10; $b = 5; $c = 2;
        // if / else
        if($a > $b)
        {
            echo "A est bien supérieur à B<br>";            
        }
        else // cas par défaut, dans tout les autre cas, si la condition IF n'est pas vérifiée, c'est le code dans le else qui s'execute / else($b == 5) => /!\ erreur
        {
            echo "non c'est B qui est supérieur à A<br>";
        }

        // if / elseif / else
        if($a > $b && $b > $c)
        {
            echo "ok pour les 2 conditions<br>";
        }
        elseif($a == 9 || $b > $c)
        {
            echo "Ok pour au moins une des 2 conditions<br>";
        }
        else
        {
            echo "Tout le monde a faux !!<br>";
        }
        // ELSEIF permet d'ajouter des cas supplémentaire à la condition IF
        // Il peut y avoir plusieurs ELSEIF dans la même condition
        // Si une des conditions supérieures est vérifiée, ELSEIF bloque le script et toute les conditions suivantes ne seront pas évaluées.

        // Condition exclusive
        if($a == 10 XOR $b == 6)
        {
            echo 'ok condition exclusive<br>';
        }
        // Pour entrer dans les accolades, il faut que seulement une des 2 conditions soient vérifiées

        // Forme contracté : 2ème possibilité d'écriture
        echo ($a == 10) ? "A est égal à 10<br>" : "A n'est pas égal à 10<br>";
        // Condition ternaire : le ? remplace le IF et les 2 points ':' remplace le ELSE

        // comparaison
        $varA = 1;
        $varB = '1';
        if($varA === $varB)
        {
            echo "il s'agit de la même chose<br>";
        }
        // Avec la présence du triple égal, le test ne fonctionne pas, car les types des variables sont différents. INTEGER n'est pas égal à STRING
        /*
        =   affectation
        ==  comparaison de la valeur
        === comparaison de la valeur et du type
        */

        echo '<hr><h2 class="display-4 text-center">Condition SWITCH</h2><hr>';

        $perso = 'Mario';
        switch($perso)
        {
            case 'Luigi':
                echo "Vous avez choisi $perso<br>";
            break;
            case 'Toad':
                echo "Vous avez choisi $perso<br>";
            break;
            case 'Bowser':
                echo "Vous avez choisi $perso<br>";
            break;
            default:
                echo "Vous êtes fou !! c'est Mario le meilleur<br>";
            break;
        }
        // Si on a une grande comparaison de cas, la condition SWITCH est a privilégié
        // 'case' représente les cas dans lesquel nous pouvons potentiellement tomber
        // 'break' permet de stopper le script si nous tombons dans un des cas

        // Exo : pouvez vous faire la même chose que le SWICTH avec des conditions if / elseif / else ? Si oui, faites le.
        $perso = 'Mario';

        if($perso == 'Luigi')
        {
            echo "Vous avez choisi $perso<br>";
        }
        elseif($perso == 'Toad')
        {
            echo "Vous avez choisi $perso<br>";
        }
        elseif($perso == 'Bowser')
        {
            echo "Vous avez choisi $perso<br>";
        }
        else
        {
            echo "Vous êtes fou !! c'est Mario le meilleur<br>";
        }

        echo '<hr><h2 class="display-4 text-center">Fonctions prédéfinies</h2><hr>';
        // https://www.php.net/
        // Une fonction prédéfinie permet de réaliser un traiteùent spécifique

        echo 'Date : ' . date("d/m/Y") . '<br>';
        // Lorsque l'on utlise un fonction prédéfinie, il faut toujours se poser la question, à savoir ce qu'on doit lui envoyer comme arguments et surtout savoir ce qu'elle retourne
        // Les arguments de la fonction date() ne sortent pas de nul part, on les retouvent sur la documentation

        echo '<hr><h2 class="display-4 text-center">Traitements des chaines (iconv_strlen, strpos, substr)</h2><hr>';

        // strpos()
        $email1 = "gregorylacroix78@gmail.com";
        echo strpos($email1, "@") . '<br>';
        /*
            strpos() : string position / fonction prédéfinie qui permet de trouver la position d'un caractère dans une chaine
            arguments : 
            1 - la chaine dans laquelle nous souhaitons chercher
            2 - le caractère a trouvé
            contexte : utile pour vérifier le foprmat d'un email
        */

        $email2 = "Bonjour";
        echo strpos($email2, "@"); // cette ligne ne sort rien, pourtant il y a bien quelque chose à l'intérieur : FALSE !
        var_dump(strpos($email2, "@")); // grace à var_dump() on aperçoit le FALSE. var_dump() est un donc une instruction d'affichage améliorée que l'on utilise regulièrement en phase de développement
        // il en existe une autre : print_r()
        echo '<br>';

        // iconv_strlen()
        $phrase = "Mettez une phrase ici à cet endroit";
        echo iconv_strlen($phrase) . '<br>';
        // iconv_strlen() est une fonction prédéfinie qui permet de calculer la taille d'une chaine de caractère
        // Contexte : nous pourrions l'utiliser pour savoir si le pseudo et le mdp lors d'une inscription ont des tailles conforme

        // substr()
        $texte = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus lacus ipsum, rutrum non odio vitae, placerat bibendum dolor. Aenean nec finibus eros. Donec porta mauris sodales quam bibendum, sed molestie nulla placerat.";

        echo substr($texte, 0, 20) . "...<a href=''>Lire la suite</a>";
        /*
            substr() est une fonction prédéfinie permettant de retouner une partie de la chaine
            arguments : 
            1 - la chaine a couper
            2 - la position de début
            3 - la position de fin
            contexte : substr est souvent utilisé pour afficher des actualités avec une accroche
        */

        echo '<hr><h2 class="display-4 text-center">Fonctions utlisateur</h2><hr>';
        // Les fonctions utlisateurs permettent d'éviter de copier / coller un code récurant, on l'encapsule dans une fonction

        // on déclare toujours une fonction avec le mot clé 'function' suivi du nom de la fonction que nous définissons
        function separation() // toujours des parenthèses, une fonction peut potentiellement recevoir des arguments
        {
            echo "<hr><hr><hr>";
        }
        separation(); // execution de la fonction

        // fonction avec arguments
                    // Grégory
        function bonjour($qui)
        {               // Grégory
            return "Bonjour $qui <br>"; // return retourne le résultat de la fonction, à ce moment la on quitte la fonction
        }

        echo bonjour('Grégory'); // execution de la fonction
        echo bonjour('Etienne'); // quand il y a un 'return' dans la fonction, il faut faire un echo avant
        $prenom = 'Jacques';
        echo bonjour($prenom); // l'argument peut être une variable

        //---------------------------------------------
                            // 500
        function appliqueTva($nombre)
        {         // 500
            return $nombre*1.2;
        }
        echo "500 euros avec tva 20% font : " . appliqueTva(500) . '€<br>';

        // Exo : pourriez vous améliorer cette fonction afin que l'on puisse calculer un nombre avec les taux de notre choix (19.6%, 5.5%, 7% etc...)
        // 1 + taux / 100
                            // 500   , 19.6
        function appliqueTva2($nombre, $taux = 20)
        {       //   500       19.6
            return $nombre*(1+$taux/100); 
        }
        echo "500 euros avec tva 19.6% font : " . appliqueTva2(500, 19.6) . '€<br>';
        echo "500 euros avec tva 7% font : " . appliqueTva2(500, 7) . '€<br>';
        echo "500 euros avec tva 5.5% font : " . appliqueTva2(500, 5.5) . '€<br>';
        echo "500 euros avec tva 20% font : " . appliqueTva2(500) . '€<br>';

        //-------------------------------------------
        echo meteo("été", 20); // il est possible d'executer une fonction avant qu'elle soit déclarée dans le code
        function meteo($saison, $temperature)
        {
            return "Nous sommes en $saison et il fait $temperature degre(s)<br>";
        }

        // Exo : gérer le S de degréS en fonction de la température, pensez à gérer les articles : "en" été / "au" printemps 
        
        function exoMeteo($saison, $temperature)
        {
            if($temperature > 1 || $temperature < -1)
                $degre = "degrés";
            else
                $degre = "degré";
            //---------------------------------------
            if($saison == 'printemps')
                $art = 'au';
            else
                $art = 'en';

            return "Nous sommes $art $saison et il fait $temperature $degre<br>";
        }
        echo '<hr>';
        echo exoMeteo('été', 2);
        echo exoMeteo('automne', -2);
        echo exoMeteo('hiver', 0);
        echo exoMeteo('printemps', 1);
        echo exoMeteo('printemps', -1);

        // Espace global et local 
        function jourSemaine()
        { // espace local
            $jour = "Jeudi";
            return $jour;
            echo 'Allo!!';
        }

        echo $jour; // /!\ ne fonctionne pas car cette variable n'est connu qu'à l'intérieur de la fonction
        // Il n'est pas possible d'appeler une varaible déclarée dans l'espace locale (dans une fonction) vers l'espace globale (espace par défaut de php) 
        $recup = jourSemaine();
        echo $recup . '<br>';

        //---------------------------------------------
        $pays = 'France'; // variable global

        function affichagePays()
        {
            global $pays; // global permet d'importer une variable déclarée dans l'espace global vers l'espace local (dans une fonction)
            return $pays;
        }
        echo affichagePays();

        echo '<hr><h2 class="display-4 text-center">Structure itérative : Boucle</h2><hr>';

        // Boucle while
        $i = 0;
            // 4 
        while($i < 5)
        {       // 4
            echo "$i---";
            $i++; // equivaut à $i = $i + 1
        }
        // 0---1---2---3---4---
        echo '<br>';
        // Exo : faites en sorte de ne pas avoir les tirets à la fin : 0---1---2---3---4
        $j = 0;
        while($j < 5)
        {
            if($j == 4)
                echo $j;
            else
                echo "$j---";
            $j++;
        }
        echo '<br>';
        //--------------------------------------
         $j = 0;
        while($j < 5)
        {
            if($j !== 4)
                echo "$j---";
            else
                echo $j;
            $j++;
        }
        //---------------------------------------
        echo '<hr>';
        // la boucle FOR
                
        for($j = 0; $j < 16; $j++) // initialisation/condition d'entrée/incrémentation
        {      
            echo "$j<br>";
            //echo $j . '<br>';
        }

        //---------------------------------------
        // Exo : afficher un selecteur de 30 options via une boucle
        echo '<hr><select>';
        for($i = 0; $i < 31; $i++)
        {
            echo "<option>$i</option>";
        }
        echo '</select><hr>';

        // Exo : Faites une boucle qui affiche de 0 à 9 sur la même ligne (soit 10 tours)
        for($d = 0; $d < 10; $d++)
        {
            echo $d;
        }
        echo '<hr>';
        //-------------------------------------------------------------
        // Exo : faites un boucle qui affiche de 0 à 9 sur le même ligne dans un tableau HTML 

        /*  
        Résultat : 
        -----------------------------------------
        | 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 |
        -----------------------------------------
        */
        // Les balises 'table' englobe la boucle 'for'
        echo '<table class="table table-bordered text-center"><tr>';
        for($v = 0; $v < 10; $v++)
        {
            echo "<td>$v</td>"; // on crée une option par tour de boule avec la valeur de $v dans chaque cellule
        }
        echo '</tr></table><hr>';

        //--------------------------------------------------------------
        // Exo : Faites la même chose en allant de 0 à 99 sur plusieurs lignes sans faire 10 boucles
        /*
        ---------------------------------------------------
        | 0  | 1  | 2  | 3  | 4  | 5  | 6  | 7  |  8 | 9  |
        ---------------------------------------------------
        | 10 | 11 | 12 | 13 | 14 | 15 | 16 | 17 | 18 | 19 |
        ---------------------------------------------------
        | 20 | 21 | 22 | 23 | 24 | 25 | 26 | 27 | 28 | 29 |
        ---------------------------------------------------
        | 90 | 91 | 92 | 93 | 94 | 95 | 96 | 97 | 98 | 99 |
        ---------------------------------------------------
        Info : boucle imbriquée 

        for()
        {
            for()
            {

            }
        }
        */
        $compteur = 0; 
        // La première boucle FOR tourne 10 fois parce qu'il y a 10 lignes
        // La deuxième boucle FOR tourne 10 fois qur chaque ligne et crée un cellule
        // $compteur permet d'avoir une variable qui ne se réinitialise jamais à zéro, elle augment de 1 quelque soit le tour de boucle
        echo '<table class="table table-bordered text-center">';
        for($ligne = 0; $ligne < 10; $ligne++)
        {
            echo '<tr>'; 
            for($cellule = 0; $cellule < 10; $cellule++)
            {              
                echo "<td>$compteur</td>";
                $compteur++;
            }
            echo '</tr>';
        }
        echo  '</table>';

        /* | 0 | 1 | 2 | 3 | 4 | 5 | 6 | 7 | 8 | 9 |
           | 10  
        */

        echo '<hr><h2 class="display-4 text-center">Tableau de données ARRAY</h2><hr>';
        // Un tableau array est déclarée un peu comme une variable améliorée, car on ne conserve pas qu'une valeur mais un ensemble de valeur
        
        $liste = array("Grégory", "Aziz", "Nassim", "Sylvain", "Nelson");
        $liste = ["Grégory", "Aziz", "Nassim", "Sylvain", "Nelson"];
        // echo $liste; /!\erreur !! on ne pas afficher un tableau ARRAY en passant par un simple echo

        echo '<pre>';  var_dump($liste); echo '</pre>'; // plus détaillé
        echo '<pre>';  print_r($liste); echo '</pre>'; // moins détaillé

        // <pre> est une balise qui permet de formater la sortie du pront_r ou var_dump
        // Ces instructions d'affichages améliorées permettent de consulter et d'afficher les données d'un tableau, d'une variable, d'un objet etc...
    
        // Exo : tenter de sortir "Aziz" en passant par le tableau de données ARRAY sans faire un  'echo Aziz';
        echo $liste[1] . '<br>'; // on va crocheter à l'indice 1 du tableau ARRAY pour extraire la valeur étant stocké à l'indice 1

        /*
        ------------------- 
        | indice | valeur |
        -------------------
        |    0   | Grégory|
        -------------------
        |    1   | Aziz   | 
        -------------------
        |    2   | Nassim |
        -------------------   
        */

        echo '<hr><h2 class="display-4 text-center">Boucle foreach pour les tableau de données ARRAY</h2><hr>';

        $tab[] = "France"; // autre moyen d'affecter une valeur dans un tableau, les crochets vide permttent de générer des indices numériques
        $tab[] = "Angleterre";
        $tab[] = "Espagne";
        $tab[] = "Italie";
        $tab[] = "Portugal";
        // echo $tab; /!\ erreur !!! 

        echo '<pre>';  print_r($tab); echo '</pre>';

        // boucle foreach
        /*
         --------------------- 
        | indice | valeur    |
        ----------------------
        |    0   | france    |
        ----------------------
        |    1   | angleterre| 
        ----------------------
        |    2   | Espagne   |
        ----------------------
        |    3   | italie    |
        ----------------------
        |    4   | Portugal  |
        ----------------------
           $key     $value         
        */  
        // Lorsqu'il n y a qu'un seule variable, $value parcours la colonne des valeurs du tableau de donnée ARRAY
        // La boucle foreach est un moyen simple de passer en revue un tableau de données ARRAY (aussi les objets : futur chapitre)
        foreach($tab as $value) // as fait partie du langage et est obligatoire, $value est une variable de reception que nous nommons, elle receptionne une valeur du tableau par tour de boucle
        {
            echo "$value<br>"; // on affiche successivement les éléments du tableau
        }
        echo '<hr>';
        //-----------------------------------------------------------
        // foreach : indice + valeur
        // Lorsqu'il y a 2 variables, la première parcours la colonne des indices ($key) et l'autre la colonne des valeurs ($value)
        foreach($tab as $key => $value) // la flèche est obligatoire
        {
            echo "$key => $value<br>";
        }
        ?>
        <hr>
        <!-- 2ème possibilité d'écriture  -->
        <?php foreach($tab as $key => $value): ?>

                <?= $key; ?> => <?= $value; ?> <br>

        <?php endforeach; ?>
        <!-- for(): / endfor -->
        <!-- if(): / else: / endif -->
        <!-- while(): / endwhile -->

        <?php
        // il est possible de définir ses propres indices 
        $perso = array("m" => "Mario", "l" => "Luigi", "z" => "Aziz", "n" => "Nassim");
        echo '<hr><pre>';  print_r($perso); echo '</pre>';

        echo "Taille du tableau : " . count($perso) . '<br>';
        echo "Taille du tableau : " . sizeof($perso) . '<br>';
        // sizeof et count retourne la taille d'un tableau ARRAY , combien d'éléments il y a à l'intérieur. Pas de différence entre les deux

        echo implode(" / ", $perso) . '<br>'; // implode() est une fonction prédéfinie qui rassemble les éléments d'un tableau en un chaine (séparé par un symbole). L'inverse est explode(). 

        echo '<hr><h2 class="display-4 text-center">Tableau ARRAY multidimensionnel</h2><hr>';
        // Nous parlons de tableau multidimensionnel quand un tableau est contneu dans un autre tableau

        $tab_multi = array(
            0 => array("nom" => "Macron", "salaire" => 1),
            1 => array("nom" => "Lacroix", "salaire" => 15000)
        );

        echo '<pre>'; print_r($tab_multi); echo '</pre>';

        // Exo : tenter de sortir "Macron" en passant par le tableau multi représenté par $tab_multi sans faire un 'echo Macron'
        echo $tab_multi[0]['nom'] . '<hr>';

        // Exo : afficher l'ensemble du tableau multidimensionnel à l'aide de boucle foreach
        foreach($tab_multi as $key => $tab)
        {
           echo '<div class="col-md-2 offset-md-6 alert alert-success text-dark mx-auto text-center">';
           foreach($tab as $key2 => $value)
           {
                echo "$key2 => $value<br>";
           }
           echo '</div>';
        }
        echo '<hr>';
        //----------------------------------------------------------------
        // La boucle for permet de tourner autant de fois qu'il y a de lignes dans le tableau multi, donc 2 tour de boucle dans notre cas
        for($i = 0; $i < count($tab_multi); $i++)
        {
            echo '<div class="col-md-2 offset-md-6 alert alert-info text-dark mx-auto text-center">';
            // on se sert de la variable $i de la boucle for pour aller crocheter à chaque indice du tableau multi et parcourir les données
            foreach($tab_multi[$i] as $key => $value)
            {
                echo "$key => $value<br>";
            }
            echo '</div>';
        }

        echo '<hr><h2 class="display-4 text-center">Superglobales</h2><hr>';
        // Les superglobales sont des varaibles de type ARRAY, elles sont accessibles de partout, c'est à la fois dans l'espace globale et local, elle permettent de véhiculer des données
        /* 
            $_SERVER : véhicule les données lié au serveur 
            $_GET : véhicule les données transmit dans l'URL
            $_POST : véhicule les données d'un formulaire
            $_FILES : véhicule les données d'un fichier umploader
            $_COOKIE : véhicule les données d'un fichier cookie
            $_SESSION : véhicule les données d'un session en cours

            elle s'appelent toujours avec le signe $ suivi d'un '_' et toujours en majuscule
        */
        echo '<pre>'; print_r($_SERVER); echo '</pre>'; 

        

        echo '<hr><h2 class="display-4 text-center">Classe et objet</h2><hr>';
        // Un objet est un autre type de données. Un peu à la manière d'un ARRAY , il permet de regrouper des informations.
        // Cependant , cela va beaucoup plus loin car on peux y déclarer des variables (appelée : attribut ou propriété) mais aussi  des fonctions (appelée : méthodes).
        // Une classe est un peu comme un plan de construction, qui regroupe des données
        // Par convention, la première lettere du nom de la classe est toujours en majuscule 
        class Etudiant
        {
            public $prenom = 'Grégory'; // public permet de préciser que l'élément sera accessible de partout (il y a aussi protected et private)
            public $age = 26;
            public function pays()
            {
                return 'France';
            }
        }

        $objet = new Etudiant;// new permet d'instancier la classe Etudiant et d'en faire un objet. $objet est un exemplaire de la classe Etudiant, c'est un enfant de la classe
        // Pour exploiter les données déclarées dans la classe, il faut créer un instance / un objet de la classe
        echo '<pre>'; var_dump($objet); echo'</pre>'; // var_dump permet d'observer que l'on a bien un objet isssu de la classe Etudiant à l'identifiant 1 et on observe ausssi les propriétés (varaibles) déclarées dans la classe
        echo '<pre>'; var_dump(get_class_methods($objet)); echo'</pre>'; // get_class_methods() pemrmet d'afficher toute les méthodes (fonctions) issu de la classe Etudiant

        // On pioche dans un ARRAY avec les crochets '[]' / on pioche dans un objet toujours avec une flèche '->'
        echo "Je m'appel : " . $objet->prenom . '<hr>'; // en piochant dans l'objet, cela nous permet d'atteindre la propriété $prenom déclarée dans la classe
        echo "Mon age est : " . $objet->age . ' ans<hr>';
        echo "J'habite en : " . $objet->pays() . '<hr>';

        $objet2 = new Etudiant;
        echo '<pre>'; var_dump($objet2); echo'</pre>'; 




















        


        ?>
    </div>
</body>
</html>