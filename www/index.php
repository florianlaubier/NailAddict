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
        <label class="item item-input">
          <span class="input-label">Username</span>
          <input type="text"></label>
        <label class="item item-input">
          <span class="input-label">Password</span>
          <input type="password"></label>
      </div>

      <button class="button button-block button-positive">Se connecter</button>

      <button class="button button-block button-calm">S'inscrire</button>

    </ion-content>

  </ion-pane>
</body>

<?php
  require_once("nav.php");
  require_once("footer.php");
?>
