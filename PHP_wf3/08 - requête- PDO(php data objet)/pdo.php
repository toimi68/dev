<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Requête PDO</title>
</head>
<body>
    <div class="container"></div>
        <h2 class=" display-4 text-center">01. PDO : Connexion </h2><hr>

    <?php
    /*
        class PDO 
        {
            // méthodes (fonctions)
            // propriétés (variables)
               public function query ()
               {

               } 
    */  
    
        // connexion à la BDD
        $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO:: ERRMODE_WARNING, PDO:: MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
    /*

               PDO est une classe prédéfinie en PDP qui permet de se connecter à une base de donnée. Cette classe possède ses propres méthodes (fonctions) qui nous permettrons par exemple de formuler et d'exécuter une requête SQL
               $pdo est l'objet qui permet d'intéragir, de dialoguer, d'intérroger la BDD

               arguments : 1 (serveur + BDD) / 2 (identifiant) / 3 (mot de passe) / 4 (les options PDO)
    */

        echo '<pre>'; var_dump($pdo); echo'</pre>'; // affiche l'objet PDO
        echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>';
        // affiche les méthodes issu de la class prédéfinie PDO

        echo '<hr><h1 class="display-4 text-center">02. PDO : EXEC - INSERT / UPDATE / DELETE </h2><hr>';
        
        // Exo : formuler la requete permettant de vous insérer dans la BDD entreprise donc dans la table employes

        // INSERT
        // $true n'est pas définie, donc on entre pas dans la condition if(isset($true))
        //permet de ne plus avoir l'insert à chaque rechargement de la page
        if(isset($true))

        {
        $resultat = $pdo ->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES
        ('Nassim', 'Amara', 'm', 'ministre', '2018-12-19', 8000)");
        echo "Nombre d'enregistrement affecté(s) par l'INSERT : $resultat<br>";
        echo "Dernier ID généré : " . $pdo->lastInsertId() . '<hr>';
        }


        /*
            EXEC() est une méthode issue de la classe Prédéfinie PDO, elle permet de formuler et executer des requêtes SQL, c'est en argument (entre les parenthèses de la méthode) que l'on envoie la requête complète
            EXEC () est prévu pour des requetes ne retournant pas de jeu de résultats (INSERT /UPDATE / DELETE)
        */
        //  UPDATE
        // Exo : réaliser le traitement permettant de modifier le salaire de l'employé n°350 par    1200.

        $resultat = $pdo ->exec("UPDATE employes SET salaire = 1200 WHERE id_employes=350");
        echo "Nombre d'enregistrement affecté(s) par l'UPDATE : $resultat<br>";
        
        // DELETE
        // Exo : réaliser le traitement permettant de supprimer l'employé n° 350

        $resultat = $pdo ->exec("DELETE FROM employes WHERE id_employes=350"); 
         echo "Nombre d'enregistrement affecté(s) par DELETE : $resultat<br>";
        
         echo '<hr><h2 class="display-4 text-center">03. PDO : SELECT + FETCH_ASSOC (1 seul résultat)</h2><hr>';

            /*
            requete selection -> query () -> retour objet PODStatement(inexploitable)
            pour exploiter le résultat -> associe une méthode --> fetch() / fetchAll() (class PDOStatement)-> retourne  tableau ARRAY
            Si plusieurs résultats --> boucle !!!
            */

         $result = $pdo->query("SELECT * FROM employes WHERE id_employes = 415");

         echo '<pre>'; var_dump($result); echo '</pre>';
         echo '<pre>'; var_dump(get_class_methods($result)); echo '</pre>';

         $employe = $result ->fetch(PDO::FETCH_ASSOC); // retourne un tableau ARRAY indexé avec le nom des champs 
         //$employe = $result ->fetch(PDO:FETCH_NUM); // retourne un tableau ARRAY indexé numériquement
         //$employe = $result ->fetch(PDO:FETCH_BOTH); // retourne un tableau ARRAY indexé numériquement et avec le nom des champs
         // il n'est pas possible d'associer 2 fois la même méthode sur le méme résultat.

         echo '<pre>'; print_r($employe); echo '</pre>';

          // Exo : afficher les informations à l'aide d'un affichage conventionnel en excluant l'id_employes
         echo '<div class="col-md-4 offset-md4- mx-auto alert alert-primary text-center">';
            foreach($employe as $key => $value) 
            {
                if($key != 'id_employes')
                {
                    echo "$key :$value <hr>";
                }   
            }
            echo '</div>';

            /* QUERY() est une méthode issue de la classe PDO qui permet de formuler et d'éxéctuer des requetes SQL. Elle est prévu pour des requetes retourant un jeu de résultat (SELECT).
            Lorsqu'on execute une requete de selection, on obtient toujours en retour un autre objet, issu d'une autre classe : PDOStatement.
            Cette classe possède ses propres propriétés et méthode
            La méthode fetch () permet de rendre le résultat exploitable sous forme de tableau de données ARRAY.
            */

            echo '<hr><h2 class="display-4 text-center">04. PDO : QUERY + SELECT + WHILE  (1 seul résultat)</h2><hr>';

            $resultat = $pdo->query("SELECT * FROM employes"); // la fleche permet de piocher ds l'objet la méthode query qui sert à executé une requete sql qui va retourné un objet de resultat

            echo '<pre>'; var_dump($resultat); echo '</pre>';

            // En executant une requete de selection, on obtient en retour un objet PDOStatelement,cet objet est inexploitable en l'état, on lui associe donc la méthode FETCH qui retourne un tableau
            // pour récupérer l'ensemble des employés, dans ce cas précis, nous sommes obligé de boucler
            // la boucle while permet de dire : tant qu'il y a des employes, on boucle!!
            // $employes receptionne un tableau ARRAY d'un empliyé par tour de boucle

            while ($employes = $resultat->fetch(PDO::FETCH_ASSOC)) // a un array par boucle
            { 
               echo '<pre>'; print_r($employes); echo '</pre>'; // pour chaque tour de boucle while,employé contiendra......
               echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
               echo $employes['nom'] . '<hr>'; // pour chaque tour de boucle,donc pour chaque tableau ARRAY, on va crocheter aux différents indices
               echo $employes['prenom'] . '<hr>';
               echo $employes['service'] . '<hr>';
               echo $employes['salaire'] . '<hr>';
               echo '</div>';
            }
           
            echo '<hr><h2 class="display-4 text-center">05. PDO : QUERY + FETCHALL + FETCH_ASSOC (plusieurs résultats)</h2><hr>';

            $resultat = $pdo->query("SELECT * FROM employes"); // on lui envoie la requête en argument

            $donnees = $resultat-> fetchAll(PDO::FETCH_ASSOC);// fetchAll() retourne un tableau  ARRAY multidimensionnel avec chaque tableau(de chaque employé) indexé numériquement

            echo '<pre>'; print_r($donnees); echo '</pre>';

            // Exo : afficher successivement les données de chaque employé à l'aide de boucle foreach (indice: boucle imbriquée)
            
            //tab receptionne un tableau ARRAY d'un employé par tour de boucle
            foreach ($donnees as $key => $tab)  //[0]  => ARRAY

            {                
                echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-warning text-center">';

                //la boucle foreach permet de passer en revue chaque tableau de chaque employé
                foreach($tab as $key2 => $value) // ARRAY [nom] => 'Gregory'
                {
                    echo "$key2 => $value<hr>";
                }
                echo '</div>';
            }
            
            echo '<hr><h2 class="display-4 text-center">06. PDO : QUERY + BDD </h2><hr>';

            // Exo : afficher la liste des base de données, puis les mettre dans une liste ul li
          
            $resultat = $pdo->query('SHOW DATABASES'); // resultat c'est PDOStatement dans c conditions,

            echo  '<ul class="col-md-4 offset-md-4 mx-auto list-group text-center">';
            // $data receptionne un tableau ARRAY par tour de boucle contenant les informations d'une BDD
            while($data = $resultat->fetch(PDO:: FETCH_ASSOC))
            {
                // echo '<pre>'; print_r($donnees); echo '</pre>';
                 echo '<li class="list-group-item ">' . $data['Database'] . '</li>';
                 // on va crocheter  à l'indice [Database] pour afficher le nom de la BDD
            }
            
             echo '</ul>';

              //$donnees = $resultat-> fetchAll(PDO::FETCH_ASSOC);// autre méthode pour voir tte notre base de données

              echo  '<hr><h2 class="display-4 text-center">07. PDO : QUERY + TABLE </h2><hr>';

              $resultat = $pdo->query("SELECT * FROM employes");

              // echo $resultat->columnCount();

              /*
                 columnCount () est une méthode issue de la classe PDOStatement qui retourne le nombre de colonne selectionnés via la requete de selection, dans notre cas retourne integer 7, donc la boucle for tourne 7 fois, autant de fois qu'il u a de colonnes

                getColumnMeta () est une méthode issue de la classe PDOStatement qui permet de recolter les informations des champs /colonne sélectionnées
              */

              echo '<table class="table table-bordered text-center"><tr>'; //1ère ligne,tr,
              for($i = 0; $i < $resultat -> columnCount(); $i++) // va compter combien de colonne employé on a donc 7.... 
              {
                    $colonne = $resultat ->getColumnMeta($i); // methode qui permet de recolter les info des champs et des colonnes
                    echo '<pre>'; print_r($colonne); echo '</pre>';
                    echo "<th>$colonne[name]</th>"; // on va crocheter à l'indice 'name' pour afficher en entete le nom de la colonne par tour de boucle
              }
              echo '<tr>';
              // $employé receptionne un tableau ARRAY par employes par tour de boucle
              while($employe = $resultat->fetch(PDO::FETCH_ASSOC))
              {
                  // echo' <pre>'; print_r($employe); echo '</pre>';
                  echo '<tr>';
                  // la boucle foreach peremt de parcourir chaque tableau ARRAY de chaque employé
                  foreach($employe as $value)
                  {
                        echo "<td>$value</td>";
                  }
                  echo '</tr>';
              }
              echo '</table><hr>';

              // Exo : faire la même chose en utilisant la méthode fetchAll

              $resultat = $pdo->query("SELECT * FROM employes");
              $employes = $resultat->fetchALL(PDO::FETCH_ASSOC);

                echo' <pre>'; print_r($employes); echo '</pre>';

                echo '<table class="table table-bordered text-center"><tr>';
                // on va crocheter au premier indice du tableau multi pour récupérer les iindices et les stockés dans les entetes <th></th>
                foreach($employes[0] as $key => $value) //  ici au premier tour, key vaut id_employes
                {
                    echo "<th>$key</th>";
                }
                echo '</tr>';
                // $tab contient un ARRAY d'un employé par tour de boucle
                foreach($employes as $tab)                {
                    echo '<tr>'; // on crée une ligne par employé
                    // la boucle foreach permet de parcourir chaque tableau ARRAY de chaque employés
                    foreach($tab as $infos)
                    {
                        echo "<td>$infos</td>";
                    }
                    echo '</tr>';
                }
                echo '</table>';

                echo  '<hr><h2 class="display-4 text-center">08. PDO : PREPARE + BINDVALUE + EXECUTE </h2><hr>';

                // les requêtes préparées permettent de formuler une seule fois la requete et de l'exécutée autant de fois que souhaité
                // les requetes préparées permettent de parer(eviter) aux injections SQL, cela permet de protéger les requetes SQL
                // 3 cycles dans une requêtes : Analyse / interprétation / execution

                $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom"); // ici on prépare la requete mais a aucun moment on l'exécute
                // :nom --> marqueur nominatif que l'on peux comparer à une boite ou à un tampon

                echo '<pre>'; print_r($resultat); echo '</pre>';
                $resultat->bindValue(':nom', 'amara', PDO::PARAM_STR); //PDO::PARAM_STR c'est pour préciser les donné que l'on va envoyer a notre marqueur
                //bindValue () --> méthode PDOStatement . Elle permet d'associer une valeur au marqueur nominatif ':nom'
                // arguments bindValue(nom_du_marqueur, valeur, type)
                // A ce stade la requete n'a toujours pas été exécutée
                $resultat->execute(); // méthode PDOStatement / permet d'executer la requete préparée
                 echo '<pre>'; print_r($resultat); echo '</pre>';

                 // Exo : afficher le résultat de la requete préparée à l'aide de la méthode et boucle
                
                  $employes = $resultat->fetch(PDO::FETCH_ASSOC);
                 
                  echo '<pre>'; print_r($employes); echo '</pre>';

                  echo '<div class="col-md-4 offset-md-4 mx-auto alert alert-info text-center">';
                  foreach($employes as $key => $value)
                  {
                      echo "$key : $value<hr>";
                  }
                  echo '</div><hr>';
                  
                  // ----------------------------------------------------------------------------------

                  $nom = 'Dubar';// la valeur du marqueur peut être aussi une variable
                  $resultat->bindValue(':nom', $nom, PDO::PARAM_STR);// on change la valeur du marqueur sans avoir à reformuler la requete SQL 
                  $resultat->execute();// on éxecute la requete
                  $employes = $resultat->fetch(PDO::FETCH_ASSOC);
                  echo '<pre>'; print_r($employes); echo '</pre>';
 

    ?>

</body>
</html>