<?php
  require_once("header.php");
  require_once("connexion.php");
?>

<?php
mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());

$query='SELECT * FROM  `utilisateur`';
$All_util = mysql_query($query) or die("Erreur SQL !<br /><br />" . $query . "<br /><br />" . mysql_error());

session_start();
?>

  <body ng-app="starter">

    <ion-pane>

      <!-- Cacher pour enlever la bar de titre -->
      <ion-header-bar class="bar-stable">
        <h1 class="title">Appareil</h1>
      </ion-header-bar>

      <ion-content>
          <?php
          $isAuthOK = isset($_SESSION["user"]) && !empty($_SESSION["user"]);
          if ($isAuthOK) {
            ?>
              <p>Tu es bien connecté</p>
               <!--
            ,,
            db

          `7MM  `7MMpMMMb.  ,pP"Ybd  .gP"Ya `7Mb,od8 .gP"Ya `7Mb,od8
            MM    MM    MM  8I   `" ,M'   Yb  MM' "',M'   Yb  MM' "'
            MM    MM    MM  `YMMMa. 8M""""""  MM    8M""""""  MM
            MM    MM    MM  L.   I8 YM.    ,  MM    YM.    ,  MM
          .JMML..JMML  JMML.M9mmmP'  `Mbmmd'.JMML.   `Mbmmd'.JMML.

                                     mm
                                     MM
         ,p6"bo   ,pW"Wq.`7MMpMMMb.mmMMmm .gP"Ya `7MMpMMMb.`7MM  `7MM
        6M'  OO  6W'   `Wb MM    MM  MM  ,M'   Yb  MM    MM  MM    MM
        8M       8M     M8 MM    MM  MM  8M""""""  MM    MM  MM    MM
        YM.    , YA.   ,A9 MM    MM  MM  YM.    ,  MM    MM  MM    MM
         YMbmd'   `Ybmd9'.JMML  JMML.`Mbmo`Mbmmd'.JMML  JMML.`Mbod"YML.

                                 ,,           ,,
                                db           db

                              `7MM  ,p6"bo `7MM
                                MM 6M'  OO   MM
                                MM 8M        MM
                                MM YM.    ,  MM
                              .JMML.YMbmd' .JMML.
-->
            <?php
          } else {
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
