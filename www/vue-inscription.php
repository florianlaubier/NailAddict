<?php
  require_once("header.php");
?>

  <body ng-app="starter">

    <ion-pane>

      <!-- Cacher pour enlever la bar de titre -->
      <ion-header-bar class="bar-stable">
        <h1 class="title">Inscription</h1>
      </ion-header-bar>

      <ion-content>

        <form id="connectForm">
          <label class="item item-input">
            <span class="input-label">Nom</span>
            <input id="nom" name="nom" type="text" required >
          </label>
          <label class="item item-input">
            <span class="input-label">Prénom</span>
            <input id="prenom" name="prenom" type="text" required >
          </label>
          <label class="item item-input">
            <span class="input-label">Pseudo</span>
            <input id="pseudo" name="pseudo" type="text" required>
          </label>
          <label class="item item-input">
            <span class="input-label">Mot de passe</span>
            <input id="password" name="password" type="password" required>
          </label>
          <label class="item item-input">
            <span class="input-label">Confirmer mot de passe</span>
            <input id="password" name="password" type="password" required >
          </label>
          <label class="item item-input">
            <span class="input-label">Date de naissance</span>
            <input id="password" name="password" type="date" required>
          </label>
          <input type="submit" class="button button-block button-positive"  value = "Valider"/>
        </form>
      <a class="button button-block button-positive" href="vue-connexion.php"> Annuler </a>
      </ion-content>

    </ion-pane>
  </body>

<?php
  require_once("footer.php");
?>
