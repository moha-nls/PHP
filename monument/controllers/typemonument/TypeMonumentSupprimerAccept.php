<?php

	require_once("../../models/typemonument/typeMonumentModel.php");
	session_start();
	
	$libelle = trim(ucfirst($_POST['libelle']));
	$idTypemonument = $_POST['idTypemonument'];
	
	typeMonument_Delete($idTypemonument, $libelle);
		
	if ( $_SESSION['msg_erreur'] == "") {
		Header("Location: ../../controllers/typemonument/TypeMonumentListerAccept.php")	;				
	} else {
		Header("Location: ../../views/typemonument/frmTypeMonumentSupprimer.php")	;		
	}

	
?>