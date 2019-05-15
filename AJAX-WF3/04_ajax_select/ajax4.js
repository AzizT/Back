$(document).ready(function () {
    
        var prenom= $('#personne').text();
        console.log(prenom);

        var parameters = "prenom=" + prenom;
        console.log(parameters);

        $.post("ajax4.php", parameters, function (data) {
            $('#resultat').html(data.resultat);
            // data.resultat est ce qui permet de reconnaitre $tab['resultat'] (du fichier.php) pour l' envoyer ensuite dans la div "#resultat" (index)
        }, 'json');
    
});