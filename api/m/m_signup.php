<?php
	require 'header.php';

	function signup_client($nomClient, $prenomClient, $tel1Client, $motDePasseClient)
	{
		# inscription du client
		global $base;
		$req = $base->query("SELECT * FROM main_client WHERE tel1Client = '$tel1Client'");
		if ($res = $req->fetch()) {

			$idUser = $res['idClient'];
			$base->exec("INSERT INTO `log` (`libelle`, `details`, `typeUser`, `idUser`) VALUES ('inscription', 'Echec Inscription', 'CLIENT', '$idUser')");
			return 1;

		} else {

			$sql = "INSERT INTO `main_client` (`idClient`, `nomClient`, `prenomClient`, `tel1Client`, `motDePasseClient`) VALUES (NULL, '$nomClient', '$prenomClient', '$tel1Client', '$motDePasseClient')";
			$base->exec($sql);
			$req = $base->query("SELECT * FROM main_client WHERE tel1Client = '$tel1Client'");
			if ($res = $req->fetch()) {

				$idUser = $res['idClient'];
				$base->exec("INSERT INTO `log` (`libelle`, `details`, `typeUser`, `idUser`) VALUES ('inscription', 'Inscription reussie', 'CLIENT', '$idUser')");
				return $res;
			} else {
				return 1;
			}
		}
	}
	function signup_collecteur($nomCollecteur, $prenomCollecteur, $tel1Collecteur, $motDePasseCollecteur)
	{
		# inscription du client
		global $base;
		$req = $base->query("SELECT * FROM main_collecteur WHERE tel1Collecteur = '$tel1Collecteur'");
		if ($res = $req->fetch()) {
			$idUser = $res['idCollecteur'];
			$base->exec("INSERT INTO `log` (`libelle`, `details`, `typeUser`, `idUser`) VALUES ('inscription', 'Echec Inscription', 'COLLECTEUR', '$idUser')");
			return 1;
		} else {
			$sql = "INSERT INTO `main_collecteur` (`idCollecteur`, `nomCollecteur`, `prenomCollecteur`, `tel1Collecteur`, `motDePasseCollecteur`) VALUES (NULL, '$nomCollecteur', '$prenomCollecteur', '$tel1Collecteur', '$motDePasseCollecteur')";
			$base->exec($sql);
			$req = $base->query("SELECT * FROM main_collecteur WHERE tel1Collecteur = '$tel1Collecteur'");
			if ($res = $req->fetch()) {

				$idUser = $res['idCollecteur'];
				$base->exec("INSERT INTO `log` (`libelle`, `details`, `typeUser`, `idUser`) VALUES ('inscription', 'Inscription reussie', 'COLLECTEUR', '$idUser')");
				return $res;
			} else {
				return 1;
			}
		}
	}