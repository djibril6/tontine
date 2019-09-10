<?php
	require 'header.php';

	function login_client($tel1Client, $motDePasseClient)
	{
		global $base;
		$req = $base->query("SELECT * FROM main_client WHERE tel1Client = '$tel1Client' AND motDePasseClient = '$motDePasseClient' AND statut != 'created'");

		if ($res = $req->fetch()) {
			$idUser = $res['idClient'];
			$base->exec("INSERT INTO `log` (`libelle`, `details`, `typeUser`, `idUser`) VALUES ('Connexion', 'Connexion reussie', 'CLIENT', '$idUser')");
			return $res;
		} else {
			$idUser = 0;
			$base->exec("INSERT INTO `log` (`libelle`, `details`, `typeUser`, `idUser`) VALUES ('Connexion', 'Echec de Connexion', 'CLIENT', '$idUser')");
			return 1;
		}
	}

	function login_collecteur($tel1Collecteur, $motDePasseCollecteur)
	{
		global $base;
		$req = $base->query("SELECT * FROM main_collecteur WHERE tel1Collecteur = '$tel1Collecteur' AND motDePasseCollecteur = '$motDePasseCollecteur'");

		if ($res = $req->fetch()) {
			$idUser = $res['idCollecteur'];
			$base->exec("INSERT INTO `log` (`libelle`, `details`, `typeUser`, `idUser`) VALUES ('Connexion', 'Connexion reussie', 'COLLECTEUR', '$idUser')");

			return $res;
		} else {
			$idUser = 0;
			$base->exec("INSERT INTO `log` (`libelle`, `details`, `typeUser`, `idUser`) VALUES ('Connexion', 'Echec de Connexion', 'COLLECTEUR', '$idUser')");

			return 1;
		}
	}