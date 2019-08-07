<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>TCHAT !!</title>
</head>
<body>
    <!-- 
    Exercice : espace de dialogue (tchat)
    1. Modélisation et création 
        BDD : tchat
        Table : commentaire
                id_commentaire   // INT(3) clé primaire / auto-incrémentée
                pseudo           // VARCHAR(20)
                dateEnregistrment // DATETIME
                message           // TEXT 
    -->

    <div class="container">
        <h2 class="display-4 text-center">TCHAT</h2><hr>

        <?php 

            foreach($_POST as $key => $value)
            {
                // $_POST['pseudo'] = strip_tags('<style></style>');
                $_POST[$key] = strip_tags(trim($value)); // on passe en revue le formulaire en executant la fopnction strip_tags sur chaque valeur saisie dans le formulaire
                // trim() est une fonction prédéfinie qui supprime les espaces en début et fin de chaine
            }
            //2. Connexion à la BDD 
            $bdd = new PDO('mysql:host=localhost;dbname=tchat', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));

            //4. Récupération et affichage des saisies en PHP ($_POST)
            //echo '<pre>'; print_r($_POST); echo '</pre>';

            //5. Requete SQL d'enregistrement (INSERT)
            extract($_POST); // permet de transformer chaque indice du formulaire en variable
            if($_POST)
            {
                // failles XSS
                
                // $req = "INSERT INTO commentaire (pseudo,dateEnregistrement,message) VALUES ('$pseudo', NOW(), '$message')";

                // $resultat = $bdd->exec($req);

                // echo $req;

                // le fait de préparer la requete SQL permet de parer aux injections SQL

                $req = "INSERT INTO commentaire (pseudo, dateEnregistrement, message) VALUES (:pseudo, NOW(), :message)";

                $resultat = $bdd->prepare($req); 
                $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
                $resultat->bindValue(':message', $message, PDO::PARAM_STR);
                $resultat->execute();

                echo $req;

                //echo "Nombre d'enregistrement : $resultat<br>";

                /*
                    INJECTION SQL :
                    ok'); DELETE FROM commentaire; (

                    FAILLES XSS : 

                    <script type="text/javascript">
                    var point = true;
                    while(point == true)
                    alert("J'ai planté ton site !!")
                    </script>

                    <style>
                    body{
                        display: none;
                    }
                    </style>

                    Pour parer aux failles XSS, il existe plusieurs fonctions prédéfnines :
                    - strip_tags() : permet de supprimer les balises HTML
                    - htmlspecialchars() : permet de rendre innoffensives les balises HTML
                    - htmlentities() : permet de convertir les balises HTML en entités HTML
                */

                
            }

            //6. Affichage des messages (SELECT)
            $resultat = $bdd->query("SELECT pseudo, message, DATE_FORMAT(dateEnregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(dateEnregistrement, '%H:%i:%S') AS heurefr FROM commentaire ORDER BY dateEnregistrement DESC");

            while($commentaire = $resultat->fetch(PDO::FETCH_ASSOC))
            {
                //echo '<pre>'; print_r($commentaire); echo '</pre>';
                echo '<div class="col-md-6 offset-md-3 alert alert-secondary">';
                    echo "<div><em>Par <strong>$commentaire[pseudo]</strong>
                    , le $commentaire[datefr] à $commentaire[heurefr]</em></div><hr>";
                    echo "<div class='text-justify'>$commentaire[message]<br></div>";
                echo '</div>';
            }

            echo "<hr><div class='text-center'>Nombre de commentaire(s) : <strong class='badge badge-danger'>" . $resultat->rowCount() . '</strong></div>'; // rowCount() est une méthode PDOStatement qui retourne le nombre de ligne resultant de la requete SELECT
        ?>
        <!-- 3. Création d'un formulaire HTML (pour l'ajout de message) -->
        <hr><form class="col-md-4 offset-md-4 text-center" method="post" action="">
            <div class="form-group">
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
            </div>
            <button type="submit" class="col-md-12 btn btn-dark mb-4">Poster</button>
        </form>
    </div>
</body>
</html>