<?php
require_once("header.php");
require_once("connexion.php");
session_start();
?>

<?php
mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());
$user_id = $_SESSION['user']['id_user'];
$query="SELECT * FROM  media WHERE id_user = $user_id";
$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());
?>


<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Mes photos</h1>
</ion-header-bar>

<ion-content>

  <div class="list card">

    <div class="item item-avatar">
      <img src=<?php echo '"', $_SESSION['user']['lien_photo'], '"'; ?>>
      <h2><?php echo $_SESSION['user']['pseudo']; ?></h2>
    </div>

    <?php require_once("nav-profil.php");  ?>

<?php
while($util = mysql_fetch_array($All_util))
{
  ?>
    <div class="item item-body ">
      <a href="detail-photo.php">
        <img class="miniature" src="<?php echo $util['lien_media']?>">
      </a>     
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

