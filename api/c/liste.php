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
	} elseif (isset($_POST['listeDemande'])) {
		
		$idCollecteur = (int)$_POST['idCollecteur'];
		$res = liste_demandes_clients($idCollecteur);
		if ($res == 1) {
			retour_json(false, "Aucune demande pour le moment");
		} else {
			retour_json(true, "ok", $res);
		}
	} elseif (isset($_POST['refuserDemande'])) {
		extract($_POST);
		$idClient = (int)$idClient;
		$idCollecteur = (int)$idCollecteur;
		refuser_demande($idClient, $idCollecteur);
		$res = liste_demandes_clients($idCollecteur);
		if ($res == 1) {
			retour_json(false, "Aucune demande pour le moment");
		} else {
			retour_json(true, "Demande refusée", $res);
		}
	} elseif (isset($_POST['recupererClient'])) {
		extract($_POST);
		$idClient = (int)$idClient;
		$idCollecteur = (int)$idCollecteur;
		$dateRecuperation = date("Y-m-d");
		$dateDebutCollecte = check_data($dateDebutCollecte);
		$montant = (int)check_data($montant);
		$frequence = (int)check_data($frequence);
		$typeFrequence = check_data($typeFrequence);
		if (isset($telClient)) {
			$telClient = check_data($telClient);
		} else {
			$telClient = '';
		}
		$res = recuperer_client($idClient, $idCollecteur, $dateRecuperation,$dateDebutCollecte, $montant, $frequence, $typeFrequence, $telClient);

		if ($res == 1) {
			retour_json(false, "Aucun client ne dispose de ce numéro");
		} else {
			retour_json(true, "Client récupéré");
		}
	}