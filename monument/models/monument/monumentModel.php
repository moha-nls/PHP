<?php

	require_once("../../models/connexion.php");
	
	function monument_Find( $id ) {
	
		$vId = $id;
		
		// preparation de la requête sql 
		$reqSql = "select * from monument where ID_Monument = :vId";

		//initialisation de $monumenttrouve
		$monumenttrouve = array();

		try{
			//établit la connexion à la bdd
			$cnx = connect_db();
			
			//préparation à l'exécution de la requete
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vId', $vId, PDO::PARAM_INT);
			
			//exécution
			$stmt->execute();
			$monumenttrouve = $stmt->fetch();
			
			//fermeture du curseur
			$stmt->closeCursor();

		} catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: ../../controllers/monument/MonumentListerAccept.php" );
		}
		
		//fermer la connexion
		$cnx = null;	
		return $monumenttrouve;
	}

	function monument_Insert( $nomMonument, $arrMonument, $adrMonument, $siteMonument, $dateCreation, $idTypeMonument ) {
		
		// sécurisation des données
		$vNomMonument = filter_var($nomMonument, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vArrMonument = $arrMonument;
		$vAdrMonument = filter_var($adrMonument, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vSiteMonument = filter_var($siteMonument, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vDateCreation = $dateCreation;
		$vIdTypeMonument = $idTypeMonument;
		$vMonumentId = '';

		// prepare requête sql 
		$reqSql = "insert into monument values (:vMonumentId, :vNomMonument," .
					" :vArrMonument, :vAdrMonument, :vSiteMonument, :vDateCreation," . 
					" :vIdTypeMonument )";

		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vMonumentId', $vMonumentId, PDO::PARAM_INT);
			$stmt->bindParam(':vNomMonument', $vNomMonument, PDO::PARAM_STR);
			$stmt->bindParam(':vArrMonument', $vArrMonument, PDO::PARAM_INT);
			$stmt->bindParam(':vAdrMonument', $vAdrMonument, PDO::PARAM_STR);
			$stmt->bindParam(':vSiteMonument', $vSiteMonument, PDO::PARAM_STR);
			$stmt->bindParam(':vDateCreation', $vDateCreation, PDO::PARAM_STR);
			$stmt->bindParam(':vIdTypeMonument', $vIdTypeMonument, PDO::PARAM_INT);
			
			
			//exécution
			$stmt->execute();

			//fermeture du curseur
			$stmt->closeCursor();
			
		} catch(PDOException $error){
			$_SESSION['msg_erreur'] = $error->getMessage();
		}
		
		//fermer la connexion
		$cnx = null;			
	}
	
	function monument_Update( $id, $nomMonument, $arrMonument, $adrMonument, $siteMonument, $dateCreation, $idTypeMonument ) {
		
		$vMonumentId = $id;
	
		// sécurisation des données
		$vNomMonument = filter_var($nomMonument, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vArrMonument = $arrMonument;
		$vAdrMonument = filter_var($adrMonument, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vSiteMonument = filter_var($siteMonument, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$vDateCreation = $dateCreation;
		$vIdTypeMonument = $idTypeMonument;

		// prepare requête sql 
		$reqSql = "update monument set Nom_Monument = :vNomMonument, " .
				  "Arrondissement_Monument = :vArrMonument, " .
				  "Adresse_Monument = :vAdrMonument," .
				  "Site_Web_Monument = :vSiteMonument, " .
				  "date_creation = :vDateCreation, " .
				  "FK_ID_TYPE_MONUMENT = :vIdTypeMonument " .
				  " where ID_Monument = :vMonumentId";

		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vMonumentId', $vMonumentId, PDO::PARAM_INT);
			$stmt->bindParam(':vNomMonument', $vNomMonument, PDO::PARAM_STR);
			$stmt->bindParam(':vArrMonument', $vArrMonument, PDO::PARAM_INT);
			$stmt->bindParam(':vAdrMonument', $vAdrMonument, PDO::PARAM_STR);
			$stmt->bindParam(':vSiteMonument', $vSiteMonument, PDO::PARAM_STR);
			$stmt->bindParam(':vDateCreation', $vDateCreation, PDO::PARAM_STR);
			$stmt->bindParam(':vIdTypeMonument', $vIdTypeMonument, PDO::PARAM_INT);
			
			//exécution
			$stmt->execute();

			//fermeture du curseur
			$stmt->closeCursor();

		} catch(PDOException $error){
			$_SESSION['msg_erreur'] = $error->getMessage();
		}
		
		//fermer la connexion
		$cnx = null;		
	}
	
	function monument_Delete( $id ) {

		$vMonumentId = $id;

		// prepare requête sql 
		$reqSql = "delete from monument " .
				  " where ID_Monument = :vMonumentId";

		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
							
			// bind parameters
			$stmt->bindParam(':vMonumentId', $vMonumentId, PDO::PARAM_INT);
			
			//exécution
			$stmt->execute();

			//fermeture du curseur
			$stmt->closeCursor();

		} catch(PDOException $error){
			$_SESSION['msg_erreur'] = $error->getMessage();
		}
		
		//fermer la connexion
		$cnx = null;			
	}
	
	function monument_findAll(){

		//preparation de la requete d'extraction de tous les enregistrements
		$reqSql = "select * from monument";

		//connexion  la base de données
		$cnx = connect_db();
	
		$listeMonument = array();
		
		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
		
			//exécution
			$stmt->execute();
		
			$listeMonument = $stmt->fetchAll();

			//fermeture du curseur
			$stmt->closeCursor();
		
		} catch(PDOException $error){
			//$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			//$_SESSION['message_erreur'] = $message_erreur;
			//Header("Location: PageErreur.php" );
			$_SESSION['msg_erreur'] = $error->getMessage();
		}
	
		//fermer la connexion
		$cnx = null;	
		return $listeMonument;

	}	
	
?>