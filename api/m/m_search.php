<?php
	require 'header.php';

	function search_collecteur($tel1Collecteur)
	{
		global $base;
		$req = $base->query("SELECT * FROM main_collecteur WHERE tel1Collecteur LIKE '%$tel1Collecteur%'");
		if ($res = $req->fetchAll()) {
			return $res;
		} else {

			$req = $base->query("SELECT * FROM main_collecteur LIMIT 0, 20");
			if ($res = $req->fetchAll()) {
				return $res;
			} else {
				return 1;
			}

			// $req = $base->query("SELECT * FROM main_collecteur c INNER JOIN main_commune co ON c.idCommune = co.idCommune WHERE c.idCommune = '$idCcommuneClient'");
			// if ($res = $req->fetchAll()) {
			// 	return $res;
			// } else {

			// 	$req = $base->query("SELECT * FROM main_collecteur c INNER JOIN main_commune co ON c.idCommune = co.idCommune INNER JOIN main_departement d ON d.idDepartement=co.idDepartement WHERE c.idCommune = (SELECT idDepartement FROM main_commune WHERE idCommune = '$idCcommuneClient')");
			// 	if ($res = $req->fetchAll()) {
			// 		return $res;
			// 	} else {
			// 		$req = $base->query("SELECT * FROM main_collecteur");
			// 		if ($res = $req->fetchAll()) {
			// 			return $res;
			// 		} else {
			// 			return 1;
			// 		}
			// 	}

			// }
		}
	}