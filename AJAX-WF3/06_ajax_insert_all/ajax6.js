$(document).ready(function () {

   $('#submit').click(function(event){
       event.preventDefault();
       ajax();
  });

  function ajax()
  {
    var prenom = $('#prenom').val();
    var nom = $('#nom').val();
    var sexe = $('#sexe').val();
    var service = $('#service').val();
      var date_embauche = $('#date_embauche').val();
      var salaire = $('#salaire').val();

    //   méthode yannis + rapide pour remplacer la ligne concaténée varparameters du dessous
    //   var parameters = {

    //       prenom: prenom,

    //       nom: nom,

    //       sexe: sexe,

    //       service: service,

    //       date_embauche: date_embauche,

    //       salaire: salaire,

    //   }

    //   console.log(parameters);

      var parameters = "prenom=" + prenom + "&nom=" + nom + "&sexe=" + sexe + "&service=" + service + "&date_embauche=" + date_embauche + "&salaire=" + salaire;

      $.post("ajax6.php", parameters, function(data){
          $('#resultat').html(data.resultat);
          $('#message').html(data.message);
      }, 'json');
      $('#form1')[0].reset();
    //   permet de reset le formulaire (revenir aux valeurs de départ, effacer les dernieres valeurs entrées)
  }

});