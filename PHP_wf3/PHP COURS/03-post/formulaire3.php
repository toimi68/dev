<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Formulaire 3</title>
</head>
<body>
    <!-- Réaliser un formulaire HTML (pseudo, email) en récupérant les données directement sur la page formulaire4.php -->

    <h1 class="display-4 text-center">Formulaire 3</h1><hr>

    <form class="col-md-4 offset-md-4" method="post" action="formulaire4.php">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter pseudo">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">

    </div>
    <button type="submit" class="btn btn-dark">Connexion</button>
    </form>
</body>
</html>