<?php
require_once("header.php");
require_once("connexion.php");
?>

<?php
mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());

$query='SELECT * FROM  `utilisateur`';
$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());
?>


<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Paramètres</h1>
</ion-header-bar>

<ion-content>

<?php
while($util = mysql_fetch_array($All_util))
{
  ?>

  <div class="list card">

    <?php require_once("nav-profil.php");  ?>

    <div class="item">
      <a href="vue-parametres.php#informations">
        <p>Modifier mes informations</p>
      </a>
      <a href="vue-parametres.php#couleur">
        <p>Choix arrière plan</p>
      </a>
      <a href="vue-parametres.php#facebook">
        <p>Connexion Facebook</p>
      </a>
    </div>

    <div class="item item-body ">
      <h3 id="information">Modifier mes informations</h3>
        <fieldset>
          <p> Nom :
            <input value="<?php echo $util['nom']; ?>"></input>
          </p>
          <p> Prénom :
            <input value="<?php echo $util['prenom']; ?>"></input>
          </p>
          <p> Pseudo :
            <input value="<?php echo $util['pseudo']; ?>"></input>
          </p>
          <p> Date de naissance :
            <input value="<?php echo $util['date_naissance']; ?>"></input>
          </p>
          <p> Description :
            <input value="<?php echo $util['description_user']; ?>"></input>
          </p>
          <p> Changer ma photo de profil :
            <input value="<?php echo $util['lien_photo']; ?>"></input>
          </p>
        </fieldset>
    </div>

    <div class="item item-body ">
      <h3 id="couleur">Choix arrière plan</h3>
    </div>

    <div class="item item-body ">
      <h3 id="facebook">Connexion Facebook</h3>
    </div>

  </div>

  <?php
};
?>

<div class="space-tab"></div>

</ion-content>

</ion-pane>
</body>

<?php
require_once("nav.php");
require_once("footer.php");
?>

