<?php 

echo '<pre>';

var_dump($_POST);

'</pre>';

$error ="";

//.b

if($_POST)

{

    foreach($_POST as $key => $value)

    {

        echo"$key => $value<br>";

    }

    echo"<hr>";



    //.c

    if(empty($_POST['prenom']))

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Il faut remplir le champ prenom !! </div>';

    }

    if(iconv_strlen($_POST['prenom']) < 2 || iconv_strlen($_POST['prenom']) > 20 ) 

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Le prenom doit contenir entre 2 et 20 caractère !! </div>';

    }







    if(empty($_POST['nom']))

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Il faut remplir le champ nom !! </div>';

    }

    if(iconv_strlen($_POST['nom']) < 2 || iconv_strlen($_POST['nom']) > 20 ) 

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Le nom doit contenir entre 2 et 20 caractère !! </div>';

    }







    if(empty($_POST['email']))

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Il faut remplir le champ email !! </div>';

    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Adresse non valide !! </div>';

    }







    if(empty($_POST['adresse']))

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Il faut remplir le champ adresse!! </div>';

    }







    if(empty($_POST['code_postal']))

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Il faut remplir le champ code postal !! </div>';

    }

    if(iconv_strlen($_POST['code_postal']) !== 5 || !is_numeric($_POST['code_postal'])) 

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Le code postal est non valide !! </div>';

    }







    if(empty($_POST['genre']))

    {

        $error .='<div class = "col-md4 offset-md-4 alert alert-danger text-center text-dark">Il faut remplir le champ genre !! </div>';

    }

    echo $error;

    if(empty($error))

    {

        echo '<div class = "col-md4 offset-md-4 alert alert-success text-center text-dark">Instruction validé !! </div>';

    }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>

</head>

<body>

    <!-- .a -->

    <h1 class="display-4 text-center">Exo PHP</h1>

    <form class="col-md-4 offset-md-4" method="post" action=""> 

        <div class="form-group">

            <label for="exampleInputEmail1">Prenom</label>

            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Enter prenom">

        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">Nom</label>

            <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter nom">

        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">Email</label>

            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">

        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">Adresse</label>

            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Enter adresse">

        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">Code postal</label>

            <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="Enter code postal">

        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">Genre</label>

             <select class="form-control" id="genre" name="genre">
            <option value=""> - GENRE -</option>

            <option value="m">Masculin</option>
            <option value="f">Feminin</option>

        </div>

        <button type="submit" class="btn btn-dark">Submit</button>

    </form>





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>