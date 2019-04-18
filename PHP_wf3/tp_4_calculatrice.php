<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculatrice</title>

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <?php

    if (isset($_POST['calculer'])) {
        if (isset($_POST['nombre1']) && isset($_POST['operateur']) && isset($_POST['nombre2']))
         {
                if ($_POST['operateur'] == '+') {
                    echo "L' addition de " . $_POST['nombre1'] . " et de " . $_POST['nombre2'] . " sera égale à ";
                    echo $_POST['nombre1'] + $_POST['nombre2'];
                }
                elseif ($_POST['operateur'] == '-'){
                    echo "La soustraction de " . $_POST['nombre1'] . " et de " . $_POST['nombre2'] . " sera égale à ";
                    echo $_POST['nombre1'] - $_POST['nombre2'];
                }
                elseif ($_POST['operateur'] == '*'){
                    echo "La multiplication de " . $_POST['nombre1'] . " et de " . $_POST['nombre2'] . " sera égale à ";
                    echo $_POST['nombre1'] * $_POST['nombre2'];
                }
                elseif($_POST['operateur'] == '/'){
                    // on ne peut mettre de else avec a l' intérieur un if => elseif obligatoire, même si c' est la derniere condition
                        if($_POST['nombre2'] == 0){
                            echo 'Cette opération est impossible, veuillez choisir un autre chiffre que 0 pour le diviseur';
                        }else{
                            echo "La soustraction de " . $_POST['nombre1'] . " et de " . $_POST['nombre2'] . " sera égale à ";
                    echo $_POST['nombre1'] / $_POST['nombre2'];
                        }
                    
                }
            }
    }

    ?>

    <form method="post" action="">

        <input type="text" id="nombre1" name="nombre1">

        <select name="operateur" id="operateur">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <input type="text" id="nombre2" name="nombre2">

        <button type="submit" id="calculer" name="calculer">Calculer</button>

    </form>

</body>

</html>