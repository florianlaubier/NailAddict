<?php
  require_once("header.php");
  require_once("connexion.php");
?>

<?php
mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());


$query='SELECT * FROM  media JOIN utilisateur on utilisateur.id_user= media.id_media ORDER BY date_creation';
$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());

session_start();
?>

<body ng-app="starter">
  <ion-pane>

    <ion-header-bar class="bar-stable">
      <h1 class="title">Actualité</h1>
    </ion-header-bar>

    <ion-content>

    <?php
    $isAuthOK = isset($_SESSION["user"]) && !empty($_SESSION["user"]);
    if ($isAuthOK) {

    while($util = mysql_fetch_array($All_util))
    {
    ?>

      <div class="list card">

        <div class="item item-avatar item-energized">
          <img src=<?php echo '"', $util['lien_photo'], '"'; ?>>
          <h2 class="pseudo"><?php echo $util['pseudo']; ?></h2>
          <p><?php echo $util['description_user']; ?></p>
        </div>

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
      <div class="space-tab"></div>

    </ion-content>

  </ion-pane>
</body>

<?php
  require_once("nav.php");
  require_once("footer.php");
?>
