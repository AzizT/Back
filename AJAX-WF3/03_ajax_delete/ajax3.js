$(document).ready(function(){
    $('#submit').click(function(event){
        event.preventDefault();
        ajax();
    });
    function ajax(){
        var id = $('#personne').val();
        // on selectionnela fenetre "#personne" (selecteur) afin de récupérer l' id de l' employé selectionné
        console.log(id);

        var parameters = "id=" + id;
        // on définit les parametres a envoyer a la requete AJAX 'aller', qui sera transmise a la requete de suppression php dans le fichier ajax3.php
        console.log(parameters);

        $.post("ajax3.php", parameters, function(data){
            $('#employes').html(data.resultat);
        }, 'json');
        // post : methode jquery premettant d' envoyer des requetes AJAX avec 4 arguments
        // - L' URL de destination des requetes ajax
        // - Les parametres envoyés avec la requete Ajax "aller"
        // -En cas de succes on receptionne le résultat de la requete ajax "retour"
        // -Type de transport des données: JSON

        // les parametres de la requete ajax pour receptionner le message de validation
        $.post("ajax3.php", parameters, function (data) {
            $('#message').html(data.message);
            // data.message est ce qui permet de reconnaitre $tab['message'] (du fichier.php) pour l' envoyer ensuite dans la div "#message" (index)
        }, 'json');
    }
});