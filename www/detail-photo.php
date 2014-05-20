<?php
require_once("header.php");
require_once("connexion.php");
?>

<?php
mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());

$photo_id = $_GET['id'];

$query='SELECT * FROM  `media` WHERE id_media = '.$photo_id.' ';
$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());
?>


<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Photo</h1>
</ion-header-bar>

<ion-content>

<?php
while($util = mysql_fetch_array($All_util))
{
  ?>

  <div class="list card">

    <div class="item item-avatar">
      <img src="img/doudou.png">
      <h2>Mathou</h2>
    </div>

    <?php require_once("nav-profil.php"); ?>

    <div class="item item-body ">
      <img class="full-image" src="<?php echo $util['lien_media']; ?>">
      <p></p>
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

