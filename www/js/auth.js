$(document).ready(function(){

  $('#submitButton').click(function(){
      $.post(
            'form_login.php',
          {
              inpLogin : $("#login").val(),
              inpPass : $("#password").val()
          },
          function(data){

              console.log(data);

              if(data.authOK)
              {
                   $("#resultatConnexionUser").html("<p>Vous avez été connecté avec succès !</p>");
                    // data.redirect contains the string URL to redirect to
                    window.location.href = 'vue-actu.php';
              }
              else
              {
                   $("#resultatConnexionUser").html("<p>Erreur lors de la connexion...</p>");
              }
          }, "json");
  });

  $('#decoBtn').click(function(){
      $.post('form_deco.php',
             function(data){
              console.log(data);

              if(data.decoOK)
              {
                    // data.redirect contains the string URL to redirect to
                    window.location.href = 'index.php';
              }
              else
              {
                   $("#resultatConnexionUser").html("<p>Erreur lors de la connexion...</p>");
              }
          }, "json");
  });

  //redirection vers la page de connexion
  $('#recoBtn').click(function(){
      window.location.href = 'index.php';
  });

  // redirection vers l'inscription
  $('#BtnGoInscrip').click(function(){
      window.location.href = 'detail-inscription.php';
  });

});
