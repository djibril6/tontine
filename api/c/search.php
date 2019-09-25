<?php
	include '../m/m_search.php';
	if (isset($_POST['search'])) {
		extract($_POST);
		$telCollecteur = check_data($telCollecteur);
		// $idCommune = (int)$idCommune;
		$res = search_collecteur($telCollecteur);
		if ($res == 1) {
			retour_json(false, "Aucun collecteur trouvé");
		} else {
			retour_json(true, "ok", $res);
		}
	} else {
		retour_json(false, "Une erreur est survenue");
	}
	