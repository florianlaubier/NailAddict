// Ionic Starter App, v0.9.20

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
// 'starter.services' is found in services.js
// 'starter.controllers' is found in controllers.js
angular.module('starter', ['ionic', 'starter.controllers', 'starter.services'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    StatusBar.styleDefault();
  });
})

.config(function($stateProvider, $urlRouterProvider) {

  // Ionic uses AngularUI Router which uses the concept of states
  // Learn more here: https://github.com/angular-ui/ui-router
  // Set up the various states which the app can be in.
  // Each state's controller can be found in controllers.js
  $stateProvider

    // setup an abstract state for the tabs directive
    .state('tab', {
      url: "/tab",
      abstract: true,
      templateUrl: "templates/tabs.html"
    })

    //RAJOUT

    .state('tab.actu', {
      url: '/actu',
      views: {
        'tab-actu': {
          templateUrl: 'templates/tab-actu.html',
          controller: 'actuCtrl'
        }
      }
    })

    .state('tab.profil', {
      url: '/profil',
      views: {
        'tab-profil': {
          templateUrl: 'templates/tab-profil.html',
          controller: 'profilCtrl'
        }
      }
    })

    .state('tab.appareil', {
      url: '/appareil',
      views: {
        'tab-appareil': {
          templateUrl: 'templates/tab-appareil.html',
          controller: 'appareilCtrl'
        }
      }
    })

    .state('tab.plus', {
      url: '/plus',
      views: {
        'tab-plus': {
          templateUrl: 'templates/tab-plus.html',
          controller: 'plusCtrl'
        }
      }
    })

  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/tab/actu');

});

