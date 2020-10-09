<!DOCTYPE HTML>
<head>
	<?php
		session_start();
	?>
</head>
<html>  
<body>

	<form action="../../controllers/typemonument/TypeMonumentCreerAccept.php" method="post">
		Libellé: <input type="text" name="libelle" autofocus><br>
		<button type="submit" >Valider</button>		
	</form>

</body>
</html>