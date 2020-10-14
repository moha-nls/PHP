<?php

	require_once("../../models/typemonument/typeMonumentModel.php");
	session_start();
	
	$libelle = trim(ucfirst($_POST['libelle']));
	$idTypemonument = $_POST['idTypemonument'];
	
	$_SESSION['libelle'] = $libelle;
	$_SESSION['msg_erreur'] = "";
	
	//controle si libelle est vide
	if ( !empty($libelle) ) {
		
		typeMonument_Update($idTypemonument, $libelle);
		
		if ( $_SESSION['msg_erreur'] == "") {
			Header("Location: ../../controllers/typemonument/TypeMonumentListerAccept.php")	;				
		} else {
			Header("Location: ../../views/typemonument/frmTypeMonumentModifier.php")	;		
		}
	} else {
		$_SESSION['msg_erreur'] = "Libellé non renseigné";
		Header("Location: ../../views/typemonument/frmTypeMonumentModifier.php")	;		
	} 
	
	
?>