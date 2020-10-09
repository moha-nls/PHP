<?php

    require_once("../../model/connexion.php");



    function typeMonument_find($id){

        $vId = $id; 
    
        // prepare requête sql selectionner
        $reqSql = "select * from type_monument where ID_TYPE_Monument = :vId";
    
        //initialisation de $typemonumenttrouve
        $typemonumenttrouve = array();

	    try{
            //etablir la connexion à la base de données
            $cnx = connect_db();
        
            //préparation à l'execution de la requête
		    $stmt=$cnx->prepare($reqSql);
						
		    // bind parameters
		    $stmt->bindParam(':vId', $vId, PDO::PARAM_INT);
		
		    //exécution
		    $stmt->execute();
            $typemonumenttrouve = $stmt->fetch();
        
		    //fermeture du curseur
		    $stmt->closeCursor();

	    } catch(PDOException $error){
		    $message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
		    $_SESSION['message_erreur'] = $message_erreur;
		    Header("Location: pageerreur.php" );
	    }
	
	    //fermer la connexion
	    $cnx = null;	
        return $typemonumenttrouve;
    }



    function typeMonument_Insert($libelle){


        // sécurisation des données
        $vLibelle = filter_var($libelle, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $vTypeMonumentId = '';
    
    
        // prepare requête sql 
        $reqSql = "insert into type_monument values (:vTypeMonumentId, :vLibelle)";
    
        try{
            $cnx = connect_db();
            $stmt=$cnx->prepare($reqSql);
                            
            // bind parameters
            $stmt->bindParam(':vTypeMonumentId', $vTypeMonumentId, PDO::PARAM_INT);
            $stmt->bindParam(':vLibelle', $vLibelle, PDO::PARAM_STR);
            
            //exécution
            $stmt->execute();
    
            //fermeture du curseur
            $stmt->closeCursor();
    
            echo "Création réussie";
            
        } catch(PDOException $error){
            $message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
            $_SESSION['message_erreur'] = $message_erreur;
            Header("Location: pageerreur.php" );
        }
        
        //fermer la connexion
        $cnx = null;
    }



    function typeMonument_Update($id, $libelle){

        $vTypeMonumentId = $id;

        // sécurisation des données
        $vLibelle = filter_var($libelle, FILTER_SANITIZE_FULL_SPECIAL_CHARS);          

        // prepare requête sql 
        $reqSql = " UPDATE type_monument SET Libelle_TYPE_Monument = :vLibelle WHERE ID_TYPE_Monument = :vTypeMonumentId";

        try{
            $cnx = connect_db();
            $stmt=$cnx->prepare($reqSql);
                    
            // bind parameters
            $stmt->bindParam(':vTypeMonumentId', $vTypeMonumentId, PDO::PARAM_INT);
            $stmt->bindParam(':vLibelle', $vLibelle, PDO::PARAM_STR);
    
            //exécution
            $stmt->execute();

            //fermeture du curseur
            $stmt->closeCursor();

            echo "Création réussie";
    
        } catch(PDOException $error){
            $message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
            $_SESSION['message_erreur'] = $message_erreur;
            Header("Location: pageerreur.php" );
        }

        //fermer la connexion
        $cnx = null;	    
    }



    function typeMonument_Delete($id){
        
        $vTypeMonumentId = $id;
   
        // prepare requête sql 
        $reqSql = " DELETE FROM type_monument WHERE ID_TYPE_Monument = :vTypeMonumentId";

        try{
            $cnx = connect_db();
            $stmt=$cnx->prepare($reqSql);
                    
            // bind parameters
            $stmt->bindParam(':vTypeMonumentId', $vTypeMonumentId, PDO::PARAM_INT);           
    
            //exécution
            $stmt->execute();

            //fermeture du curseur
            $stmt->closeCursor();

            echo "Création réussie";
    
        } catch(PDOException $error){
            $message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
            $_SESSION['message_erreur'] = $message_erreur;
            Header("Location: pageerreur.php" );
        }

        //fermer la connexion
        $cnx = null;
    }



    function typeMonument_findAll(){

		//preparation de la requete d'extraction de tous les enregistrements
		$reqSql = "select * from type_monument";

		//connexion  la base de données
		$cnx = connect_db();
	
		$listeTypeMonument = array();
		
		try{
			$cnx = connect_db();
			$stmt=$cnx->prepare($reqSql);
		
			//exécution
			$stmt->execute();
		
			$listeTypeMonument = $stmt->fetchAll();

			//fermeture du curseur
			$stmt->closeCursor();
		
		} catch(PDOException $error){
			$message_erreur =  "Erreur SQL ! : " . $error->getCode().' '.$error->getMessage() . "<br/>";
			$_SESSION['message_erreur'] = $message_erreur;
			Header("Location: PageErreur.php" );
		}
	
		//fermer la connexion
		$cnx = null;	
		return $listeTypeMonument;
	}
?>
 