<!DOCTYPE HTML>
<head>
	<?php
        session_start();
		$typeMonument = $_SESSION['typemonument'];
	?>
</head>
<html>  
<body>

    <p>MODIFICATION</p>
	<form action="../../controllers/typemonument/TypeMonumentModifierAccept.php" method="post">
		<input type="hidden" name="idTypeMonument" value="<?php echo $typeMonument['ID_TYPE_Monument'];?>">
			Libellé: <input type="text" name="libelle" value="<?php echo $typeMonument['Libelle_TYPE_Monument'];?>" autofocus><br>
		<button type="submit" >Valider</button>
		
	</form>

</body>
</html>