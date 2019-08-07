<?php
echo '<pre style="background:teal; color:black;" >';
var_dump($_POST);
echo '</pre>';

$msg ="";

if($_POST) {
// le '!' signifie différent
if (!isset($_POST['prenom']) || strlen($_POST['prenom']) <3 || strlen($_POST['prenom']) >100 {
    $msg .='<div class="alert alert-warning text-danger">Veuillez saisir votre prénom (entre 3 et 100 caractères)</div>';
    } // FIN if(!isset($_POST['prenom'])
    if (!isset($_POST['yeux']) || strlen($_POST['yeux']) <3 || strlen($_POST['yeux']) >30 {
    $msg .='<div class="alert alert-warning text-danger">Veuillez saisir votre prénom (entre 3 et 30 caractères)</div>';
    }// FIN if(!isset($_POST['yeux'])
    if (!isset($_POST['genre']) || ($_POST['genre'] || $_POST['genre']! ="") {
    $msg .='<div class="alert alert-warning text-danger">Veuillez saisir votre prénom (entre 3 et 30 caractères)</div>';
    }// FIN if(!isset($_POST['genre'])
    
    if (empty($msg)) {
        // si y'a pas de message d'erreur, tu m'execute le code suivant

        $pdo = new PDO(
            'mysql:host=localhost;dbname=haribo',
            'root',
            '',
                array(
                    PDO:: ATTR_ERRMODE => PDO:: ERRMODE_WARNING,
                    PDO:: MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
                )

            );

            $requet=$pdo->prepare("INSERT INTO stagiaires (prenom, yeux, genre) VALUES (:prenom,:yeux,:genre)");
            // methode de sécurité par insertion. on lui dit d'entrer ds le tableau,les valeurs suivantes.
            $requet->bindParam(':prenom', $_POST['prenom']);
            $requet->bindParam(':yeux', $_POST['yeux']);
            $requet->bindParam(':genre', $_POST['genre']);
            // blindParam est une méthode de sécurité par php, le marqueur correspond au dollar post nom

            $requet->execute();

            header('location:liste.php')

    }

} // FIN if ($_POST)

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

 <div class="container mt-5">

  <form méthod="post">
    <?php echo $msg;?>
    <input type="text" name="prenom" placeholder="prenom">
    <br><br>
    <input type="text" name="yeux" placeholder="yeux">
    <br><br>
    <select name="genre"> 
    <option value="">-- Genre-- </option>
     <option value="f">-- Femme-- </option>
      <option value="h">-- Homme-- </option>
      </select>
    <br><br>

    <input type="submit">
    </form>


    
<!-- Lien:
    1- JQuery Bootstrap
    2- Ajax Bootstrap
    3- Poppers Bootstrap  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>
</html>