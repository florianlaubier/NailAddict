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
$query="SELECT * FROM utilisateur JOIN collection on utilisateur.id_user = collection.id_user JOIN vernis on collection.id_vernis= vernis.id_vernis WHERE utilisateur.id_user = $user_id ORDER BY vernis.marque";

$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());
?>

<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Ma collection</h1>
</ion-header-bar>

<ion-content>


<div class="list card">
    <div class="item item-avatar">
      <?php
        if($_SESSION['user']['lien_photo']!=null)
          {?>
      <img src=<?php echo '"', $_SESSION['user']['lien_photo'], '"'; ?>>
      <?php } ?>
      <h2><?php echo $_SESSION['user']['pseudo']; ?></h2>
      <p><?php echo $_SESSION['user']['description_user']; ?></p>
    </div>

    <?php require_once("nav-profil.php");  ?>

  <div class="item item-body">

    <a href="detail-ajout-vernis.php">
      <img class="miniature radiusCustom" style="width:20%;" src="img/more.png">
    </a>

  <?php
  while($util = mysql_fetch_array($All_util))
  {
    ?>
        <a href="detail-vernis.php?id=<?php echo $util['id_vernis'];?>">
          <img class="miniature radiusCustom" src="<?php echo $util['lien_vernis'];?>">
        </a>
    <?php
  };
  ?>
  </div>
</div>

<div class="space-tab"></div>

</ion-content>

</ion-pane>
</body>

<?php
require_once("nav.php");
require_once("footer.php");
?>

