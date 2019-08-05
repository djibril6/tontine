<?php
	require 'header.php';

	function liste_departements()
	{
		global $base;
		$req = $base->query("SELECT * FROM main_departement");
		if ($res = $req->fetchAll()) {
			return $res;
		} else {
			return 1;
		}
	}

	function liste_communes()
	{
		global $base;
		$req = $base->query("SELECT * FROM main_commune");
		if ($res = $req->fetchAll()) {
			return $res;
		} else {
			return 1;
		}
	}