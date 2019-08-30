<?php
	require 'header.php';

	function demande_collecteur($idClient, $idCollecteur, $dateReception)
	{
		global $base;
		$req = $base->query("SELECT * FROM collecteur_recevoirdemande_client  WHERE idCollecteur = '$idCollecteur' AND idClient = '$idClient' AND statut='wait'");
		if ($res = $req->fetch()) {
			return 1;
		} else { 
			$base->exec("INSERT INTO `collecteur_recevoirdemande_client` (`idCollecteur`, `idClient`, `dateReception`) VALUES ('$idCollecteur', '$idClient', '$dateReception')");
			return 0;
		}
	}

	function liste_demandes_clients($idCollecteur)
	{
		global $base;
		$req = $base->query("SELECT * FROM collecteur_recevoirdemande_client r INNER JOIN main_client c ON c.idClient=r.idClient INNER JOIN main_commune co ON co.idCommune=c.idCommune WHERE r.idCollecteur = '$idCollecteur'");
		if ($res = $req->fetchAll()) {
			return $res;
		} else {
			return 1;
		}
	}

	function refuser_demande($idClient, $idCollecteur)
	{
		global $base;
		$base->exec("UPDATE collecteur_recevoirdemande_client SET statut='no' WHERE idClient='$idClient' AND idCollecteur='$idCollecteur'");
	}

	function recuperer_client($idClient, $idCollecteur, $dateRecuperation,$dateDebutCollecte, $montantAverser, $frequence, $typeFrequence, $telClient="")
	{
		global $base;
		if ($telClient != "") {
			$req = $base->query("SELECT idClient FROM main_client WHERE tel1Client='$telClient'");
			if ($res = $req->fetch()) {
				$idClient = (int)$res['idClient'];
			} else {
				return 1;
			}
		}
		$base->exec("UPDATE `collecteur_recevoirdemande_client` SET `statut` = 'yes' WHERE `idCollecteur` = '$idCollecteur' AND `idClient` = '$idClient'");
		$base->exec("INSERT INTO `collecteur_recuperer_client` (`idCollecteur`, `idClient`, `dateRecuperation`, `dateDebutCollecte`, `montantAverser`, `frequence`, `statutClient`, `typeFrequence`) VALUES ('$idCollecteur', '$idClient', '$dateRecuperation', '$dateDebutCollecte', '$montantAverser', '$frequence', 'pasOk', '$typeFrequence')");

		return 0;
		
	}