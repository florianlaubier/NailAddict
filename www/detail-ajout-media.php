<?php
require_once("header.php");
require_once("connexion.php");

session_start();

mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());


$user_id = $_SESSION['user']['id_user'];

$retour = array();
?>

<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Ajouter un media</h1>
</ion-header-bar>

<ion-content>

    <div class="list padCustom" style="text-align:left; padding-top:15px;">

    <?php require_once("nav-profil.php");  ?>

      <form id="ajout_medio" method="post" action="#">

            <label class="item item-input">
            <span class="input-label">Type de media</span>
                <select id="type_media" name="type_media">
                  <option value="photo">photo</option>
                  <option value="video">video</option>
              </select>
            </label>

            <label class="item item-input">
            <span class="input-label">Lien de media :</span>
              <input  id="lienMedia" name="lienMedia" type="text" value="" required>
            </label>

            <label class="item item-input">
            <span class="input-label">Description media :</span>
              <textarea id="descriptionMedia" name="descriptionMedia" rows="10" type="text" value="" required></textarea>
            </label>

        <div class="padError">
<?php
  if(isset($_POST) && is_array($_POST) && isset($_POST['ajoutMedia_Btn']))
  {
    // Récupération des données du formaulaire
    $lien = $_POST['lienMedia'];
    $type = $_POST['type_media'];
    $descriptionMedia = $_POST['descriptionMedia'];

    $date_courante = new Datetime();
    $date = $date_courante->format('Y-m-d');

    echo
// Insertion du vernis renseigné
    mysql_query("INSERT INTO `nail`.`media` (`id_media`, `lien_media`, `type`, `description_media`, `date_creation`, `id_user`, `valide`) VALUES (NULL, '$lien', '$type', '$descriptionMedia', '$date', '$user_id', '0')")
            or die(mysql_error());


    echo "Vernis ajouté avec succés";

  }
?>
        </div>

        <input class="button button-block button-energized" id="ajoutMedia_Btn" name="ajoutMedia_Btn" type="submit" value="Envoi"/>

        </form>
    </div>
<div class="space-tab"></div>

</ion-content>

</ion-pane>
</body>

<?php
require_once("nav.php");
require_once("footer.php");
?>

