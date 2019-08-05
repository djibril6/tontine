<?php
	require 'header.php';

	function login_client($tel1Client, $motDePasseClient)
	{
		global $base;
		$req = $base->query("SELECT * FROM main_client WHERE tel1Client = '$tel1Client' AND motDePasseClient = '$motDePasseClient'");
		if ($res = $req->fetch()) {
			return $res;
		} else {
			return 1;
		}
	}

	function login_collecteur($tel1Collecteur, $motDePasseCollecteur)
	{
		global $base;
		$req = $base->query("SELECT * FROM main_collecteur WHERE tel1Collecteur = '$tel1Collecteur' AND motDePasseCollecteur = '$motDePasseCollecteur'");
		if ($res = $req->fetch()) {
			return $res;
		} else {
			return 1;
		}
	}