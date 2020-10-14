<?php

	require_once("../../models/typemonument/typeMonumentModel.php");
	session_start();
	
	$libelle = trim(ucfirst($_POST['libelle']));
	$_SESSION['libelle'] = $libelle;
	$_SESSION['msg_erreur'] = "";
	
	//controle si libelle est vide
	if ( !empty($libelle) ) {
		typeMonument_Insert($libelle);
		
		//traitement  à effectuer au cas où on fait retour
	    //à la liste si l'insertion a réussi 
		//if ( $_SESSION['msg_erreur'] == "" ) {
		//	Header("Location: ../../controllers/typemonument/TypeMonumentListerAccept.php");	
		//} else {
		//	Header("Location: ../../views/typemonument/frmTypeMonumentCreer.php")	;					
		//}	
		Header("Location: ../../views/typemonument/frmTypeMonumentCreer.php")	;				
	} else {
		$_SESSION['msg_erreur'] = "Libellé non renseigné";
		Header("Location: ../../views/typemonument/frmTypeMonumentCreer.php")	;		
	} 
	
	
?>