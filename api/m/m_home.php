<?php
	require 'header.php';

	function tontine_et_versement($idClient)
	{
		global $base;
		$req = $base->query("SELECT * FROM `collecteur_recuperer_client` cr INNER JOIN main_collecteur c ON c.idCollecteur=cr.idCollecteur WHERE (cr.statutCLient='pasOk' OR cr.statutCLient='pas') AND cr.idClient='$idClient' ORDER BY cr.dateRecuperation DESC");
		if ($res = $req->fetchAll()) {
			$out[0] = $res;
		} else {
			return 1;
		}
		$req = $base->query("SELECT DISTINCT cf.id, cl.idClient, c.idCollecteur, c.nomCollecteur, c.prenomCollecteur, c.tel1Collecteur, c.emailCollecteur, c.idCommune, cr.dateRecuperation, cr.dateDebutCollecte, cr.montantAverser, cr.frequence, cr.statutClient, cr.typeFrequence, cf.dateVersement, cf.dateProchainVersement, cf.montantVerse, cf.commentaire, cf.type, cf.statut FROM main_client cl INNER JOIN `collecteur_recuperer_client` cr ON cr.idClient=cl.idClient INNER JOIN main_collecteur c ON c.idCollecteur=cr.idCollecteur LEFT JOIN client_faireversement_collecteur cf ON cl.idClient=cf.idClient WHERE (cr.statutCLient='pasOk' OR cr.statutCLient='pas') AND cr.idClient='$idClient' ORDER BY cr.id DESC");
		if ($res = $req->fetchAll()) {
			$out[1] = $res;
		} else { 
			
		}
		return $out;
	}

	function tontine_et_versement_collecteur($idCollecteur)
	{
		global $base;
		$req = $base->query("SELECT * FROM `collecteur_recuperer_client` cr INNER JOIN main_client c ON c.idClient=cr.idClient WHERE (cr.statutCLient='pasOk' OR cr.statutCLient='pas') AND cr.idCollecteur='$idCollecteur' ORDER BY cr.dateRecuperation DESC");
		if ($res = $req->fetchAll()) {
			$out[0] = $res;
		} else {
			return 1;
		}
		$req = $base->query("SELECT DISTINCT cf.id, co.idCollecteur, c.idClient, c.nomClient, c.prenomClient, c.tel1Client, c.emailClient, c.idCommune, cr.dateRecuperation, cr.dateDebutCollecte, cr.montantAverser, cr.frequence, cr.statutClient, cr.typeFrequence, cf.dateVersement, cf.dateProchainVersement, cf.montantVerse, cf.commentaire, cf.type, cf.statut FROM main_collecteur co INNER JOIN `collecteur_recuperer_client` cr ON cr.idCollecteur=co.idCollecteur INNER JOIN main_client c ON c.idClient=cr.idClient LEFT JOIN client_faireversement_collecteur cf ON c.idClient=cf.idClient WHERE (cr.statutCLient='pasOk' OR cr.statutCLient='pas') AND cr.idCollecteur='$idCollecteur' ORDER BY cr.id DESC");
		if ($res = $req->fetchAll()) {
			$out[1] = $res;
		} else { 
			
		}
		return $out;
	}

	function confirmer_versement($idCollecteur, $idClient, $montantVerse, $dateVersement, $dateProchainVersement, $type)
	{
		global $base;
		$sql = "INSERT INTO `client_faireversement_collecteur` (`id`, `idClient`, `idCollecteur`, `dateVersement`, `dateProchainVersement`, `montantVerse`, `type`) VALUES (NULL, '$idClient', '$idCollecteur', '$dateVersement', '$dateProchainVersement', '$montantVerse', '$type')";

		$base->exec($sql);
	}

	function demande_terminer_collecte($idCollecteur, $idClient)
	{
		global $base;
		$base->exec("UPDATE `collecteur_recuperer_client` SET `statutClient` = 'pas' WHERE idCollecteur = '$idCollecteur' AND idClient = '$idClient' AND statutClient = 'pasOk'");
	}

	function valider_terminer_collecte($idCollecteur, $idClient)
	{
		global $base;
		$base->exec("UPDATE `client_faireversement_collecteur` SET `statut` = 'ok' WHERE idCollecteur = '$idCollecteur' AND idClient = '$idClient' AND statut = 'pasOk'");

		$base->exec("UPDATE `collecteur_recuperer_client` SET `statutClient` = 'ok' WHERE idCollecteur = '$idCollecteur' AND idClient = '$idClient' AND statutClient = 'pasOk'");
	}