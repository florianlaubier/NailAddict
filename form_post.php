<?php

echo 'script';
 		$config['host'] = '127.0.0.1:8080';
        $config['dbname'] = 'nail';
        $config['user'] = 'root';
        $config['pass'] = '';
        $bdd_server = $config['host'];
        $bdd_user = $config['user'];
        $bdd_pass = $config['pass'];

$username = $_POST['login'];
$pwd = $_POST['password'];

$db = mysql_connect($bdd_server, $bdd_user, $bdd_pass);

$connect = mysql_select_db( $config['dbname'], $db);

$query = "SELECT * FROM utilisateur WHERE pseudo ='$username' AND mot_de_passe ='$pwd'";
$result = mysql_query($query);
$user_found = mysql_fetch_assoc($result);

if($user_found['pseudo']==$username)
{
    //echo "Success";
	//session_start();
    $_SESSION['user'] = $user_found;
    
}
else
{
    echo "Failed";
}

?>
