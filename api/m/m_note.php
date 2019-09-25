<?php
	require 'header.php';

	function noter_appli($note, $message, $telUser, $dateFeedback)
	{
		global $base;
		$base->exec("INSERT INTO `main_feedback` (`note`, `message`, `telUser`, dateFeedback) VALUES ('$note', '$message', '$telUser', '$dateFeedback')");
	}