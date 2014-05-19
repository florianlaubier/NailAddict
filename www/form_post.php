<?php
require_once('connexion.php');

mysql_connect($bdd_server, $bdd_user, $bdd_pass) or die(mysql_error());
mysql_select_db($bdd_name) or die(mysql_error());

$username = $_POST['login'];
$pwd = $_POST['password'];

if($username != "" && $pwd != "")
{
    $query = "SELECT * FROM utilisateur WHERE pseudo ='$username' AND mot_de_passe ='$pwd'";

    $result = mysql_query($query);
    $user_found = mysql_fetch_assoc($result);

    if($user_found['mot_de_passe']==$pwd && $user_found['mot_de_passe'] != "" )
    {
        session_start();
        $_SESSION['user'] = $user_found;
        $test = $user_found['mot_de_passe'];

        echo json_encode(array("value"=>"Success"));
    }
    else
    {
        echo json_encode(array("value"=>"Failed"));
    }
}
else
{
    echo json_encode(array("value"=>"Failed"));
}
?>
