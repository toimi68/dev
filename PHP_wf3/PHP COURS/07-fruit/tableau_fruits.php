<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Tableau Fruits PHP</title>
</head>
<body>

    <div class="container">

        <h1 class="display-4 text-center">TABLEAUX FRUITS</h1><hr>
    <?php
        require_once("fonction.php");

        // 1- Déclarer un tableau ARRAY avec tout les fruits
        $tab_fruits = array("cerises","pommes", "bananes", "peches");

        //2- Déclarer un tableau ARRAY avec les poids suivants : 100, 500, 1000, 1500, 2000, 3000, 5000, 10000.
        $tab_poids = array(100, 500, 1000, 1500, 2000, 3000, 5000, 10000);

        // 3- Affichez les 2 tableaux
        echo '<pre>'; print_r($tab_fruits); echo '</pre>'; 
        echo '<pre>'; print_r($tab_poids); echo '</pre>';

        //4- Sortir le fruit "cerises" et le poids 500 en passant par vos tableaux pour les transmettres à la fonction "calcul()" et obtenir le prix.
        echo '<hr>' . calcul($tab_fruits[0], $tab_poids[1]) . '<hr>';

        //5- Sortir tout les prix pour les cerises avec tout les poids (indice: boucle).
        // $tab_poids = array(100, 500, 1000, 1500, 2000, 3000, 5000, 10000);

        echo '<div class="col-md-6 offset-md-3 mx-auto alert alert-info text-center">';      //100
        foreach($tab_poids as $poids)
        {               // cerises    , 100
            echo calcul($tab_fruits[0], $poids) . '<hr>';
        }
        echo '</div><hr>';

        //6- Sortir tout les prix pour tout les fruits avec tout les poids (indice: boucle imbriquée).
                            // cerises
        foreach($tab_fruits as $fruit)
        {
            echo '<div class="col-md-6 offset-md-3 mx-auto alert alert-success text-center">';
            // la boucle foreach parcours tout les poids et ensuite on change de fruit
            foreach($tab_poids as $poids)
            {              // cerises, 100
                echo calcul($fruit, $poids) . '<hr>';
            }
            echo '</div><hr>';
        }
        
        //7- Faire un affichage dans une table HTML pour une présentation plus sympa.
        echo '<table class="table table-bordered text-center"><tr>'; 
        echo '<th>Poids</th>';
        foreach($tab_fruits as $fruit)
        {
            echo "<th>$fruit</th>";
        }
        echo '</tr>';
        foreach($tab_poids as $poids)
        {
            echo '<tr>'; 
            echo "<th>$poids g</th>";
            foreach($tab_fruits as $fruit)
            {
                echo "<td>" . calcul($fruit, $poids) . "</td>";
            }
            echo '</tr>';
        }
        echo '</table>';
  
    ?>
    </div>
</body>
</html>