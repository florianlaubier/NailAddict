$(document).ready(function(){

  $('#submitButton').click(function(){
      $.post(
            'form_post.php',
          {
              login : $("#login").val(),
              password : $("#password").val()
          },
          function(data){
              console.log(data);

              if(data.value == 'Success')
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
});
