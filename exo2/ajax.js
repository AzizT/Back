$(document).ready(function () {
    // on selectionne le DOM auquel on associe la methode "ready" qui executera la fonction une fois que le DOM sera chargé complètement
    $('#submit').click(function (e) {
        // on selectionne le bouton id"submit" auquel on associe l' évènement click, on execute la fonction anonyme
        e.preventDefault();
        afficheProduit();
    });

    function afficheProduit()
    {
        var resultat = $('#resultat').val();

        var parameters = "resultat = " + resultat;

        $.post('ajax.php', parameters, function (data)
        {$('#resultat').html(data.resultat); },'json'
        );
    }
});