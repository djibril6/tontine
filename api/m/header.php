<?php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
// header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
	try
	{
		$base = new PDO('mysql:host=localhost;dbname=tontine', 'root' , '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : ' .$e->getMessage());
		retour_json(false,"connexion échouée");
	}

	function retour_json($success, $message, $result=NULL) {
		$resultat = array();
		$resultat["success"] = $success;
		$resultat["message"] = $message;
		$resultat["result"] = $result;
		echo json_encode($resultat);
	}

	function check_data($data) {
		return addslashes(htmlspecialchars($data));
	}