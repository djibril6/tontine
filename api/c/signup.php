<?php
	include '../m/m_signup.php';

	if (isset($_POST['signup'])) {
		extract($_POST);
		$nom = check_data($nom);
		$prenom = check_data($prenom); 
		$tel1 = check_data($tel1); 
		$codePays = check_data($codePays); 
		$motDePasse = sha1(check_data($motDePasse)); 
		// $idCommune = (int)$idCommune;
		$profil = check_data($profil); 
	
		if ($profil == 'collecteur') {
			$res = signup_collecteur($nom, $prenom, $tel1, $motDePasse);
		} else {
			$res = signup_client($nom, $prenom, $tel1, $motDePasse);
		}
		if ($res == 1) {
			retour_json(false, "Le numéro de téléphone que vous avez saisi existe déjà");
		} else {
			retour_json(true, "ok", $res);
		}
	} else {
		retour_json(false, "Une erreur est survenue");
	}