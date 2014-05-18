<?php
require_once("header.php");
require_once("connexion.php");
?>

<?php
mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());

$query='SELECT * FROM  `vernis`';
$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());
?>


<body ng-app="starter">
  <ion-pane>

<?php
while($util = mysql_fetch_array($All_util))
{
  ?>

  <ion-header-bar class="bar-stable">
  <h1 class="title"><?php echo $util['marque'], " ", $util['reference']  ; ?></h1>
</ion-header-bar>

<ion-content>

  <div class="list card">

    <div class="item item-avatar">
      <img src="img/doudou.png">
      <h2>Mathou</h2>
    </div>

    <?php require_once("nav-profil.php"); ?>

    <div class="item item-body ">
      <img class="full-image" src="img/vernis1.png">
      <p>Marque : <?php echo $util['marque']; ?></p>
      <p>Texture : <?php echo $util['texture']; ?></p>
      <p>Couleur : <?php echo $util['couleur']; ?></p>
      <p>Référence : <?php echo $util['reference']; ?></p>
      <p>Avis : <?php echo $util['avis']; ?></p>
      <p>Prix : <?php echo $util['id_prix_vernis']; ?></p>
      <p>Magasin : <?php echo $util['id_magasin_vernis']; ?></p>
      <p>
        <a href="#" class="subdued">1 Like</a>
        <a href="#" class="subdued">5 Comments</a>
      </p>
    </div>

    <div class="item tabs tabs-secondary tabs-icon">
      <a class="tab-item" href="#"> <i class="icon ion-thumbsup"></i>
        Like
      </a>
      <a class="tab-item" href="#"> <i class="icon ion-chatbox"></i>
        Comment
      </a>
      <a class="tab-item" href="#">
        <i class="icon ion-share"></i>
        Share
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

