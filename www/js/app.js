// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ionic'])
.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    } 

  });

  $('#submitButton').on('click',function(){
        $.post(
              'form_post.php',             
            {
                login : $("#login").val(),  
                password : $("#password").val()
            },
            function(data){

              console.log('2');
              console.log(data);
                if(data == 'Success'){
                     $("#resultatConnexionUser").html("<p>Vous avez été connecté avec succès !</p>");
                      // data.redirect contains the string URL to redirect to
                      window.location.href = 'vue-profil.php';
                }
                else{
                     $("#resultatConnexionUser").html("<p>Erreur lors de la connexion...</p>");
                }
            }
         );
      });




   $('#registerButton').on('click',function(){
      window.location.href = 'vue-inscription.php';
    })


});
