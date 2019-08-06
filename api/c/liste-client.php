<?php
	include '../m/m_liste-client.php';
	if (isset($_POST['listeCLients'])) {
		extract($_POST);
		$idCollecteur = (int)$idCollecteur;
		$res = liste_clients($idCollecteur);
		if ($res == 1) {
			retour_json(false, "Aucun client pour le moment");
		} else {
			retour_json(true, "", $res);
		}
	} else {
		retour_json(false, "Une erreur est survenue");
	}
	