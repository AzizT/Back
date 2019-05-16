$(document).ready(function () {

   $('#submit').click(function(event){
       event.preventDefault();
       ajax();
  });

  function ajax()
  {
      var id = $('#personne').val();

      var parameters = "id=" +id;

      $.post("ajax5.php", parameters, function(data){
          $('#resultat').html(data.resultat);
      }, 'json');
  }

});