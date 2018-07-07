<?php
	include("../../../configuration/requete.php");
	$connection=connect();
	//Génère random TOKEN
	$token=generate_token();
	$requete='UPDATE login SET Token="'.$token.'"';
	$connection->query($requete);

	//Requete récup mail user
	$login=$_POST["pseudo"];


	$requete='SELECT * FROM login WHERE Login=?';
	$mail_user=requeteWHERE($requete,$login,$connection)[0]->Email;	


$contenu='
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h1>Vous Souhaitez rénitialiser votre mot de passe ?</h1>
	<a href="http://test.loc/page/admin/Module/chmtpwd.php?token='.$token.'">Cliquez ici pour le rénitialiser.</a>
</body>
</html>
';




	echo $contenu;
	//Envoi mail
	//mail($mail_user, 'Changement de Mot de Passe', '$contenu');

function generate_token($length = 10){
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	$str = '';
	$max = strlen($chars) - 1;
	for ($i=0; $i < $length; $i++)
		$str .= $chars[random_int(0, $max)];
	return $str;
}
?>