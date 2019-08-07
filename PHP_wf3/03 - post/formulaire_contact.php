<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire de contact</title>
</head>
<body>
        <!-- 1 .Réaliser un formulaire avec les champs suivants : objet, email, message et un bouton submit
             2. Controler en PHP qie l'on receptionne bien toute les données du formulaiure 
        -->
    

    <?php
        echo '<pre>'; print_r($_POST); echo '</pre>';

    // On vérifie si on a bien cliqué sur le bouton submit qui a pour attribue name'submit',si nous avions plusieurs formulaire sur la même page,la condition permet de différencier quel forumulaire a été validé
    if(isset($_POST['submit'])) 
    {
        // 1er argument :
        $destinataire = "nassim.amara@lepoles.com"; 
        
        // 2ème arguments : 
        $sujet = $_POST['objet'];

        // 3ème arguments : 
        $message = $_POST['message'];

        // 4ème arguments : obligatoire
        $entetes = "MIME-Version 1.0 \n"; // est un standard internet qui étend le format de données des courriels pour supporter des textes en différents codage des caractères autres que l'ASCII, des contenus non textuels, des contenus multiples, et des informations d'en-tête en d'autres codages que l'ASCII.

        // entetes expéditeur : toujours 'From' et non autre chose. ex 'De'.
        $entetes .= "From: $_POST[email]\n";

        // entetes d'adresse de retour :
        $entetes .= "Reply-to: nassim.amara@lepoles.com \n";

        // priorité urgence : 
        $entetes .= "X-priority: 1\n";

        // type de contenu HTML
        $entetes .= "Content-type: text/html; charset=utf-8\n"; 

        // fonction prédéfinies permettant l'envoi de mail / toujours 4 arguments : destinaires/sujet/message/expéditeur. L'ordre est crucial sinon le test ne fonctionne pas
        mail($destinataire,$sujet,$message,$entetes); 
    }
     ?>

        <!-- Champ email -->
        <div class="container">
         <h1 class="display-4 text-center"> Formulaire de Contact </h1> <br>
       
        <form class="col-md-4 offset-md-4" method="post" action="">
        <div class="form-group">
           <label for="objet">Objet</label>
          <input type="objet" class="form-control" id="objet" name="objet" placeholder="Enter objet">
    </div>
     <div class="form-group">
           <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
     <div class="form-group">
           <label for="message">Message</label>
          <input type="text" class="form-control" id="message" name="message" placeholder="Enter message">
    </div>


    <button type="submit" name="submit" class="col -md-12 btn btn-primary mb-4">Submit</button>
     </div>
</body>
</html>