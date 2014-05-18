<?php
echo "1";
 		$config['host'] = '127.0.0.1:8080';
        $config['dbname'] = 'nail';
        $config['user'] = 'root';
        $config['pass'] = '';

$username = $_POST['login'];
$pwd = $_POST['password'];
$db = mysql_connect($config['host'], $config['user'], $config['pass']);

$connect = mysql_select_db( $config['dbname'], $db);

if(!$connect) 
{
    echo "Ca marche pas";
    throw new Exception('erreurs MYQSL : ' . mysql_error());
}
else 
{
    echo "Ca marche";
    $connection = true;
}

$query = "SELECT * FROM utilisateur WHERE pseudo ='$username' AND mot_de_passe ='$pwd'";
$result = mysql_query($query);
$user_found = mysql_fetch_assoc($result);

if($user_found['pseudo']==$username)
{
	session_start();
    $_SESSION['user'] = $username;
    echo "Success";
}
else
{
    echo "Failed";
}
?>
