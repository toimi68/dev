<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <!--Lien Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- CDN Jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>

    <!-- lien de notre fichier JS -->
    <script src="ajax2.js"></script>

    <title>02 AJAX INSERT</title>
</head>
<body>
    <div class="container">
        <h1 class="display-4 text-center">02 AJAX INSERT</h1><hr>
        <div id="resultat"></div>

        <form method="post" action="" class="col-md-6 offset-md-3 text-center">
        <div class="form-group">
            <label for="personne">Prénom</label>
            <input type="text" class="form-control" id="personne" placeholder="Prénom à insérer">
        </div>
        <button type="submit" id="submit" class="col-md-12 btn btn-dark">Enregistrer</button>
        </form>
    </div>
</body>
</html>