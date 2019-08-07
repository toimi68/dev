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
    <div class="container ">
        <h1 class=" display-4 text-center" span style="border-bottom: 4px dashed orange">SESSION PHP</span></h1><hr>

        <?php
            // Une session est un moyen simple de garder des variables accessibles quelque soit la page où l'on se trouve
            // Par exemple, sans une session active,nous ne pourrions naviguer sur un site tout en restant connecté
            // Les session sont conservés côté serveur  puisqu'elles contiennent des données sensibles tel que votre email, nom, prénom etc...

        session_start (); // permet de créer un fichier session se trouvant dans le dossier c:/xampp/tmp (tmp pour temporaire)

        $_SESSION['pseudo'] = 'GregFormateur';
        $_SESSION['nom'] = 'LACROIX';
        $_SESSION['prenom'] = 'Gregory';

        echo '<pre>'; print_r($_SESSION); echo '</pre>';
       
        // vider une partie de la session 
        unset($_SESSION['prenom']); 

        echo '<pre>'; print_r($_SESSION); echo '<pre>';

        // supprimer la session
        // session_destroy();
        ?>
    </div>
</body>
</html>