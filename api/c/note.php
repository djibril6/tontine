<?php
	include '../m/m_note.php';
	if (isset($_POST['noter'])) {
		extract($_POST);
		
		$note = (int)$note;
		$message = check_data($message);
		$telUser = check_data($telUser);
		$dateFeedback = date("Y-m-d");
		noter_appli($note, $message, $telUser, $dateFeedback);
		retour_json(true, "");
	}