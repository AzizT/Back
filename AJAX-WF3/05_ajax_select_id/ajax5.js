$(document).ready(function () {

    var id = $('#personne').val();
    console.log(id);

    var parameters = "id=" + id;
    console.log(parameters);

    $.post("ajax5.php", parameters, function (data) {
        $('#resultat').html(data.resultat);
        // data.resultat est ce qui permet de reconnaitre $tab['resultat'] (du fichier.php) pour l' envoyer ensuite dans la div "#resultat" (index)
    }, 'json');

});