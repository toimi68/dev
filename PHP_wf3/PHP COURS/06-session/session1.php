<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>SESSION PHP</title>
</head>
<body>
    <div class="container">
        <h1 class="display-4 text-center">SESSION PHP</h1><hr>

        <?php 
        // Une session est un moyen simple de garder des varaibles accessibles quelque soit la page où l'on se trouve
        // Par exemple, sans une session active, nous ne pourrions pas naviguer sur un site tout en restant connecté
        // Les sessions sont conservés côté serveur puisqu'elles contiennent des données sensibles tel que votre email, nom, prénom etc...
        session_start(); // permet de creéer un fichier session se trouvant dans le dossier c:/xampp/tmp

        // on stock des données dans la session en créant des indices au tableau ARRAY
        $_SESSION['pseudo'] = 'GregFormateur';
        $_SESSION['nom'] = 'LACROIX';
        $_SESSION['prenom'] = 'Grégory';

        echo '<pre>'; print_r($_SESSION); echo '</pre>';

        // vider une partie de la session 
        unset($_SESSION['prenom']); 

        echo '<pre>'; print_r($_SESSION); echo '</pre>';

        // supprimer la session 
        //session_destroy();




        ?>
    </div>
</body>
</html>