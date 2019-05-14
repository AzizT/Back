<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>02 Ajax Insert</title>

    <!-- link Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class="container">

        <h1 class="display-4 text-center">02 Ajax Insert</h1>
        
        <div id="resultat"></div>

        <form method="post" action="" class="col-md-6 offset-md-3 text-center">
            <div class="form-group">
                <label for="personne">Prénom</label>
                <input type="text" class="form-control" id="personne" name="personne" placeholder="Prénom a insérer">
            </div>
            <button type="submit" id="submit" class="btn btn-dark">Enregistrer</button>
        </form>
    </div>


    <!-- cdn jquery
    https://code.jquery.com/
    la 3.4.1, minified -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- lien de mon fichier js -->
    <script src="ajax2.js"></script>
</body>

</html>