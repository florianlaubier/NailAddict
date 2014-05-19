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
$query="SELECT * FROM  media WHERE id_user = $user_id ORDER BY date_creation";
$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());

session_start();
?>

<body ng-app="starter">
  <ion-pane>

  <ion-header-bar class="bar-stable">
  <h1 class="title">Profil</h1>
</ion-header-bar>

<ion-content>

<?php
  print_r($_SESSION['user']['pseudo']);
    $isAuthOK = isset($_SESSION["user"]) && !empty($_SESSION["user"]);
if ($isAuthOK) {
  ?>
  <div class="list card">

    <div class="item item-avatar">
      <?php
        if($_SESSION['user']['lien_photo']!=null)
          {?>
      <img src=<?php echo '"', $_SESSION['user']['lien_photo'], '"'; ?>>
      <?php } ?>
      <h2><?php echo $_SESSION["user"]['pseudo']; ?></h2>
    </div>

    <?php require_once("nav-profil.php"); ?>

<?php
while($util = mysql_fetch_array($All_util))
{
  ?>

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

