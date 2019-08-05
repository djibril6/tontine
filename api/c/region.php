<?php
	include '../m/m_region.php';

	if (isset($_POST['listeRegion'])) {
		extract($_POST);
		$dep = liste_departements();
		$com = liste_communes();

		if ($dep == 1 || $com == 1) {
			retour_json(false, "Une erreur est survenue lors du chargement des régions");
		} else {
			$res[0] = $dep;
			$res[1] = $com;
			retour_json(true, "ok", $res);
		}
	} else {
		retour_json(false, "Une erreur est survenue");
	}