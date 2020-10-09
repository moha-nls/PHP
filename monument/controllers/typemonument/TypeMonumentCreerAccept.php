<?php

	require_once("../../model/typemonument/typeMonumentModel.php");
	session_start();
	
	$libelle = trim(ucfirst($_POST['libelle']));
	
	//controle si libelle est vide

	
	typeMonument_Insert($libelle);

	Header("Location: ../../controllers/typemonument/TypeMonumentListerAccept.php");
?>