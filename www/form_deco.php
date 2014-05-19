<?php
session_start();

$isAuthOK = isset($_SESSION["user"]) && !empty($_SESSION["user"]);
if($isAuthOK){
    $_SESSION["user"] = null;
    unset($_SESSION["user"]);

    $ret["decoOK"] = true; // on met a true cette variable, elle sera utilisé par
    echo json_encode($ret);
}
header('Location: index.php');
