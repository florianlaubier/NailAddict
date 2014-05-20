<?php
session_start();

header('Content-type: application/json');

$isAuthOK = isset($_SESSION["user"]) && !empty($_SESSION["user"]);
if($isAuthOK){
    $_SESSION["user"] = null;
    unset($_SESSION["user"]);

    $ret["decoOK"] = true; // on met a true cette variable, elle sera utilisé par
    echo json_encode($ret);
}
else
{
   $ret["decoOK"] = false; // on met a true cette variable, elle sera utilisé par
    echo json_encode($ret);
}
