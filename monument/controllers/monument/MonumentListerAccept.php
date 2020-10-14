<?php
	
	require_once("../../models/monument/monumentModel.php");
	session_start();
	
	$_SESSION['listeMonument'] = monument_findAll();
	
	Header("Location: ../../views/monument/ListerMonument.php");
	
?>