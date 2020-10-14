<?php
	
	require_once("../../models/typemonument/typemonumentModel.php");
	session_start();
	
	$_SESSION['listeTypemonument'] = typeMonument_findAll();
	
	Header("Location: ../../views/typemonument/ListerTypeMonument.php");
	
?>