<?php
	include '../m/m_login.php';

	if (isset($_POST['login'])) {
		extract($_POST);
		$tel1 = check_data($tel1);
		$tel1 = "+229".$tel1;
		$motDePasse = sha1(check_data($motDePasse));
		$profil = check_data($profil); 
	
		if ($profil == 'collecteur') {
			$res = login_collecteur($tel1, $motDePasse);
		} else {
			$res = login_client($tel1, $motDePasse);
		}
		if ($res == 1) {
			retour_json(false, "Téléphone ou Mot de passe incorrect!");
		} else {
			retour_json(true, "ok", $res);
		}
	}