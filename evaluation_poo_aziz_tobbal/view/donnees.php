<?php

//$donnees correspond à l'indice 'donnees' declarée dans la methode render() du controller
?>

<table class="table table-bordered mt-4 text-center">
    <thead>
        <tr>
            <th>ID</th>
            <!--on cree manuellement un champs, nous l'avons supprimé au moment de la requete sql dans le fichier EntityRepository-->
            <?php foreach ($fields as $value) : ?>
                <th><?= $value['Field'] ?> </th>
            <?php endforeach; ?>
            <th>Modification</th>
            <th>Suppression</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($donnees as $value) : ?>
            <tr>
                <td><?= implode('</td><td>', $value) ?> </td>
                <td><a href="?op=update&id=<?= $value[$id] ?>" class="text-dark"><i class="fas fa-wrench"></i></a></td>
                <td><a href="?op=delete&id=<?= $value[$id] ?>" class="text-dark"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>