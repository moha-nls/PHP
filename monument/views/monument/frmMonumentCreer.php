<!DOCTYPE HTML>
<html>
<head>

	<meta charset="UTF-8">
	<title>Monuments de Paris</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Ajout de Bootstrap à partir du CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>	

	<!--Ajout de W3.CSS à partir du CDN-->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> 
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

	<!--Pour utiliser les icônes Font Awesome avec Bootstrap 4 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<!--Fichier CSS de la page-->
    <link rel="stylesheet" href="../../css/main.css" />
	<?php
		session_start();
		require_once("../../models/typemonument/typeMonumentModel.php");
		$listeTypeMonument = typeMonument_findAll();
		$optChoisi = "selected";
		if ( isset($_SESSION['msg_erreur']) ) {
			if ($_SESSION['msg_erreur'] == "") {
				$nomMonument = "";
				$arrMonument = "";
				$adrMonument = "";
				$siteMonument = "";
				$dateCreation = "";
				$idTypeMonument = "";
			} else {
				$nomMonument = $_SESSION['nomMonument'];
				$arrMonument = $_SESSION['arrMonument'];
				$adrMonument = $_SESSION['adrMonument'];
				$siteMonument = $_SESSION['siteMonument'];
				$dateCreation = $_SESSION['dateCreation'];
				$idTypeMonument = $_SESSION['idTypeMonument'];
			}
		} else {
			$nomMonument = "";
			$arrMonument = "";
			$adrMonument = "";
			$siteMonument = "";
			$dateCreation = "";
			$idTypeMonument = "";
			$_SESSION['msg_erreur'] = "";
		}
	?>
</head>
<body>
	<div class="w3-container w3-black">
		<h1>MONUMENT</h1>
	</div>
	<br>
	
	<div class="w3-row">
		<div class="w3-quarter w3-container">
		&nbsp;
		</div>
		<div class="w3-half w3-light-grey w3-border w3-card-4">
			<div class="w3-container w3-blue">
				<h2>Création d'un monument </h2>
			</div>
			<br><br>
			<form class="w3-container" action="../../controllers/monument/MonumentCreerAccept.php" method="post">
				<p class="w3-text-red"><?php echo $_SESSION['msg_erreur'];?> </p>
				<br>
				<label>Nom</label>
				<input class="w3-input w3-text-blue" type="text" name="nomMonument" value="<?php echo $nomMonument; ?>" autofocus>
				<label>Arrondissement</label>
				<input class="w3-input w3-text-blue" type="text" name="arrMonument" value="<?php echo $arrMonument; ?>" >
				<label>Adresse</label>
				<input class="w3-input w3-text-blue" type="text" name="adrMonument" value="<?php echo $adrMonument; ?>" >
				<label>Site web</label>
				<input class="w3-input w3-text-blue" type="text" name="siteMonument" value="<?php echo $siteMonument; ?>" >
				<label>Date création</label>
				<input class="w3-input w3-text-blue" type="date" name="dateCreation" value="<?php echo $dateCreation; ?>" >
				<label>Type monument</label>
				<select class="w3-select w3-text-black" name="idTypeMonument">
					<option value="0" >Selectionner un type monument</option>
					<?php 
						foreach ( $listeTypeMonument as $typeMonument ){	
					?>					
					<option name="idTypeMonumentOption" value="<?php echo $typeMonument['ID_TYPE_Monument']; ?>"
							<?php
								if ( $typeMonument['ID_TYPE_Monument'] == $idTypeMonument ) {
									echo $optChoisi;
								}
							?>>
							<?php echo $typeMonument['Libelle_TYPE_Monument']; ?>
					</option>
					<?php 
						}
					?>		
				</select>
				<br><br>
				<button type="submit" class="w3-btn w3-teal w3-round-large w3-hover-green w3-medium"><i class="fa fa-check" ></i>&nbsp;&nbsp; Enregistrer</button>
				<br><br>
			</form>	
			<footer class="w3-brown w3-padding-large w3-right-align">
				<a href="../../controllers/monument/MonumentListerAccept.php" ><button class="w3-btn w3-aqua w3-round-large w3-hover-green w3-medium"><i class="fa fa-hand-o-left" ></i>&nbsp;&nbsp;Retour </button></a>
			</footer>				
		</div>
		<div class="w3-quarter w3-container">
		&nbsp;
		</div>
	</div> 		
</body>
</html>