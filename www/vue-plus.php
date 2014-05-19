<?php
  require_once("header.php");
  require_once("connexion.php");
?>

<?php
mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());

$query='SELECT * FROM  `utilisateur`';
$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());

session_start();
?>

<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Plus</h1>
</ion-header-bar>

<ion-content>
    <?php
      $isAuthOK = isset($_SESSION["user"]) && !empty($_SESSION["user"]);
      if ($isAuthOK) {
        ?>
         <div class="list card">
            <button id="decoBtn" class="button button-block button-calm">deconnexion</button>
            <div class="item item-body ">
              <p>Page non disponible pour l'instant.</p>
            </div>
          </div>

  <?php
      } else {
          // sinon on redirige l'utilisateur n'est pas authentifié
          ?>
          <div class="padCustom">
            <button id="recoBtn" class="button button-block button-royal">
              Veuillez vous identifier pour continuer ...
            </button>
          </div>
          <?php
      }
      ?>
<div class="space-tab"></div>

</ion-content>

</ion-pane>
</body>

<?php
require_once("nav.php");
require_once("footer.php");
?>

