<?php
require_once("header.php");
require_once("connexion.php");
session_start();
?>

<?php
mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());

$user_id = $_SESSION['user']['id_user'];
echo $user_id;
$query="SELECT * FROM utilisateur WHERE id_user = $user_id";

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

  <!--     <div class="item">
        <a href="vue-parametres.php#informations">
          <p>Modifier mes informations</p>
        </a>
        <a href="vue-parametres.php#couleur">
          <p>Choix arrière plan</p>
        </a>
        <a href="vue-parametres.php#facebook">
          <p>Connexion Facebook</p>
        </a>
      </div> -->

    <div class="item item-body ">
      <h3 class="padCustom" id="information">Modifier mes informations</h3>

          <label class="item item-input">
            <span class="input-label">Nom :</span>
            <input id="nom" name="nom" type="text" value="<?php echo $util['nom']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Prénom :</span>
            <input id="prenom" name="prenom" type="text" value="<?php echo $util['prenom']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Pseudo :</span>
            <input id="pseudo" name="pseudo" type="text" value="<?php echo $util['pseudo']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Date de naissance :</span>
            <input id="dateNaissance" name="dateNaissance" type="date" value="<?php echo $util['date_naissance']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Description :</span>
            <input id="description" name="description" type="text" value="<?php echo $util['description_user']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Photo de profil :</span>
            <input id="photo" name="photo" type="text" value="<?php echo $util['lien_photo']; ?>">
          </label>

          <button id="enregistrerModifUserBtn" class="button button-block button-balanced">Enregistrer </button>
    </div>

        <div class="item item-body ">
      <h3 class="padCustom" id="information">Modifier mon mot de passe</h3>

          <label class="item item-input">
            <span class="input-label">Ancien mot de passe :</span>
            <input id="ancMdp" name="ancMdp" type="password">
          </label>

          <label class="item item-input">
            <span class="input-label">Nouveaux mot de passe :</span>
            <input id="newMdp" name="newMdp" type="password">
          </label>

          <label class="item item-input">
            <span class="input-label">Vérification mot de passe :</span>
            <input id="newMdp" name="newMdp" type="password">
          </label>

          <button id="enregistrerMdpBtn" class="button button-block button-energized">Enregistrer </button>
    </div>

<!--     <div class="item item-body ">
      <h3 id="couleur">Choix arrière plan</h3>
    </div>

    <div class="item item-body ">
      <h3 id="facebook">Connexion Facebook</h3>
    </div> -->

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

