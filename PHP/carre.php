

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        #bleu {
            width: 250px;
            height: 250px;
            background: blue;
        }

        #rouge {
            width: 250px;
            height: 250px;
            background: red;
        }
    </style>

    <title>Document</title>

</head>

<body>

    <div>header</div>

    <hr>

    <a href="?action=click"><button>cliquez</button></a>

    <hr>

    <?php

    if (empty($_GET)) {

        ?>

        <div id="bleu"></div>

    <?php } else { ?>

        <div id="rouge"></div>

    <?php } ?>

    <div>footer</div>

</body>

</html>