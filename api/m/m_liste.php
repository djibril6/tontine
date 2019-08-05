<?php
	require 'header.php';

	function demande_collecteur($idClient, $idCollecteur, $dateReception)
	{
		global $base;
		$req = $base->query("SELECT * FROM collecteur_recevoirdemande_client  WHERE idCollecteur = '$idCollecteur' AND idClient = '$idClient'");
		if ($res = $req->fetch()) {
			return 1;
		} else { 
			$base->exec("INSERT INTO `collecteur_recevoirdemande_client` (`idCollecteur`, `idClient`, `dateReception`) VALUES ('$idCollecteur', '$idClient', '$dateReception')");
			return 0;
		}
	}