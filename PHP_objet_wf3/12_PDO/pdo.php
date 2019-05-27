<!-- link bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php
// exo: réaliser le traitement php pour se relier a la bdd entreprise

$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

echo '<pre>';
print_r($pdo);
echo '</pre>';
echo '<pre>';
print_r(get_class_methods($pdo));
echo '</pre>';

echo "<h2 class='display-4 text-center'>exemple n°1 SELECT + QUERY + FETCH</h2>";

$resultat = $pdo->query("tfrdyt");
// erreur de requete volontaire

echo '<pre>';
print_r($pdo->errorInfo());
echo '</pre>';
// en cas d' erreur de requete sql, errorInfo() contient le message d' erreur et les codes erreurs.

// exo: afficher les données de l' employé id 491

$resultat = $pdo->query("SELECT * FROM employes WHERE id_employes = 491 ");
$employes = $resultat->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($employes);
echo "</pre>";

echo '<div class="alert alert-success col-md-4 offset-md-4 mb-4 text-center text-dark">';
foreach ($employes as $key => $value) {
    echo "$key - $value<hr>";
}
echo '</div>';

echo "<h2 class='display-4 mt-4 mb-4 text-center'>exemple n°2 SELECT + QUERY + FETCHALL</h2>";
// afficher successivement les données de tous les employes en utilisant la methode fetchAll

$resultat = $pdo->query("SELECT * FROM employes");
$employes = $resultat->fetchAll(PDO::FETCH_ASSOC);
foreach ($employes as $key => $tab) {
    echo '<div class="alert alert-success col-md-4 offset-md-4 mb-4 text-center text-dark">';
    foreach ($tab as $key2 => $value) {
        echo "$key2 - $value<hr>";
    }
    echo '</div>';
}

echo "<h2 class='display-4 mt-4 mb-4 text-center'>exemple n°3 SELECT + QUERY + FETCH_ASSOC</h2>";

$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);

echo "<pre>";
var_dump($resultat);
echo "</pre>";

// exo: afficher l' ensemble des employes sous forme d' un tableau html via l' objet '$resultat'

// **********************************mon travail, qui fonctionne***************************************

// $resultat = $pdo->query("SELECT * FROM employes");
//         echo '<table class="table table-bordered text-center"><tr>';
//         for ($i = 0; $i < $resultat->columnCount(); $i++) {
//             $colonne = $resultat->getColumnMeta($i);

//             echo "<th>$colonne[name]</th>";

//         }

//         echo '</tr>';
//         while ($employe = $resultat->fetch(PDO::FETCH_ASSOC))

//             {

//                 echo '<tr>';
//                 foreach ($employe as $value)

//                     {
//                         echo "<td>$value</td>";
//                     }

//                 echo '</tr>';
//             }
//         echo '</table>';

// ***********************la correction de gregory, qui utilise une autre technique*******************************

echo '<table class="table table-bordered text-center"><tr></tr>';
for ($i = 0; $i < $resultat->columnCount(); $i++) {
    $colonne = $resultat->getColumnMeta($i);
    echo "<th>$colonne[name]</th>";
}
echo '</tr>';
foreach ($resultat as $employe) {
    echo '<tr>';
    foreach ($employe as $value) {
        echo "<td>$value</td>";
    }
    echo '</tr>';
}
echo '</table>';

echo "<h2 class='display-4 mt-4 mb-4 text-center'>exemple n°4 INSERT, UPDATE, DELETE</h2>";

// exo: insérez vous dans la bdd avec la requete INSERT
// insertion effectuée dans le tableau, et apparait dans la bdd, penser a regarder en page 2 si limité a 25

// $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES('Sylvain', 'Baillet', 'm', 'direction', '2019-02-09', 75000)");
$resultat = $pdo->exec("INSERT INTO employes VALUES (DEFAULT, 'Sylvain', 'Baillet', 'm', 'direction', '2019-02-09', 75000)");
// même ligne que celle du sessus, sauf que plus courte grace au DEFAULT
echo "nombre d' enregistrement affecté(s) par l' INSERT : $resultat <br>";

echo "<h2 class='display-4 mt-4 mb-4 text-center'>exemple n°5 PREPARE + '?' + FETCH</h2>";

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = ?");
// on va dans un premier temps préparer la requete sans la partie variable, que l'on représentera avec marquer sous forme de '?'

$resultat->execute(array("Gallet"));
// ici, Gallet va remplacer le '?', on doit mettre ? et pas autre chose
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - ');
// implode sert a extraire les données d' un tableau sous forme de chaine de caracteres, avec un séparateur

echo "<h2 class='display-4 mt-4 mb-4 text-center'>exemple n°6 PREPARE + ':' + FETCH</h2>";

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");

$resultat->execute(array("nom" => "Tobbal"));
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees, ' - ');

echo "<h2 class='display-4 mt-4 mb-4 text-center'>exemple n°7 PREPARE + ':' + FETCH_OBJ</h2>";
// exo: selectionner a l' aide d' une requete préparée les informations de l' employé 'Thoyer' et afficher ses données a l' aide de la methode FETCH_OBJ

$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");
$resultat->execute(array("nom" => "Baillet"));
$employe = $resultat->fetch(PDO::FETCH_OBJ);
// retourne un objet issu de la class stdClass avec chaque indice comme propriété public

echo "<pre>"; print_r($employe); echo "</pre>";

echo "Prenom : " . $employe->prenom . '<hr>';
//  si je veux n' afficher que son prenom

foreach($employe as $key => $value)
// boucle foreach() pour aller chercher toutes les infos
{
    echo "$key - $value<br>";
}
echo '<hr>';

echo "<h2 class='display-4 mt-4 mb-4 text-center'>exemple n°8 transaction + requete + annulation de celle ci</h2>";

$pdo->beginTransaction();

$result = $pdo->exec("UPDATE employes SET salaire = 1000");
echo "Nombre d' enregistrement affecté par 'l UPDATE : $result";
// cela a pour effet de faire passer tous les salaires, dans le tableau ( mais pas dans la bdd), a 1000

$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);
echo "<span>Avec le changement</span>";

echo '<table class="table table-bordered text-center"><tr></tr>';
for ($i = 0; $i < $resultat->columnCount(); $i++) {
    $colonne = $resultat->getColumnMeta($i);
    echo "<th>$colonne[name]</th>";
}
echo '</tr>';
foreach ($resultat as $employe) {
    echo '<tr>';
    foreach ($employe as $value) {
        echo "<td>$value</td>";
    }
    echo '</tr>';
}
echo '</table>';

// procedure d' annulation
$pdo->rollBack();
// permet de revenir a la situation antérieure en cas d' erreur
// et il faut réafficher le tableau, car le précédent se situe dans le code avant le rollback
// si on estime qu' il ne faut pas de rollback car pas d' erreur, alors il faudrait valider par $pdo->commit();
$resultat = $pdo->query("SELECT * FROM employes", PDO::FETCH_ASSOC);
echo '<table class="table table-bordered text-center"><tr></tr>';
for ($i = 0; $i < $resultat->columnCount(); $i++) {
    $colonne = $resultat->getColumnMeta($i);
    echo "<th>$colonne[name]</th>";
}
echo '</tr>';
foreach ($resultat as $employe) {
    echo '<tr>';
    foreach ($employe as $value) {
        echo "<td>$value</td>";
    }
    echo '</tr>';
}
echo '</table>';

echo "<h2 class='display-4 mt-4 mb-4 text-center'>exemple n°9 FETCH_CLASS</h2>";

class Employes
{
    public $id_employes;
    public $prenom;
    public $nom;
    public $sexe;
    public $service;
    public $date_embauche;
    public $salaire;
}

$result = $pdo->query("SELECT * FROM employes ");
$objet = $result->fetchAll(PDO::FETCH_CLASS, "Employes");
// permet de prendre les résultats de la requete et d' affecter les propriétés de l' objet. Chaque valeur va etre re-associée aux différentes propriétés de la class ( il faut pour cela que l' orthographe des noms des colonnes/ champs sql correspondent aux propriétés de l' objet)
echo '<pre>'; print_r($objet); echo'</pre>';

foreach($objet as $value)
// boucle pour afficher tous les prenoms
{
    echo $value->prenom . '<hr>';
}

?>