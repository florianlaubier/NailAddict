<?php
  require_once("header.php");
?>


<body ng-app="starter" class="padding-vertical">
  <ion-pane>

    <!-- Cacher pour enlever la bar de titre -->
    <ion-header-bar class="bar-stable">
      <h1 class="title">Connexion</h1>
    </ion-header-bar>

    <ion-content class="index">


      <div class="list">
        <p>Vous avez été déconnecté avec succès.</p>
        <img src="img/nail.png">
        <label class="item item-input">
          <span class="input-label">Username</span>
          <input id="login" name="login" type="text"></label>
        <label class="item item-input">
          <span class="input-label">Password</span>
          <input id="password" name="password" type="password"></label>
      </div>

      <div id="resultatConnexionUser"></div>
      <button id="submitButton" class="button button-block button-positive">Se connecter</button>

      <button id="BtnGoInscrip" class="button button-block button-calm">S'inscrire</button>

      <div class="space-tab"></div>
    </ion-content>

  </ion-pane>
</body>

<?php
  require_once("nav.php");
  require_once("footer.php");
?>
