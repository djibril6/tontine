<?php
	include '../m/m_liste.php';
	if (isset($_POST['demande'])) {
		extract($_POST);
		$idClient = (int)$idClient; 
		$idCollecteur = (int)$idCollecteur;
		$dateReception = date("Y-m-d");
		$res = demande_collecteur($idClient, $idCollecteur, $dateReception);
		if ($res == 1) {
			retour_json(false, "Vous êtes déjà abonné à ce collecteur");
		} else {
			retour_json(true, "Demande envoyée");
		}
	}