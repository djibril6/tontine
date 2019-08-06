<?php
	require 'header.php';

	function liste_clients($idCollecteur)
	{
		global $base;
		$req = $base->query("SELECT *, cr.idClient as idClCr FROM `collecteur_recuperer_client` cr INNER JOIN main_client c ON c.idClient=cr.idClient WHERE cr.statutCLient='pasOk' AND cr.idCollecteur='$idCollecteur' ORDER BY cr.dateRecuperation DESC");
		if ($res = $req->fetchAll()) {
			return $res;
		} else {
			return 1;
		}
	}