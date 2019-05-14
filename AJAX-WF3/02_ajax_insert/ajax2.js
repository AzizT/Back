$(document).ready(function(){
    $('#submit').click(function(event){
        // on selectionne le bouton submit, avec evenement click
        event.preventDefault();
        // fonction prédéfinie
        // pour annuler le comportement du bouton submit lorsqu' il recharge la page
        ajax();
        // fonction utilisateur executée ci dessous
    });
    function ajax(){
        var personne = $('#personne').val();
        // on selectionne le champ input afin de récupérer la valeur saisie dans le champ, pour le transmettre a la requete "aller" AJAX
        console.log(personne);

        var parameters = "personne=" + personne;
        // on définit le parametre a envoyer avec la requete "aller" AJAX
        // "personne=" permet de définir où le parametre va etre envoyé dans le fichier php ($personne)

        $.post("ajax2.php", parameters, function(data){
            // la methode post de jquery permet d' envoyer des requetes http AJAX, plusieurs parametres:
            // 1 - L' URL de destination des requetes AJAX
            // 2 - Les parametres a fournir a la requete
            // 3 - En cas de succes function(data) récupère les données de la donnée "retour", tout se trouve dans "data"
            // 4 - Type de transport de données: json

            $('#resultat').html(data.resultat);
            // on selectionne la div"#resultat" et on accroche le message d' erreur ou de validation a l' interieur
            // data.resultat --> resultat correspondant a l' indice "resultat" du tableau array $tab['resultat'] du fichier ajax2.php
            $("#personne").val('');
            // permet de vider le champ input une fois le formulaire validé 
        }, 'json');
    }
});