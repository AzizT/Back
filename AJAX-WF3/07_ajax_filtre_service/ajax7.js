$(document).ready(function () {

   $('#service').change(function(){
       ajax();
  });

  function ajax()
  {
      var service = $('#service').val();

      var parameters = "service=" +service;

      $.post("ajax7.php", parameters, function(data){
          $('#resultat').html(data.resultat);
      }, 'json');
  }

});