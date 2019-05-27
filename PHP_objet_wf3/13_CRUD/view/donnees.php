<?php

// echo '<pre>'; print_r($donnees); echo '</pre>';
// echo '<pre>'; print_r($fields); echo '</pre>';
//$donnees correspond à l'indice 'donnees' declarée dans la methode render() du controller
?>
<div><a href="?op=add" class="btn btn-large btn-info mb-2"><i class="fas fa-car"></i> <i class="fas fa-plus"></i> <i class="fas fa-wine-bottle"></i> <i class="fas fa-equals"></i> <i class="fas fa-wheelchair"></i> Ajouter une nouvelle données</a></div>
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>ID</th>
            <!--on cree manuellement un champs, nous l'avons supprimé au moment de la requete sql dans le fichier EntityRepository-->
            <?php foreach ($fields as $value) : ?>
                <th><?= $value['Field'] ?> </th>
            <?php endforeach; ?>
            <th>Détail</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($donnees as $value) : ?>
            <tr>
                <td><?= implode('</td><td>', $value) ?> </td>
                <td><a href="?opp=select&id=<?= $value[$id] ?>" class="text-dark"><i class="fas fa-eye"></i></a></td>
                <td><a href="?opp=update&id=<?= $value[$id] ?>" class="text-dark"><i class="fas fa-wrench"></i></a></td>
                <td><a href="?op=delete&id=<?= $value[$id] ?>" class="text-dark"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>