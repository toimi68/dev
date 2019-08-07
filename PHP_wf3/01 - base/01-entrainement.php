<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Entrainement PHP</title>
</head>
<style>
        

</style>
<body>
    <div class="container">
        <h2 class="display-4 text-center">Ecriture et affichage</h2> <hr>
        <!-- Nous pouvons écrire du HTML dans un fichier ayant l'extension PHP, l'inverse n'est pas possible -->

        <?php // ouverture de la balise PHP
        // il est possible d'ouvrir la balise PHP autant de fois que l'on souhaite sur un fichier PHP

        echo 'Bonjour';// Echo est une instruction d'affichage que l'on peut traduire par 'affiche moi"

        echo '<br>'; // Nous pouvons également y mettre du HTML

        print 'Bonjour'; // Print est une autre instruction d'affichage, pas de différence avec 'echo'

         echo '<hr><h2 class="display-4 text-center">Commentaires</h2><hr>';

        // fermeture de la balise PHP
        ?>
        <?= "Allo"?><!-- le = remplace le 'echo' -->
        <strong>Bonjour</strong> <!-- Nous voyons qu'il est également possible de fermer et ré-ouvrir PHP pour mélanger du code HTML & PHP -->

        <?php
        echo 'Texte'; // ceci est un commentaire sur une seule ligne
        echo 'Texte'; /* ceci est un commentaire
            sur plusieurs lignes
        */
        echo 'Texte'; # ceci est un commentaire sur une seule ligne 

        echo '<hr><h2 class="display-4 text-center">Variables : Types / Declaration / Affectation </h2><hr>';
        // une variable est un espace nommé permettant de conserver une valeur
        
        //$2a -> erreur !! / $a2 -> OK
        // Caractère autorisés : A à Z / a à z / de 0 à 9
        // pas d'accents, pas d'espaces
        $a = 127; // affectation de 127 dans la variable nommé "a"

        // gettype() est une fonction prédéfinie qui retouner le type d'une variable
        echo gettype($a); // il s'agit d'un entier: INTEGER
        echo '<br>';

        $b = 1.5;
        echo gettype($b); // un nombre à virgule : DOUBLE
        echo '<br>';

        $c = "une chaine";
        echo gettype($c); // une chaine de caractères : STRING
        echo '<br>';

        // Entre quotes c'est une chaine de caractères
        $d = '127';
        echo gettype($d); // une chaine de caractères : STRING
        echo '<br>';

        $e= true;
        echo gettype($e); // Boolean
        echo '<br>';

        $f= false;
        echo gettype($f); // Boolean
        echo '<br>';

        echo '<hr><h2 class="display-4 text-center">Concaténation</h2><hr>';

        $x = "Bonjour " ;
        $y = "Tout le monde !!";
        echo $x . $y . '<br>'; // point de concaténation que l'on peut traduire par 'suivi de '
        echo "$x $y <br>"; // entre guillements, les variables sont évaluées
        echo '$x $y <br>'; // entre simple quote, les variables ne sont pas évaluées, c'est une chaine de caractère 

        echo 'aujourd\'hui<br>'; // si il y a une apostrophe dans la chaine de caractère,nous plaçons un antislash "\" pour dire que c'est bien une apostrophe
        echo "aujourd'hui<br>"; // nous préferons pour le php,utiliser le entre quote simple

        echo "Hey ! " .$x . $y . '<br>'; // concaténation texte et variable    

        echo "<br>" , "coucou" , "<br>"; // concaténation avec une virgule (la virgule et le point de concaténation sont similaire)

        
        echo '<hr><h2 class="display-4 text-center">Concaténation lors de l\'affectation</h2><hr>';

        $prenom1 = "Bruno";
        $prenom1 = "Claire";
        echo $prenom1 . '<br>'; // cela remplace "Bruno" par "Claire" donc affiche "Claire"

        $prenom2 = "Nicolas";
        $prenom2 .= " Marie";
        echo $prenom2 . '<br>'; // Cela ajoute SANS remplacer la valeur précédente gràce à l'opérateur .=

        echo '<hr><h2 class="display-4 text-center">Constante et constante magique</h2><hr>';

        // Une constante tout comme une variable permet de conserver une valeur mais comme son nom l'indique,la valeur est... constante !! on ne pourra pas changer sa valeur durant l'execution du script
        define("CAPITALE", "Paris"); // par convention,une constante se déclare tjs en majuscule
        // define("nom_de_la_constante","valeur_de_la_constante")
    
        echo CAPITALE . '<br>';

        // define("CAPITALE", "Rome"); /!\ erreur !! il n'est pas possible de redéclarer une constante déja définit

        // constante magique 
        echo __FILE__ . '<br>'; // ce sont des constante pour donner des info ou on doit se trouver, chemin complet vers le fichier
        echo __LINE__ . '<br>'; // affiche le numéro de la ligne
        // __FUNCTION__ / __CLASS__/__METHOD__ donne des info par rapport à la ou on se trouve(fonction class...)
        
        // Exo: Afficher vert-jaune-rouge (avec les tirets) en mettant chaque couleur dans une variable, faites en sorte que chaque mot soit la bonne couleur

        // $vert = "vert";
        // $couleur2 = "jaune";
        // $couleur3 = "rouge";

        // echo "<font color='green'>" . $couleur1

        // correction exo:
        
        $vert = '<span class="text-success">Vert</span>';
        $jaune = '<span class="text-warning">Jaune</span>';
        $rouge = '<span class="text-danger">Rouge</span>';
        // autre methode  $rouge = '<span style="color:red">rouge</span>';

        echo "$vert-$jaune-$rouge<br>"; // autre methode
        echo $vert . '-' . $jaune . '-' . $rouge . '<br>';


         echo '<hr><h2 class="display-4 text-center">Opérateurs arithmétique</h2><hr>';
         $a = 10; $b = 2;

         echo $a + $b . '<br>'; // affiche 12
         echo $a - $b . '<br>'; // affiche 8
         echo $a * $b . '<br>'; // affiche 20
         echo $a / $b . '<br>'; // affiche 5

         // opération / affectation
         $a += $b; // equivaut à $a = $a + $b
         echo $a . '<br>'; // affiche 12

         // on écrase la variable précédente... ici la variable a = 12.
         $a -= $b; // equivaut à $a = $a - $b
         echo $a . '<br>'; // affiche 10
         
         // on écrase la variable précédente... ici la variable a = 10
         $a *= $b; // equivaut à $a = $a * $b
         echo $a . '<br>'; // affiche 20
         
         $a /= $b; // equivaut à $a = $a / $b ici la variable a =20.
         echo $a . '<br>'; // affiche 10
         
         echo '<hr><h2 class="display-4 text-center">Structures conditionnelles (if /else) - opérateurs de comparaisons </h2><hr>';

         // Isset & empty
         $var1 = 0;
         $var2 = '';
         // empty test si une variable est à 0, si elle est vide ou non définie
         // Si la condition entre les parenthèses du IF est vérifiée, si elle retourne 'true' , le code entre les accolades sera exécutée.
         if(empty($var1))
         {
             echo "0, vide ou non définie<br>";
         }

         //-----------------------------------------------------------------------------------------------------------------------------------------------------------------
         if(isset($var2))
         {
             echo "var2 existe et est définie par rien <br>";
         }

         /* 
         OPERATEURS DE COMPARAISON 

         =       égal à
         ==      comparaison de la valeur
         ===     comapraison de la valeur et du type
         <       strictement inférieur à 
         <       strictement supérieur à 
         <=      inférieur ou égal à
         <=      supérieur ou égal à
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
         else // cas par défaut,dans tout les autre cas,si la condition If n'est pas vérifiée, c'est le code dans le else qui s'execute / else($b === 5) => /!\ erreur
        {
            echo "non c'est B qui est supérieur à A<br>";
        }

        // if / elseif / else
        if($a > $b && $b > $c)
        {
            echo "ok pour les 2 conditions<br>";
        }
        elseif($a == 9 || $b < $c)
        {
            echo "ok pour au moins une des 2 conditions<br>";
        }
        else
        {
            echo "Tout le monde à faux !!<br>";
        }
        // ELSEIF permet d'ajouter des cas supplémentaire à la condition IF
        // il peuty avoir plusieurs ELSEIF dans la même condition
        // si une des conditions supérieures est vérifiée,ELSEIF bloque le script et toutes les conditions suivantes ne seront pas evaluées.

        // Condition exclusive
        if($a == 10 XOR $b == 6)
        {
            echo 'ok condition exclusive<br>';
        }
        // pour entrer dans les accolades,il faut que seulement une des 2 conditions soient vérifiées

        // Forme contracté : 2ème possibilité d'écriture  
        echo($a == 10) ? "A est égal à 10<br>" : "A n'est pas égal à 10 <br>"; 
        // Condition ternaire : le ? remplace le IF et les 2 points ':' remplace le ELSE
        
        // comparaison
        $varA = 1; // integer
        $varB = '1'; // string
        if($varA == $varB)
        {
            echo "il s'agit de la même chose<br>";
        }
        // Avecl a présence du triple égal, le test ne fonctionne pas, car les types des variables sont différents. INTEGER n'est pas égal à STRING

        /*
        =   affectation
        ==  comparaison de la valeur
        === comparaison de la valeur et du type
        */

         echo '<hr><h2 class="display-4 text-center">Condition SWITCH</h2><hr>';

         $perso = 'Mario';  // la condition "switch" compare une valeur a différents cas,ici mario n'est pas dans les 3 cas,elle va dans le dernier
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
         // Si on a une grande comparaison de cas, la condition swith est à privilégié
         // 'case' représente les cas dans lesquels nous pouvons potentiellement tomber
         // 'break' permet de stopper le script si nous tombons dans un des cas 

         // Exo: Pouvez vous faire la même chose que le SWITCH avec des conditions if / elseif / else ? Si oui,faites le.

         $perso = 'mario';

         if($perso == 'Luigi')
         {
             echo "Vous avez choisi $perso<br>";
         }
         elseif ($perso == 'Toad')
         {
             echo " Vous avez choisi  $perso<br>";
         }
         elseif ($perso == 'Bowser')
         {
             echo "Vous avez choisi $perso<br>";
         }
         else
         {
             echo "Vous êtes fou!! C'est Mario le meilleur<br>";
         }


         echo '<hr><h2 class="display-4 text-center">Fonctions prédéfinies</h2><hr>';
         // https://www.php.net/
         // Une fonction prédéfinie permet de réaliser un traitement spécifique

         echo 'Date : ' . date("d/m/Y") . '<br>' ;
         // Lorsque l'on utilise une fonction prédéfinie,il faut toujours se poser la question, à savoir ce qu'on doit lui envoyer comme arguments et surtout savori ce qu'elle retourne
         // Les arguments de la fonction date() ne sortent pas de nul part,on les retrouvent sur la documentation

          echo '<hr><h2 class="display-4 text-center">Traitements des chaines (iconv_strlen, strpos, substr)</h2><hr>';

          // strpos()
          $email1 = "nassim.amara@lepoles.com";
          echo strpos($email1, "@"); // indique le nombre de caractère avant le "@"
          /*
                strpos() : string position / fonction prédéfinie qui permet de trouver la position d'un caractère dans une chaine arguments: 
                1- la chaine dans la quelle nous souhaitons chercher
                2- le caractère a trouvé
                contexte : utilse pour vérifier le format d'un email
          */

          $email2 = "Bonjour";
          echo strpos($email2, "@"); // cette ligne ne sort rien, pourtnat i ly a bien quelque chose à l'intérieur : FALSE!
          var_dump(strpos($email2, "@")); // gràce à var_dump() on aperçoit le FALSE. var_dump est donc une instruction d'affichage améliorée que l'on utilise régulierement en phase de développement
          // il en existe une autre : print_r()
         echo '<br>';
         //iconv_strlen()
         $phrase = "Mettez une phrase ici à cet endroit";
         echo iconv_strlen($phrase) . '<br>';
         // iconv_strlen() est une fonction préfédifinie qui permet de calculer la taille d'une chaine de caractère
         // Contexte: nous pourrions l'utiliser pour savoir si le pseudo et le mdp lors d'une inscription ont des tailles conforme

         //substr()
         $texte = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit mauris eget metus efficitur, vitae pellentesque neque luctus. Sed eu tortor ac purus molestie aliquam. Pellentesque sed mauris sed ante posuere vehicula aliquam et orci. Suspendisse potenti. Aenean porta tellus at justo dictum finibus. Donec ut nisi eu neque hendrerit bibendum. Aenean sit amet cursus ex. Cras at neque lacus. Nulla ultricies, nisi sed finibus lobortis, libero nisi luctus diam, porta vehicula velit nisl vel nisl. Donec sit amet dui sit amet nisl fermentum eleifend at in est.";

         echo substr($texte, 0, 20) . "...<a href=''>Lire la suite </a>";
         /*
            substr() est une fonction prédéfinie permettant de retourner une partie de la chaine.
            arguments :
            1- la chaine a couper
            2- la position du début
            3- la position de fin
            contexte : substr est souvent utilisé pour afficher des actualités avec une accroche
         */

         echo '<hr><h2 class="display-4 text-center">Fonctions utilisateurs</h2><hr>';
         // Les fonctions utilisateurs permettent d'éviter de copier / coller un code récurant,on l'encapsule dans une fonction

         // on  déclare toujours une fonction avec le mot clé 'function" suivi du nom de la fonction que nous définissons
         function separation() // toujours des prenthèses,une fonction peut potentiellement recevoir des arguments
         {
             echo"<hr><hr><hr>";
         }
         separation(); // execution de la fonction

         // fonction avec arguments 

            // Aziz
         function bonjour ($qui)
         {               // Aziz
            return "Bonjour $qui <br>"; // return retourne le résultat de la fonction, à ce moment la,il quitte la fonction
         }
         
         echo bonjour ('Aziz'); // execution de la fonction
         
         echo bonjour('Sylvain'); // quand il y a un 'return' dans la fonction,il faut faire un echo avant (pour qu'il affiche le resultat)
         
         $prenom = 'Nelson';
         echo bonjour ($prenom); // l'argument peut être une variable

         //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                            //500
         function appliqueTva($nombre)
         {              // 500
             return $nombre*1.2;
         }
         echo "500 euros avec tva 20% font : " . appliqueTva(500) . '€<br>';
         

         // Exo: pourriez vous améliorer cette fonction afin que l'on puisse calculer un nombre avec les taux de notre choix (19.6%, 5.5%, 7%, etc....)
         // pour calculer un coefficient de taux,on fait 1 + taux / 100

                                    // 500, 19.6
         function appliqueTva2($nombre, $taux)
         {              //500,   19.6
             return $nombre*(1+$taux/100);
         }
          echo "500 euros avec tva 19.6% font : " . appliqueTva2(500, 19.6) . '€<br>';

          function appliqueTva3($nombre, $taux)
         {
             return $nombre*(1+$taux/100);
         }
          echo "500 euros avec tva 40% font : " . appliqueTva3(500, 40) . '€<br>';

          function appliqueTva4($nombre, $taux)
         {
             return $nombre*(1+$taux/100);
         }
          echo "500 euros avec tva 7%% font : " . appliqueTva4(500, 7) . '€<br>';

          // autre methode en rajoutant un nombre de taux
            function appliqueTva5($nombre, $taux = 30)
         {
             return $nombre*(1+$taux/100);
         }
          echo "500 euros avec tva 30% font : " . appliqueTva5(500) . '€<br>';

         echo '<hr>';
         //----------------------------------------------------------------------------------------------------------------------------------------------------------

         echo meteo("été", 20); // il est possible d'executer une fonction avant qu'elle soit déclarée dans le code
         function meteo($saison, $temperature)
         {
            return "Nous sommes en $saison et il fait $temperature degres <br>";
        
         }

         // Exo : gérer le S de degréS en fonction de la température,pensez à gérer les articles : "en" été / "au" printemps

          function exometeo($saison, $temperature)
         {
                if($temperature > 1 || $temperature < -1) // qd il y a qu'une seul instruction pas la peine de mettre des accolades
                    $degre = "degres";
                else
                    $degre = "degre";
        //-----------------------------------------------------------------------------------------------------------------------------------------------------------
                if($saison == 'printemps')
                    $art = 'au';
                else
                    $art = 'en';


            return "Nous sommes $art $saison et il fait $temperature $degre<br>";
         }
        
         echo exoMeteo('été', 2);
         echo exoMeteo('automne', -2);
         echo exoMeteo('hiver', 0);
         echo exoMeteo('printemps', 1);
         echo exoMeteo('printemps', -1);


         echo '<hr>';

         // espace global et local

         function jourSemaine()
         {
             $jour = "jeudi";
             return $jour;
             echo 'allo!!';
         }

         echo $jour; // /!\ ne fonctionne pas car cette variable n'est connu qu'a l'intérieur de la fonction

         // Il n'est pas possible d'appeler une variable déclarée dans l'espace locale (dans une fonction) vers l'espace globale (espace par défaut de php)

         $recup = jourSemaine();
         echo $recup . '<br>';

         //------------------------------------------------------------------------------------------------------------------------------------------------------------

         $pays = 'France'; // variable global

         function affichagePays()
         {
             global $pays; // global permet d'importer une variable déclarée dans l'espace global(à l'extérieur de la fonction) vers l'espace local (à l'intérieur d'une fonction)
             return $pays;
         }
         echo affichagePays();


               echo '<hr><h2 class="display-4 text-center">Structure itérative : Boucle</h2><hr>';

               // Boucle while (tant que)
               $i = 0;
                    // 4
               while($i < 5)
               {       // 4
                   echo "$i---";
                   $i++; // équivaut à $i = $i + 1
               }
               // 0---1---2---3---4---

               // Exo : Faites en sorte de ne pas avoir les tirets à la fin : 
               // 0---1---2---3---4

               echo '<hr>';

                $j = 0;
                    
               while($j < 5)
               {       
                    if($j == 4)
                    echo $j;
               else 
                    echo "$j---";
                    $j++;
               }
               //-------------------------------------------------------------------------------------------------------------------------------------------------------(autre exemple)
               echo '<hr>';
               $j = 0;
               while($j <5)
               {
                    if($j !== 4)
                        echo "$j---";
                    else
                        echo $j;
                    $j++;
               }

               echo '<hr>';

               // ---------------------------------------------------------------------------------------------------------------------------------------------------------
               // la boucle FOR
               for($j = 0; $j <16; $j++) // initialisation/ condition d'entrée/ incrémentation
               {  // tant que ma fonction est respecté on incrémente de 1.
                   echo "$j<br>"; // permet de mettre les chiffres les uns en dessous des autres et non sur la meme ligne.... autre solution echo $j . '<br>;
               }

               echo '<hr>';
               //----------------------------------------------------------------------------------------------------------------------------------------------------------
               // Exo : Afficher un selecteur de 30 option via une boucle

               echo '<select>';
               for($i = 0; $i < 31; $i++)
               {
                    echo "<option>$i</option>";
               }

               echo '</select>';

         
               echo '<hr>';
               // Exo : Faites une boucle qui affiche de 0 à 9 sur la même ligne (soit 10 tours)

               for($h = 0; $h < 10; $h++)
               {
                   echo "$h";
               }
               
               echo '<hr>';
               //------------------------------------------------------------------------------------------------------------------------------------------------------------

               //exo : faites un boucle qui affiche de 0 à 9 sur le même ligne dans un tableau HTML

               /* Resultat attendu :  ----------------------
                                      |0|1|2|3|4|5|6|7|8|9|
                                     -----------------------
                */

              // les balises 'table' englobe la boucle 'for'

                echo '<table class="table table-bordered table-primary"><tr>'; 
                for ($v = 0; $v< 10; $v++) 
                {
                 echo "<td>$v</td>"; // on crée une option par tour de boucle avec la valeur de $v dans chaque cellule
                }
                echo '</tr><table>';

                echo '<hr>';

                // Exo: Faites la même chose en allant de 0 à 99 sur plusieurs lignes sans faire 10 boucles
                /*
                ---------------------------------------------------
                | 0  | 1  | 2  | 3  | 4  | 5  | 6  | 7  | 8  | 9  |
                 --------------------------------------------------
                | 10 | 11 | 12 | 13 | 14 | 15 | 16 | 17 | 18 | 19 |
                 -------------------------------------------------
                | 20 | 21 | 22 | 23 | 24 | 25 | 26 | 27 | 28 | 29 |
                 -------------------------------------------------
                | 90 | 91 | 92 | 93 | 94 | 95 | 96 | 97 | 98 | 99 |

                info : boucle imbriquée
                for()
                {
                    for()
                }
                */

                $compteur = 0;
                // la première boucle FOR tourne 10 fois parce qu'il y a 10 lignes
                // la deuxième boucle FOR tourne 10 fois tourne sur chaque ligne et crée une nouvelle cellule
                // $compteur permet d'avoir une variable qui ne se réinitalise jamais à zéro,elle augmente de 1 quelque soit le tour de boucle
                 echo '<table class="table table-bordered text-center table-dark"><tr>'; 
                            // 0    0
                for ($ligne = 0; $ligne < 10; $ligne++) 
                 {
                      echo '<tr>';      // 0
                      for($cellule = 0; $cellule <10; $cellule++)
                     {
                          echo "<td>$compteur</td>";
                          $compteur++;
                     }
                     echo '</tr>';
                 }
                 echo '</table>';
                 
                 /* | 0 | .....  */
            
                 
               echo '<hr><h2 class="display-4 text-center">Tableau de données ARRAY </h2><hr>';

               // Un tableau array est déclarée un peu comme une variable améliorée,car on ne conserve pas qu'une valeur mais un ensemble de valeur

               $liste = array("Grégory","Aziz", "Nassim", "Sylvain","Nelson");

               // echo $liste; /!\ On ne peut pas afficher un tableau ARRAY en passant par un simple echo

               echo '<pre>'; var_dump($liste); echo '</pre>'; // plus détaillé, affiche les informations structurées d'une variable, y compris son type et sa valeur.
               echo '<pre>'; print_r($liste); echo '<pre>'; // moins détaillé, affiche des informations à propos d'une variable, de manière à ce qu'elle soit lisible. 


                // <pre> est une balise qui permet de formater la sortie du print_r ou var_dump
                // Ces isntructions d'affichages améliorées permettent de consultet et d'afficher les données d'un tableau, d'une variable, d'un objet etc....
            /*
            -----------------------
            | indice | valeur      |

            -----------------------
            |   0    |    Gregory  |

            ------------------------
            |   1    |   Aziz      |

            ------------------------
            |   2    |   Nassim    |

            ------------------------

            // Exo : tenter de sortir "Aziz" en passant par le tableau de données ARRAY sans faire un 'echo Aziz';

            */

             echo($liste)[1]; // on va crocheter à l'indice 1 du tableau ARRAY pour extraire la valeur étant stocké à l'indice 1.

            echo '<hr><h2 class="display-4 text-center">Boucle foreach pour les tableaux de données ARRAY </h2><hr>';

            $tab[] = "France"; // autre moyen d'afffecter une valeur dans un tableau, les crochets vide permettent de générer des indices numériques.
            $tab[] = "Angleterre";
            $tab[] = "Espagne";
            $tab[] = "Italie";
            $tab[] = "Portugal";
            // echo $tab; /!\ erreur !!!

            echo '<pre>'; print_r($tab); echo '</pre>';

            // boucle foreach

            /*
               -----------------------
            | indice | valeur      |

            -----------------------
            |   0    |    France   |

            ------------------------
            |   1   |  Angleterre  |

            ------------------------
            |   2    |   Espagne   |

            ------------------------
            |   3   |    Italie    |

            ------------------------
            |   4    |   Portugal  |

            ------------------------
                        $value
            */
            // lorsqu'il n'y a qu'une seule variable,$value parcours la colonne des valeurs du tableau de données ARRAY
            // La boucle foreach est un moyen simple de passer en revue un tableau de données ARRAY

            foreach($tab as $value) // as fait partie du langage et est obligatoire, $value est une variable de reception que nous nommons,elle receptionne une valeur du tableau par tour de boucle
            {
                echo "$value<br>"; // on affiche successivement les éléments du tableau
            }
            echo '<hr>';
            //--------------------------------------------------------------------------------------------------------------------------------------------------------------------
            // foreach : indice + valeur
            // lorsqu'il y a 2 variables,la première parcours la colonne des indices ($key) et l'autre la colonne des valeurs ($value)
            foreach($tab as $key => $value) // key est une variable de reception.on peut mettre n'importe qu'elle variable. la flècle est obligatoire
            {
                echo "$key => $value<br>"; // par tour de boucle,key parcours la colonne des indices, et value les pays.
            }
            
            ?>
            <hr>
            <!-- 2ème possibilité d'écriture -->

            <?php  foreach($tab as $key => $value): ?>

                        <?= $key; ?> => <?= $value; ?><br>

            <?php endforeach; ?>
            <!-- for(): /endfor -->
            <!-- if(): /else: / endif -->
            <!-- while(): /endwhile -->

            <?php
            // il est possible de définir ses propres indices
            $perso = array("m" => "Mario", "l" => "Luigi", "z" => "Aziz", "n" => "Nassim");

            echo '<pre>'; print_r($perso); echo '</pre>';

            echo "Taille du tableau : " . count($perso) . '<br>';
            echo "Taille du tableau : " . sizeof($perso) . '<br>';
            // siezof et count retourne la taille d'un tableau ARRAY, combien d'éléments il y a à l'intérieur . Pas de différence entre les deux.

            Echo implode(" - ", $perso) . '<br>'; //implode () est une fonction prédéfinie  qui rassemble les éléments d'un tableau en une chaine (séparé par un symbole). L'inverse est explode()

            
            echo '<hr><h2 class="display-4 text-center">Tableau ARRAY multidimensionnel</h2><hr>';// Nous parlons de tableau multidimensionnel quand un tableau est contenu dans un autre tableau

            $tab_multi = array(
                0 => array ("nom" => "Macron", "Salaire" => 10000),
                1 => array("nom" => "Amara", "Salaire" => 15000)
            );

            echo '<pre>'; print_r($tab_multi); echo '</pre>';


            // Exo : tenter de sortir "Macron" en passant par le tableau multidimensionnel représenté par $tab_multi sans faire un 'echo Macron'

            echo($tab_multi)[0]['nom'] . '<hr>';

            // Exo : afficher l'ensemble du tablau multidimensionnel à l'aide de boucle foreach

        /*
            foreach ($tab_multi as $nom)   
             {
               foreach ($nom as $nom2) {

                  echo "$nom2<br>";
                             }
                }
        */

            // Correction Exo : 

            foreach($tab_multi as $key => $tab) // key va obtenir l'indice 0 et tab l'array,le nom et le salaire. dans un tableau la première variable correspondra tjs à l'indice .ici key.
            {
                echo '<div class="col-md-2 offset-md-5 alert alert-success text-dark mx-auto text-center">';
                foreach($tab as $key2 => $value)
                {
                    echo "$key2 => $value<br>";
                }
                echo '</div>';
            }
                echo '<hr>';
            //--------------------------------------------------------------------------------------------------------------------------------------

            // La boucle for permet de tourner autant de fois qu'il y a de lignes dans le tableau multi, donc 2 tour de boucle dans notre cas.
            for($i = 0; $i < count($tab_multi); $i++) // on dit que tant que i est inférieur au nombre qui est ds mon tableau ( 2) elle va tourner.
            {
                echo '<div class="col-md-2 offset-md-5 alert alert-success text-dark mx-auto text-center">';
                // on se sert de la variable $i de la boucle for pour aller crocheter à chaque indice du tableau multi et parcourir les données
                            // 0 tu va ds tab_multi puis indice 0...
                foreach($tab_multi[$i] as $key => $value) // key contient nom...value macron au premier tour
                {
                    echo "$key => $value<br>";
                }
                echo '</div>';
            }

                 echo '<hr><h2 class="display-4 text-center">Superglobales</h2><hr>';
                 
                 // Les superglobales sont des variables de type ARRAY, elles sont accessibles de partout, c'est à la fois dans l'espace globale et local, elles permettent de véhiculer des données

                 /*
                        $_SERVER : véhicule les données lié au serveur
                        $_GET : véhicule les données transmit dans l'URL
                        $_POST : véhicule les données dun formulaire , va recuperer en php tte les données 
                        $_FILES : véhicule les données d'un fichier umploader
                        $_COOKIE : véhicule les données d'un fichier cookie
                        $_SESSION : véhicule les données d'un session en cours
                        
                        elle s'appelent toujours avec le signe $ suivi d'un '_' et toujours en majuscule
                */



                echo '<pre>'; print_r($_SERVER); echo '</pre>'; // tableau array, lié au serveur est indiqué ici 

                echo '<hr><h2 class="display-4 text-center">Classe et objet</h2><hr>';

                // un objet est un autre type de données. Un peu à la manière d'un ARRAY , il permet de regrouper des informations.
                // Cependant , celà va beaucoup plus loin car on peut y déclarer des variables (appelée : attribut ou propriété) mais aussi des fonctions (appelée : méthodes).
                // Une classe est un peu comme un plan de construction, qui regroupe des données
                // par convention, la première lettre du nom de la classe est toujours majusucle


                class Etudiant // regroupement d'information
                {
                    public $prenom = 'Gregory'; // public permet de préciser que l'élément sera accessible de partout (il y a aussi proected et private.)

                    public $age = 26;
                    public function pays()
                    {
                        return 'France';
                    }
                }

                $objet = new Etudiant; // new permet d'instancier la classe Etudiant et d'en faire un objet .$objet est un exemplaire de la classe Etudiant, c'est un enfant de la classe
                // pour exploiter les données déclarées dans la classe,il faut créer un instance / un onjet de la classe

                echo '<pre>'; var_dump($objet); echo '</pre>'; // var_dump permet d'observer que l'on a bien un objet issu de la classe Etudiant à l'identifiant 1 et on observe auss les propriétés (variables) déclarés dans la classe
                echo '<pre>'; var_dump(get_class_methods($objet)); echo'</pre>'; // get_class_methods( permet d'afficher tout les méthodes (fonctions) issu de la classe Etudiant

                // on pioche dans un ARRAY avec les crochets '[]' / on pioche dans un objet toujours avec une flèche '->'
                echo "je m'appel : " . $objet->prenom . '<hr>';
                // en piochant dans l'objet, celà nous permet d'atteindre la propriété $prenom déclaré dans la  classe    
                echo "Mon age est : " . $objet->age . 'ans<hr>';
                echo "j'habite en' : " . $objet->pays() . '<hr>';


            ?>
        </div>

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>
</html>