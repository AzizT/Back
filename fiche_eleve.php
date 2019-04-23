<?php
    echo '<pre style="background:teal;color:white;" >'; var_dump($_POST); echo '</pre>';
    // affiche un tableau array non conventionnel ( var dump + précis que print-r)

    $msg_nom = "";
    $msg_prenom = "";
    $msg_classe = "";
    $msg_parent = "";
    $msg_telephone = "";
    $msg_valid = "";

                                                                               // EN PREMIER ON VERIFIE LES CHAMPS



    // différentes vérifications de champs supplémentaires

    //pour le pseudo***********************************************************************************
    // if (!isset($_POST['pseudo']) || strlen($_POST['pseudo']) < 2 || strlen($_POST['pseudo']) > 20) {
    //     $msg .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre pseudo entre 2 et 20 caractères</div>';
    // }

    // // if (iconv_strlen($_POST['pseudo']) < 2 || iconv_strlen($_POST['pseudo']) > 20) {
    // // echo '<div class="alert alert-warning text-danger"> Veuillez saisir votre pseudo  entre 2 et 20 caractères</div>';
    // // }
    // // les deux méthodes ci dessus sont équivalentes

    // verifier que deux mots deux passes sont identiques*************************************************************************************

    // if ($_POST['password'] !== $_POST['password2']) {
    //     $msg .= '<div class="alert alert-warning text-danger">Vos mots de passe doivent etre identiques</div>';
    // }

    // vérifier email 
    // if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    //     $msg .= '<div class="alert alert-warning text-danger">Votre Email n\' est pas valide</div>';
    // }

    // vérifier codepostal**********************************************************************************************************************
    // if(!is_numeric($_POST['codePostal']) || iconv_strlen($_POST['codePostal']) !== 5){
    //     $msg .= '<div class="alert alert-warning text-danger">Veuillez saisir 5 chiffres</div>';
    //     // iconv permet de ne compter que les caracteres, alors qur strlen va compter les caracteres spéciaux aussi, comme un accent ( qui ne sera pas compté car au dessus d' un autre caractere)
    // }


    if ($_POST) {
        // extract($_POST);
        // extract permet de raccourcir, simplifier la syntaxe (exemple ligne 2 pourle nom) + peut ecrirre empty comme !isset

        // le nom
        if (!isset($_POST['nom']) || iconv_strlen($_POST['nom']) < 2 || iconv_strlen($_POST['nom']) > 30) {
            // if (empty($nom) || iconv_strlen($nom) < 2 || iconv_strlen($nom) > 30) {
            $msg_nom .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre nom entre 2 et 30 caractères</div>';
        }

        // le prenom
        if (!isset($_POST['prenom']) || iconv_strlen($_POST['prenom']) < 2 || iconv_strlen($_POST['prenom']) > 30) {
            $msg_prenom .= '<div class="alert alert-warning text-danger"> Veuillez saisir votre prenom entre 2 et 30 caractères</div>';
        }

        // la classe
        if (!isset($_POST['classe']) || iconv_strlen($_POST['classe']) < 2 || iconv_strlen($_POST['classe']) > 30) {
            $msg_classe .= '<div class="alert alert-warning text-danger"> Veuillez saisir la classe entre 2 et 30 caractères</div>';
        }

        // le parent
        if (!isset($_POST['parent_contact']) || iconv_strlen($_POST['parent_contact']) < 2 || iconv_strlen($_POST['parent_contact']) > 30) {
            $msg_parent .= '<div class="alert alert-warning text-danger"> Veuillez saisir le nom du parent entre 2 et 30 caractères</div>';
        }

        // le telephone
        if (!preg_match('#^[0-9]{10}+$#', $_POST['telephone'])) {
            // preg_match est une expression réguliere (regex) qui toujours entourée de # afin de préciser les options
            /*
        ^ indique le début de la chaine
        $ indique la fin de la chaine
        + est ici pour dire que les caracteres peuvent etre utilisés plusieurs fois
        */
            $msg_telephone .= '<div class="alert alert-warning text-danger"> Veuillez entrer votre numéro de téléphone de 10 chiffres</div>';
        }

        if (empty($msg_nom || $msg_prenom || $msg_classe || $msg_parent || $msg_telephone)) {
            // les deux syntaxes sont ok (dessus moi, dessous; alpha, a prendre en priorité)
            // if (empty($msg_nom) && empty($msg_prenom) && empty($msg_classe) && empty($msg_parent) && empty($msg_telephone)) {
            // si aucun message d' erreur, message de validation, ci dessous, puis on passe a la connexion




                                   // EN SECOND, APRES TOUTES LES V2RIFICATIONS DES CHAMPS, SI LE FORMULAIRE A ETE BIEN REMPLI, ON SE CONNCTE A LA BASE DE DONNEES 






            // 1 - Je me connect
            $pdo = new PDO(
                'mysql:host=localhost;dbname=eleve',
                'root',
                '',
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
                )
            );



                                                           // EN TROISIEME, UNE FOIS CONNECTE? ON INSERE LES DONNEES A LA BDD




            //2 - Je prépare l'insertion des valeur saisies dans les champs du formulaire
            $requet = $pdo->prepare("INSERT INTO infos_eleve (nom,prenom,classe,parent_contact,telephone) VALUES (:nom,:prenom,:classe,:parent_contact,:telephone)");
            $requet->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
            // $requet->bindValue(':nom', $nom);
            // ligne cidessus si on utilise l' extract
            $requet->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
            $requet->bindValue(':classe', $_POST['classe'], PDO::PARAM_STR);
            $requet->bindValue(':parent_contact', $_POST['parent_contact'], PDO::PARAM_STR);
            $requet->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_STR);
            /*
                test de sylvain avec une boucle foreach
                foreach($_POST as $key => $value)
                {
                    $requet -> bindValue(":key, $value, PDO::PARAM_STR)
                }
                */





                                                    // EN QUATRIEME; UNE FOIS TERMINE LES INSERTIONS, IL NE FAUT PAS OUBLIER D' EXECUTER NOTRE REQUETE





            // J'execute l'insertion en BDD
            $requet->execute();

            $msg_valid .= '<div class="alert alert-success">Le formulaire est validé.</div>';




            // permet de faire un recapitulatif de tout le tableau d' insertion, en non conventionnel

            $resultat = $pdo->query("SELECT * FROM infos_eleve");
            $eleves = $resultat->fetchAll(PDO::FETCH_ASSOC);

            echo "<pre>";
            print_r($eleves);
            echo "</pre>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- link bootstrap -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <title>formulaire</title>
</head>
<body>
<div class="container">

    <form method="post" action="">
    <?= '<div class="alert al ert-succes s">' . $msg_valid . '</div>'; ?>
               

                <div class="row ">
                
                    <label for="nom">Nom</label>
                    <?= $msg_nom; ?>
                    <div class="form-group col-md-2">
                    <input type="text" class="form-control mb-2" id="nom" name="nom" placeholder="nom">
                    </div>
                
               
                    <label for="prenom">Prenom</label>
                    <?= $msg_prenom; ?>
                    <div class="form-group col-md-2">
                    <input type="text" class="form-control mb-2" id="prenom" name="prenom" placeholder="Prenom">
                     </div>    
                </div>
                
                
                
                

                
                <div class="row">
                     <label for="classe">Classe</label>
                     <?= $msg_classe; ?>
                     <div class="form-group col-md-2">
                     <input type="text" class="form-control mb-2" id="classe" name="classe" placeholder="classe">
                     </div>

                     <label for="parent_contact">Parent</label>
                     <?= $msg_parent; ?>
                     <div class="form-group col-md-2">
                    <input type="text" class="form-control mb-2" id="parent_contact" name="parent_contact" placeholder="Parent">
                     </div>
                </div>    


                <label for="classe">Telephone</label>
                <?= $msg_telephone; ?>
                <div class="form-group col-md-5">
                    <input type="text" class="form-control mb-2" id="telephone" name="telephone" placeholder="Telephone">
                </div>

                <button type="submit" class="form-group col-md-5 btn btn-outline-danger btn-warning">Envoyer</button>
                
    </form>





                                         <!-- rien a voir avec fiche eleve, mais important: COMMENT FAIRE TABLEAU CONVENTIONNEL -->

<?php
// CREATION DU TABLEAU

    // $tab_multi = array(
    //         0 => array("nom" => "Chadli", "salaire" => 100000),
    //         1 => array("nom" => "Mobutu", "salaire" => 100000000),
    //         2 => array("nom" => "Amin Dada", "salaire" => 10000000000000)
    //     );
    //     echo '<pre>';
    //     print_r($tab_multi);
    //     echo '</pre>';

    //     A PARTIR DU TABLEAU QU ON VIENT DE CREER; VOICI COMMENT FAIRE POUR PRINTER/ ECRIRE DANS UN TABLEAU CONVENTIONNEL

    //     // exo afficher l' ensemble du tableau multi a l' aide d' une boucle foreach
    //     foreach ($tab_multi as $key => $tab)
    //         // ici ce key représentera l' indice ( 0 et 1) et le tab le array ( chacun des deux tableaux)
    //         {
    //             echo '<div class="col-md-3 offset-md-5 alert alert-success text-dark mx-auto text-center">';
    //             foreach ($tab as $key2 => $value) {
    //                 // on rappelle notre $tab, car il faut linker le foreach dans le foreach
    //                 echo "$key2 => $value <br>";
    //             }
    //             echo '</div>';
    //         }
    //     echo '<hr>';

        ?>
            
</div>

            
          
            







<!--CDN JS--->  

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>
</html>