<?php

	require_once("../../models/monument/monumentModel.php");
	session_start();

	//recuperation de l'id de type monument a chercher
	$id= $_GET['idMonument'];
    $traitement = $_GET['traitement'];
    $_SESSION['idMonument'] = $id;

	//recuperation de monument
	$monument= monument_find($id);

	//on passe $monument en variable de session
	$_SESSION['monument'] = $monument;

	if($traitement == 1){
		Header('Location: ../../views/monument/frmMonumentVoir.php');
	} else{
		if($traitement == 2){
			Header('Location: ../../views/monument/frmMonumentModifier.php');	
		}else{
			if($traitement == 3){
			Header('Location: ../../views/monument/frmMonumentSupprimer.php');							
            }else
            if($traitement == 4){            
			Header('Location: ../../views/monument/frmupload.php');	
			}
		}
    }
?>