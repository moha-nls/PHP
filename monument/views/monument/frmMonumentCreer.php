<!DOCTYPE HTML>
<head>
	<?php
		session_start();
	?>
</head>
<html>  
<body>

	<form action="../../controllers/typemonument/TypeMonumentCreerAccept.php" method="post">
		Nom Monument: <input type="text" name="nomMonument" autofocus><br>
		Arrondissement Monument: <input type="text" name="arrondissementMonument" autofocus><br>
		Adresse Monument: <input type="text" name="adresseMonument" autofocus><br>
		Site Web Monument : <input type="text" name="siteWebMonument" autofocus><br>
        <select name="" id="">
        <option value=""></option>
        </select><br>
		<button type="submit" >Valider</button>		
	</form>

</body>
</html>