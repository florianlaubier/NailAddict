<?php
require_once('connexion.php');

mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());

session_start();
// la réponse sera renvoyée au format json
header('Content-type: application/json');

// angular renvoi les requettes post avec l'entete application/json
// ce qui fait que le tableau $_POST coté php n'est pas initialisé
// la solution est de le faire manuellement.
if (stripos($_SERVER["CONTENT_TYPE"], "application/json") === 0) {
    $_POST = json_decode(file_get_contents("php://input"), true);
}

$retour = array();
// l'utilisateur est deconnecté jusqu'a preuve du contraire
$retour["authOK"] = false;

$isInpLoginOK = isset($_POST['inpLogin']) && !empty($_POST['inpLogin']);
$isInpPassOK = isset($_POST['inpPass']) && !empty($_POST['inpPass']);

$isPostedDataOK = $isInpLoginOK && $isInpPassOK;

if ($isPostedDataOK) {
    // on test si le login et pass sonts bons
    $username = $_POST['inpLogin'];
    $pwd = $_POST['inpPass'];

    $query = "SELECT * FROM utilisateur WHERE pseudo ='$username' AND mot_de_passe ='$pwd'";

    $result = mysql_query($query);
    $user_found = mysql_fetch_assoc($result);

    if ( $username == $user_found['pseudo'] && $_POST['inpPass'] == $user_found['mot_de_passe']) {
        $_SESSION["user"] = $_POST['inpLogin']; // on initialise la variable de session
        $retour["authOK"] = true; // on met a true cette variable, elle sera utilisé par angular
    }
}

echo json_encode($retour);
