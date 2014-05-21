<?php
require_once("header.php");
require_once("connexion.php");

session_start();

mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());


$user_id = $_SESSION['user']['id_user'];
$queryMag="SELECT * FROM magasin";

$All_mag = mysql_query($queryMag) or die("Erreur SQL !<br /><br />" . $queryMag . "<br /><br />" . mysql_error());

$retour = array();
?>

<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Ajouter un vernis</h1>
</ion-header-bar>

<ion-content>

    <div class="list padCustom" style="text-align:left; padding-top:15px;">

    <?php require_once("nav-profil.php");  ?>
                <div class="padError">
          <?php
            if(isset($_POST) && is_array($_POST) && isset($_POST['ajoutVernis_Btn']))
            {

              // Récupération des données du formaulaire
              $marque = mysql_real_escape_string(htmlspecialchars($_POST['vernis_marque']));
              $texture = mysql_real_escape_string(htmlspecialchars($_POST['vernis_texture']));
              $couleur = mysql_real_escape_string(htmlspecialchars($_POST['vernis_couleur']));
              $ref = mysql_real_escape_string(htmlspecialchars($_POST['vernis_ref']));
              $avis = mysql_real_escape_string(htmlspecialchars($_POST['vernis_avis']));
              $lien = $_POST['vernis_lien'];
              $prix = mysql_real_escape_string(htmlspecialchars($_POST['vernis_prix']));            // Val à récupérer (table prix)
              $magasin_id = $_POST['vernis_magasin'];
              $date_courante = new Datetime();
              $date = $date_courante->format('Y-m-d');

              $errors = array();

              if(!isset($marque) || $marque == '')
              {
                $errors[] = "Marque obligatoire !";
              }
              if(!isset($texture) || $texture == '')
              {
                $errors[] = "Texture obligatoire !";
              }
              if(!isset($couleur) || $couleur == '')
              {
                $errors[] = "Couleur obligatoire !";
              }
              if(!isset($ref) || $ref == '')
              {
                $errors[] = "Référence obligatoire !";
              }
              if(!isset($lien) || $lien == '')
              {
                $errors[] = "Lien obligatoire !";
              }
              if(!isset($prix) || $prix == '')
              {
                $errors[] = "Prix obligatoire !";
              }
              foreach($errors as $error)
              {
                echo $error, '<br/>';
              }
              if(count($errors) == 0)
              {

                // Verif si prix existe
                $result = mysql_query("SELECT * FROM prix WHERE valeur='$prix'");
                $row = mysql_fetch_assoc($result);
                if($row!=NULL || $row != "")
                {
                  $idprix = $row['id_prix'];
                }
                else
                {
                    mysql_query(" INSERT INTO prix (valeur) VALUES ('" . $prix . "')")
                      or die(mysql_error());

                      $resultP = mysql_query("SELECT * FROM prix WHERE valeur='$prix'");
                      $rowP = mysql_fetch_array($resultP);
                      $idprix = $rowP['id_prix'];
                }

                // Insertion du vernis renseigné
                $queryVernis = "INSERT INTO vernis (id_vernis, marque, texture, couleur, reference, avis, lien_vernis, id_prix_vernis, id_magasin_vernis, date_creation, valide)
                VALUES (NULL, '$marque', '$texture', '$couleur', '$ref', '$avis', '$lien', '$idprix', '$magasin_id', '$date', 0)";

                // Récupération de l'id de ce dernier
                $insertVernis = mysql_query($queryVernis)or die(mysql_error());

                // Si l'insertion a fonctionné
                if ( $insertVernis == TRUE )
                {
                    $queryVernisId = "SELECT MAX(id_vernis) FROM vernis";
                    $resultVernisId = mysql_query($queryVernisId)or die(mysql_error());
                    $vernis_id = mysql_fetch_row($resultVernisId);
                    $queryCollection = "INSERT INTO collection (id_user, id_vernis) VALUES ( $user_id, $vernis_id[0]) ";
                    $insertCollection = mysql_query($queryCollection)or die(mysql_error());

                    echo "Vernis ajouté avec succés";
                }
                else
                {
                  echo "Erreur lors de l'ajout...";
                }
              }
            }
          ?>
        </div>
      <form id="ajout_vernis" method="post" action="#">

            <label class="item item-input">
            <span class="input-label">Marque <span id="rouge">*</span> :</span>
              <input id="vernis_marque" name="vernis_marque" type="text">
            </label>

            <label class="item item-input">
            <span class="input-label">Texture <span id="rouge">*</span> :</span>
              <input  id="vernis_texture" name="vernis_texture" type="text">
            </label>

            <label class="item item-input">
            <span class="input-label">Couleur <span id="rouge">*</span> :</span>
              <input id="vernis_couleur" name="vernis_couleur" type="text">
            </label>

            <label class="item item-input">
            <span class="input-label">Référence <span id="rouge">*</span> :</span>
              <input  id="vernis_ref" name="vernis_ref" type="text">
            </label>

            <label class="item item-input">
            <span class="input-label">Avis :</span>
              <textarea id="vernis_avis"  name="vernis_avis" rows="10" type="text"></textarea>
            </label>

            <label class="item item-input">
            <span class="input-label">Lien de la photo<span id="rouge">*</span> :</span>
              <input  id="vernis_lien" name="vernis_lien" type="text">
            </label>

            <label class="item item-input">
            <span class="input-label">Prix <span id="rouge">*</span> :</span>
              <input  id="vernis_prix" placeholder="(Use 3.5 instead of 3,5)" name="vernis_prix" type="text">
            </label>

            <label class="item item-input">
            <span class="input-label">Magasin <span id="rouge">*</span> :</span>
              <select id="vernis_magasin" name="vernis_magasin">

              <?php while($tab_mag = mysql_fetch_array($All_mag)){ ?>
                <option value="<?php echo $tab_mag['id_magasin'] ?>"> <?php echo $tab_mag['nom_magasin'] ?> </option>
             <?php } ?>

              </select>
            </label>

        <center id="rouge">* Champs obligatoires</center>
        <input class="button button-block button-energized" id="ajoutVernis_Btn" name="ajoutVernis_Btn" type="submit" value="Envoi"/>

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

