<?php
// connexion à la BDD :
$pdo = new PDO(
    'mysql:host=localhost;dbname=haribo',
    'root',
    '',
    array(
        PDO:: ATTR_ERRMODE => PDO:: ERRMODE_WARNING,
        PDO:: MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
    )
    );

$contenu ="";

 $requet = $pdo->query("SELECT * FROM stagiaires");

 while($stagiaire=$requet->fetch(PDO::FETCH_ASSOC)){
// tant que tu trouve des stagiaires dans mon tableau,tu les affiches
    $contenu.='<tr>';
    $contenu.='<th scope="row">'.$stagiaire['id_stagiaire'].'< /th>';
    $contenu.='<td>'.$stagiaire['prenom'].'</td>';
    $contenu.='<td>'.$stagiaire['yeux'].'</td>';
    $contenu.='<td>'.$stagiaire['genre'].'</td>';


 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>