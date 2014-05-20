<?php
  require_once("header.php");
  require_once("connexion.php");

  if(isset($_POST) && is_array($_POST) && isset($_POST['envoi_inscription']))
  {
  echo "ta mere";
    $errors = array();

    if(!isset($_POST['nom']) || $_POST['nom'] == '')
    {
      $errors[] = "Nom obligatoire !";
    }
    if(!isset($_POST['prenom']) || $_POST['prenom'] == '')
    {
      $errors[] = "Prenom obligatoire !";
    }
    if(!isset($_POST['dateNaissance']) || $_POST['dateNaissance'] == '')
    {
      $errors[] = "la date de naissance est obligatoire !";
    }
    if(!isset($_POST['pseudo']) || $_POST['pseudo'] == '')
    {
      $errors[] = "Pseudo obligatoire !";
    }
    if(!isset($_POST['password']) || $_POST['password'] == '' || !isset($_POST['verifMdp']) || $_POST['verifMdp'] == '')
    {
      $errors[] = "Mot de passe obligatoire !";
    }
    if($_POST['verifMdp'] != $_POST['password'])
    {
      $errors[] = "Mot de passe et Vérification doivent être identique!";
    }
    if(!isset($_POST['ville']) || $_POST['ville'] == '')
    {
      $errors[] = "Ville obligatoire !";
    }

    foreach($errors as $error)
    {
      echo $error, '<br/>';
    }
    if(count($errors) == 0)
    {

      mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
      mysql_select_db($bdd_name) or die(mysql_error());

      mysql_query("INSERT INTO `nail`.`utilisateur`
                  (`id_user`, `nom`, `prenom`, `pseudo`, `mot_de_passe`,
                   `date_naissance`, `lien_photo`, `description_user`, `id_localisation_user`)
            VALUES (NULL, 'flo', 'flo', 'flo', 'flo', '1991-05-30', NULL, NULL, NULL)")
            or die(mysql_error());


      // mysql_query("INSERT INTO eleves (nom,prenom,niveau_division,sexe,note_globale,note_comp,div_anterieur)
      //         VALUES ('" . $_POST['nom'] . "', '" . $_POST['prenom'] . "', '" . $_POST['niveau_division'] . "','" . $_POST['sexe'] . "',
      //             '" . $_POST['note_globale'] . "','" . $_POST['note_comp'] . "','" . $_POST['div_anterieur'] . "')")
      //             or die(mysql_error());

      echo("Vous êtes bien inscrit.");
    }
  }
?>


<body ng-app="starter" class="padding-vertical">
  <ion-pane>

    <!-- Cacher pour enlever la bar de titre -->
    <ion-header-bar class="bar-stable">
      <h1 class="title">Inscrption</h1>
    </ion-header-bar>

    <ion-content class="index">


      <div class="list" style="text-align:left;">

        <form method=post action="#">

          <label class="item item-input">
            <span class="input-label">Nom</span>
            <input id="nom" name="nom" type="text">
          </label>

          <label class="item item-input">
            <span class="input-label">Prenom</span>
            <input id="prenom" name="prenom" type="text">
          </label>

          <label class="item item-input">
            <span class="input-label">Date de naissance</span>
            <input id="dateNaissance" name="dateNaissance" type="text">
          </label>

          <label class="item item-input">
            <span class="input-label">Pseudo</span>
            <input id="pseudo" name="pseudo" type="text">
          </label>

          <label class="item item-input">
            <span class="input-label">Mot de passe</span>
            <input id="password" name="password" type="password">
          </label>

          <label class="item item-input">
            <span class="input-label">Vérification MDP</span>
            <input id="verifMdp" name="nom" type="password">
          </label>

          <label class="item item-input">
            <span class="input-label">Ville</span>
            <input id="ville" name="nom" type="text">
          </label>

<!--           <label class="item item-input">
            <span class="input-label">Photo</span>
            <input id="photoUser" name="photoUser" type="image">
          </label> -->

          <label class="item item-input">
            <span class="input-label">Description</span>
            <textarea id="descripUser" name="nom" rows="10"></textarea>
          </label>

        </form>
      </div>

      <input class="button button-block button-energized" name="envoi_inscription" type="submit" value="Envoi"/>

      <div class="space-tab"></div>
    </ion-content>

  </ion-pane>
</body>

<?php
  require_once("nav.php");
  require_once("footer.php");
?>
