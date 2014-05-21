<?php
  require_once("header.php");
  require_once("connexion.php");
?>

<body ng-app="starter" class="padding-vertical">
  <ion-pane>

    <!-- Cacher pour enlever la bar de titre -->
    <ion-header-bar class="bar-stable">
      <h1 class="title">Inscription</h1>
    </ion-header-bar>

    <ion-content class="index">

      <div class="list" style="text-align:left;">

        <form method="post" action="#">

          <label class="item item-input">
            <span class="input-label">Nom <span id="rouge">*</span></span>
            <input id="nom" name="nom" type="text">
          </label>

          <label class="item item-input">
            <span class="input-label">Prénom <span id="rouge">*</span></span>
            <input id="prenom" name="prenom" type="text">
          </label>

          <label class="item item-input">
            <span class="input-label">Date de naissance <span id="rouge">*</span></span>
            <input id="dateNaissance" name="dateNaissance" type="date">
          </label>

          <label class="item item-input">
            <span class="input-label">Pseudo <span id="rouge">*</span></span>
            <input id="pseudo" name="pseudo" type="text">
          </label>

          <label class="item item-input">
            <span class="input-label">Lien photo <span id="rouge">*</span></span>
            <input id="lienPhoto" name="lien_photo" type="text">
          </label>

          <label class="item item-input">
            <span class="input-label">Mot de passe <span id="rouge">*</span></span>
            <input id="password" name="password" type="password">
          </label>

          <label class="item item-input">
            <span class="input-label">Vérification MDP <span id="rouge">*</span></span>
            <input id="verifMdp" name="verifMdp" type="password">
          </label>

          <label class="item item-input">
            <span class="input-label">Ville :</span>
            <input id="ville" name="ville" type="text">
          </label>

<!--           <label class="item item-input">
            <span class="input-label">Photo</span>
            <input id="photoUser" name="photoUser" type="image">
          </label> -->

          <label class="item item-input">
            <span class="input-label">Description :</span>
            <textarea id="description" name="description" rows="10"></textarea>
          </label>

          <div class="padError">

  <?php
  if(isset($_POST) && is_array($_POST) && isset($_POST['envoi_inscription']))
  {

    $errors = array();

    $nom = mysql_real_escape_string(htmlspecialchars($_POST['nom']));
    $prenom = mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
    $pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo']));
    $passe = mysql_real_escape_string(htmlspecialchars($_POST['password']));
    $passe2 = mysql_real_escape_string(htmlspecialchars($_POST['verifMdp']));

    if($_POST['lienPhoto'] == '')
    {
      $lien_photo = NULL;
    }
    else
    {
      $lien_photo = $_POST['lienPhoto'];
    }

    if(isset($_POST['ville']) || $_POST['ville'] != '')
    {
      $ville = mysql_real_escape_string(htmlspecialchars($_POST['ville']));
    }
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
    if(!isset($passe) || $passe == '' || !isset($passe2) || $passe2 == '')
    {
      $errors[] = "Mot de passe obligatoire !";
    }
    if($passe != $passe2)
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

      mysql_query("INSERT INTO `nail`.`utilisateur`
                  (`id_user`, `nom`, `prenom`, `pseudo`, `mot_de_passe`,
                   `date_naissance`, `lien_photo`, `description_user`, `id_localisation_user`)
            VALUES (NULL, '" . $nom . "', '" . $prenom . "', '" . $pseudo . "', '" . $passe . "',
              '" . $_POST['dateNaissance'] . "', '" . $lien_photo . "', '" . $description . "', NULL)")
            or die(mysql_error());

      echo("Vous êtes bien inscrit(e).");

    }
  }
?>
        </div>
        <div style ="text-align:center;">
          <input class="button button-block button-energized" name="envoi_inscription" type="submit" value="Valider"/>
        </div>
        </form>

        <button id="recoBtn" class="button button-block button-royal">
              Se connecter
          </button>
      </div>

      <div class="space-tab"></div>
    </ion-content>

  </ion-pane>
</body>

<?php
  require_once("nav.php");
  require_once("footer.php"); ?>
