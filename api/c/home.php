<?php
	include '../m/m_home.php';
	if (isset($_POST['dashboard']) && isset($_POST['idClient'])) {
		extract($_POST);
		
		$idCient = (int)$idClient;
		$res = tontine_et_versement($idClient);

		if ($res == 1) {
			retour_json(false, "Aucune donnée");
		} else {
			retour_json(true, "", $res);
		}
		
	} elseif (isset($_POST['dashboard']) && isset($_POST['idCollecteur'])) {
		extract($_POST);
		
		$idCollecteur = (int)$idCollecteur;
		$res = tontine_et_versement_collecteur($idCollecteur);

		if ($res == 1) {
			retour_json(false, "Aucune donnée");
		} else {
			retour_json(true, "", $res);
		}
	}