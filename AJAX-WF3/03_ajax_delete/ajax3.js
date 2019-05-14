$(document).ready(function(){
    $('#submit').click(function(event){
        event.preventDefault();
        ajax();
    });
    function ajax(){
        var id = $('#personne').val();
        console.log(id);

        var parameters = "id=" + id;
        console.log(parameters);

        $.post("ajax3.php", parameters, function(data){
            $('#employes').html(data.resultat);
        }, 'json');
    }
});