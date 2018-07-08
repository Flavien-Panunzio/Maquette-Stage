<?php

	function requeteWHERE($requeteSQL, $variableSQL=[], $connection=false, $update=false){
		if (!$connection) {
			$connection=connect();
		}
			$requete=$connection->prepare($requeteSQL);
			$resultat=$requete->execute($variableSQL);

			if (!$update) {
				$resultat = $requete->fetchAll(PDO::FETCH_OBJ);
				$requete->closeCursor();
				return($resultat);
			}
			$requete->closeCursor();
			$id = $connection->lastInsertId();
			return $id;
	}

	function connect(){

		$hote='localhost'; 
		$port='3306'; 
		$nom_bd='TEST'; 
		$identifiant='root'; 
		$mot_de_passe=''; 
		$encodage='utf8';
		$debug=true;

		$options=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$encodage); 
		try 
		{ 
			$connection = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bd,$identifiant, $mot_de_passe,$options); 
			if($debug) 
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		} catch (PDOException $erreur) 
		{
			if($debug) 
				$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
			else
				echo "Serveur actuellement innaccessible, veuillez nous excuser.";
			exit(); 
		}
		return($connection);
	}
?>