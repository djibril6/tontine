<?php
	require 'header.php';

	function tontine_et_versement($idClient)
	{
		global $base;
		$req = $base->query("SELECT * FROM `collecteur_recuperer_client` cr INNER JOIN main_collecteur c ON c.idCollecteur=cr.idCollecteur WHERE cr.statutCLient='pasOk' AND cr.idClient='$idClient' ORDER BY cr.dateRecuperation DESC");
		if ($res = $req->fetchAll()) {
			$out[0] = $res;
		} else {
			return 1;
		}
		$req = $base->query("SELECT *, cf.idCollecteur as idCol, cr.idCollecteur as idColCr FROM `collecteur_recuperer_client` cr INNER JOIN main_collecteur c ON c.idCollecteur=cr.idCollecteur LEFT JOIN client_faireversement_collecteur cf ON c.idCollecteur=cf.idCollecteur WHERE cr.statutCLient='pasOk' AND cr.idClient='$idClient' ORDER BY cf.dateProchainVersement DESC");
		if ($res = $req->fetchAll()) {
			$out[1] = $res;
		} else { 
			
		}
		return $out;
	}

	function tontine_et_versement_collecteur($idCollecteur)
	{
		global $base;
		$req = $base->query("SELECT * FROM `collecteur_recuperer_client` cr INNER JOIN main_client c ON c.idClient=cr.idClient WHERE cr.statutCLient='pasOk' AND cr.idCollecteur='$idCollecteur' ORDER BY cr.dateRecuperation DESC");
		if ($res = $req->fetchAll()) {
			$out[0] = $res;
		} else {
			return 1;
		}
		$req = $base->query("SELECT *, cf.idClient as idCl, cr.idClient as idClCr FROM `collecteur_recuperer_client` cr INNER JOIN main_client c ON c.idClient=cr.idClient LEFT JOIN client_faireversement_collecteur cf ON c.idClient=cf.idClient WHERE cr.statutCLient='pasOk' AND cr.idCollecteur='$idCollecteur' ORDER BY cf.dateProchainVersement DESC");
		if ($res = $req->fetchAll()) {
			$out[1] = $res;
		} else { 
			
		}
		return $out;
	}