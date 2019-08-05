<?php
	require 'header.php';

	function signup_client($nomClient, $prenomClient, $tel1Client, $emailClient, $motDePasseClient, $idCommune)
	{
		# inscription du client
		global $base;
		$req = $base->query("SELECT * FROM main_client WHERE tel1Client = '$tel1Client'");
		if ($res = $req->fetch()) {
			return 1;
		} else {
			$sql = "INSERT INTO `main_client` (`idClient`, `nomClient`, `prenomClient`, `tel1Client`, `emailClient`, `motDePasseClient`, `idCommune`) VALUES (NULL, '$nomClient', '$prenomClient', '$tel1Client', '$emailClient', '$motDePasseClient', $idCommune)";
			$base->exec($sql);
			$req = $base->query("SELECT * FROM main_client WHERE tel1Client = '$tel1Client'");
			if ($res = $req->fetch()) {
				return $res;
			} else {
				return 1;
			}
		}
	}
	function signup_collecteur($nomCollecteur, $prenomCollecteur, $tel1Collecteur, $emailCollecteur, $motDePasseCollecteur, $idCommune)
	{
		# inscription du client
		global $base;
		$req = $base->query("SELECT * FROM main_collecteur WHERE tel1Collecteur = '$tel1Collecteur'");
		if ($res = $req->fetch()) {
			return 1;
		} else {
			$sql = "INSERT INTO `main_collecteur` (`idCollecteur`, `nomCollecteur`, `prenomCollecteur`, `tel1Collecteur`, `emailCollecteur`, `motDePasseCollecteur`, `idCommune`) VALUES (NULL, '$nomCollecteur', '$prenomCollecteur', '$tel1Collecteur', '$emailCollecteur', '$motDePasseCollecteur', $idCommune)";
			$base->exec($sql);
			$req = $base->query("SELECT * FROM main_collecteur WHERE tel1Collecteur = '$tel1Collecteur'");
			if ($res = $req->fetch()) {
				return $res;
			} else {
				return 1;
			}
		}
	}