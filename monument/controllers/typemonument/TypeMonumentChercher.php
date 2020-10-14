<?php


	require_once("../../models/typemonument/typeMonumentModel.php");
	session_start();

	//récupération de l'id de type monument à chercher
	$id = $_GET['idtypemonument'];
	$traitement = $_GET['traitement'];
	
	//récupération du type monument
	$typemonument = typeMonument_find( $id );
	
	//on passe $typemonument en variable de session
	$_SESSION['typemonument'] = $typemonument;
	
	if ( $traitement == 1 ) {
		Header("Location: ../../views/typemonument/frmTypeMonumentVoir.php");
	} else {
		if ( $traitement == 2 ) {
			Header("Location: ../../views/typemonument/frmTypeMonumentModifier.php");
		} else {
			Header("Location: ../../views/typemonument/frmTypeMonumentSupprimer.php");			
		}
	}
?>