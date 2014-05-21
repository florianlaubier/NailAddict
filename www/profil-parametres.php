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

$util = mysql_fetch_assoc($All_util);
?>


<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Paramètres</h1>
</ion-header-bar>

<ion-content>

  <div class="list padCustom" style="text-align:left; padding-top:15px;">

    <?php require_once("nav-profil.php");  ?>

      <h3 class="padCustom" style="text-align:center;" id="information">Modifier mes informations</h3>
      <center id="rouge">* Champs obligatoires</center>
        <form id="modif_user" method="post" action="#">
          <label class="item item-input">
            <span class="input-label">Nom <span id="rouge">*</span></span>
            <input id="nom" name="nom" type="text" value="<?php echo $util['nom']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Prénom <span id="rouge">*</span></span>
            <input id="prenom" name="prenom" type="text" value="<?php echo $util['prenom']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Pseudo <span id="rouge">*</span></span>
            <input id="pseudo" name="pseudo" type="text" value="<?php echo $util['pseudo']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Date de naissance</span>
            <input id="dateNaissance" name="dateNaissance" type="date" value="<?php echo $util['date_naissance']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Description</span>
            <input id="description" name="description" type="text" value="<?php echo $util['description_user']; ?>">
          </label>

          <label class="item item-input">
            <span class="input-label">Photo de profil </span>
            <input id="lienPhoto" name="lienPhoto" type="text" value="<?php echo $util['lien_photo']; ?>">
          </label>

          <div class="padError">
<?php
  if(isset($_POST) && is_array($_POST) && isset($_POST['enregistrerModifUserBtn']))
  {
    $errors = array();

    $nom = mysql_real_escape_string(htmlspecialchars($_POST['nom']));
    $prenom = mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
    $pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
    $date = $_POST['dateNaissance'];
    $lien = $_POST['lienPhoto'];

    if(isset($_POST['description']) || $_POST['description'] != '')
    {
      $description = mysql_real_escape_string(htmlspecialchars($_POST['description']));
    }
    if(!isset($nom) || $nom == '')
    {
      $errors[] = "Nom obligatoire !";
    }
    if(!isset($prenom) || $prenom == '')
    {
      $errors[] = "Prénom obligatoire !";
    }
    if(!isset($_POST['dateNaissance']) || $_POST['dateNaissance'] == '')
    {
      $errors[] = "Date de naissance est obligatoire !";
    }
    if(!isset($pseudo) || $pseudo == '')
    {
      $errors[] = "Pseudo obligatoire !";
    }

    foreach($errors as $error)
    {
      echo $error, '<br/>';
    }
    if(count($errors) == 0)
    {

      mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
      mysql_select_db($bdd_name) or die(mysql_error());

      mysql_query("UPDATE `nail`.`utilisateur`
        SET `nom` = '$nom', `prenom` = '$prenom', `pseudo` = '$pseudo',
        `date_naissance` = '$date', `lien_photo` = '$lien',
        `description_user` = '$description'
        WHERE `utilisateur`.`id_user` = $user_id;")
      or die(mysql_error());

      echo("Modification(s) Acceptée(s).");

    }
  }
?>        </div>

          <button id="enregistrerModifUserBtn" name="enregistrerModifUserBtn" class="button button-block button-balanced">Enregistrer </button>

        </form>

        <form id="modif_user" method="post" action="#">
          <br/><br/>
      <h3 class="padCustom" style="text-align:center;" id="information">Modifier mon mot de passe</h3>
        <center id="rouge">* Champs obligatoires</center>
          <label class="item item-input">
            <span class="input-label">Ancien mot de passe <span id="rouge">*</span></span>
            <input id="ancMdp" name="ancMdp" type="password">
          </label>

          <label class="item item-input">
            <span class="input-label">Nouveau mot de passe <span id="rouge">*</span></span>
            <input id="newMdp" name="newMdp" type="password">
          </label>

          <label class="item item-input">
            <span class="input-label">Vérification mot de passe <span id="rouge">*</span></span>
            <input id="verifMdp" name="verifMdp" type="password">
          </label>

        <div class="padError">

  <?php
  if(isset($_POST) && is_array($_POST) && isset($_POST['enregistrerMdpBtn']))
  {

    $errors = array();

    $ancMdp = mysql_real_escape_string(htmlspecialchars($_POST['ancMdp']));
    $newMdp = mysql_real_escape_string(htmlspecialchars($_POST['newMdp']));
    $verifMdp = mysql_real_escape_string(htmlspecialchars($_POST['verifMdp']));


    if(!isset($ancMdp) || $ancMdp == '')
    {
      $errors[] = "Ancien mot de passe obligatoire !";
    }
    if(!isset($newMdp) || $newMdp == '')
    {
      $errors[] = "Nouveau mot de passe obligatoire !";
    }
    if(!isset($verifMdp) || $verifMdp == '')
    {
      $errors[] = "Vérification mot de passe obligatoire !";
    }
    if($newMdp != $verifMdp)
    {
      $errors[] = "Les mots de passes doivent être identiques !";
    }

    foreach($errors as $error)
    {
      echo $error, '<br/>';
    }
    if(count($errors) == 0)
    {

      mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
      mysql_select_db($bdd_name) or die(mysql_error());

      $passCrypt = sha1($passe);
      mysql_query("UPDATE `nail`.`utilisateur` SET `mot_de_passe` = '$newMdp' WHERE `utilisateur`.`id_user` = '$user_id'");

      mysql_query("INSERT INTO `nail`.`utilisateur`
                  (`id_user`, `nom`, `prenom`, `pseudo`, `mot_de_passe`,
                   `date_naissance`, `lien_photo`, `description_user`, `id_localisation_user`)
            VALUES (NULL, '" . $nom . "', '" . $prenom . "', '" . $pseudo . "', '" . $passe . "',
              '" . $_POST['dateNaissance'] . "', '" . $lien_photo . "', '" . $description . "', NULL)")
            or die(mysql_error());

      echo("Modification du mot de passe réusi.");
      echo("Veullez vous déconecter.");
    }
  }
?>
        </div>

        <button id="enregistrerMdpBtn" name="enregistrerMdpBtn" class="button button-block button-energized">Enregistrer </button>

<!--     <div class="item item-body ">
      <h3 id="couleur">Choix arrière plan</h3>
    </div>

    <div class="item item-body ">
      <h3 id="facebook">Connexion Facebook</h3>
    </div> -->
  </form>
  </div>

    <br/><br/>
      <h3 class="padCustom" style="text-align:center;" id="information">Se déconecter</h3>
    <div class="padCustom">
    <button id="decoBtn" class="button button-block button-assertive">Déconnexion</button>
  </div>

<div class="space-tab"></div>

</ion-content>

</ion-pane>
</body>

<?php
require_once("nav.php");
require_once("footer.php");
?>

