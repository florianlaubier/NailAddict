<?php
require_once("header.php");
require_once("connexion.php");
session_start();
?>

<?php
mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());

?>

<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Médias</h1>
</ion-header-bar>

<ion-content>

<?php
  //print_r($_SESSION['user']['pseudo']);
  $isAuthOK = isset($_SESSION["user"]) && !empty($_SESSION["user"]);
if ($isAuthOK) {

$user_id = $_SESSION['user']['id_user'];
$query="SELECT * FROM  media WHERE id_user = $user_id && valide ='1' ORDER BY date_creation";
$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());

  ?>
  <div class="list card">

    <div class="item item-avatar item-positive">
      <?php
        if($_SESSION['user']['lien_photo']!=null)
          {?>
      <img src=<?php echo '"', $_SESSION['user']['lien_photo'], '"'; ?>>
      <?php } ?>
      <h2><?php echo $_SESSION["user"]['pseudo']; ?></h2>
      <p><?php echo $_SESSION["user"]['description_user']; ?></p>
    </div>

    <?php require_once("nav-profil.php"); ?>

    <a class="item item-thumbnail-left" href="detail-ajout-media.php">
        <img src="img/more.png">
        <h2>Ajouter</h2>
        <p>un média</p>
      </a>
<?php
while($util = mysql_fetch_array($All_util))
{
  ?>

      <a class="item item-thumbnail-left" href="detail-photo.php?id=<?php echo $util['id_media']; ?>">
        <img src="<?php echo $util['lien_media']; ?>">
        <h2><?php echo $util['type']; ?></h2>
        <p><?php echo $util['description_media']; ?></p>
      </a>

<!--       <a class="item item-thumbnail-left" href="#">
        <img src="<?php echo $util['lien_media']; ?>">
        <h2><?php echo $util['type']; ?></h2>
        <p><?php echo $util['description_media']; ?></p>
      </a>

      <a class="item item-thumbnail-left" href="#">
        <img src="<?php echo $util['lien_media']; ?>">
        <h2><?php echo $util['type']; ?></h2>
        <p><?php echo $util['description_media']; ?></p>
      </a> -->

<?php
};
?>
</div>

<div class="space-tab" style="height:70px;"></div>


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

</ion-content>

</ion-pane>
</body>

<?php
require_once("nav.php");
require_once("footer.php");
?>

