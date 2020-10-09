<!DOCTYPE HTML>
<head>
	<?php
        session_start();
        $typeMonument = $_SESSION['typemonument'];
	?>
</head>
<html>  
    <body>
        <p>VOIR</p>
	    <div>
            Libellé: <input type="text" name="libelle" value="<?php echo $typeMonument['Libelle_TYPE_Monument'];?>" disabled><br>
		    <input type="hidden" name="idTypeMonument" value="<?php echo $typeMonument['ID_TYPE_Monument'];?>">		
	    </div>
        <a href="ListerTypeMonument.php"><button>Retour</button></a>
    </body>
</html>