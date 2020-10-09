<!DOCTYPE HTML>
<head>
	<?php
		//require_once("../../model/typemonument/typeMonumentModel.php");
		//$listeTypemonument = typeMonument_findAll();
		session_start();
		$listeTypemonument = $_SESSION['listeTypemonument'];
	?>
</head>
<html>  
<body>
	<table border "1">
		<thead>
			<tr>
				<th>Libellé</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($listeTypemonument as $ligne ) {?>	
			<tr>
				<td><?php echo $ligne['Libelle_TYPE_Monument'];?></td>
				<td><a href="../../controllers/typemonument/typemonumentVoirAccept.php?idtypemonument=<?php echo $ligne['ID_TYPE_Monument'] ?>">Voir</a>
				&nbsp;&nbsp;<a href="../../controllers/typemonument/typemonumentModifierAcceptChercher.php?idtypemonument=<?php echo $ligne['ID_TYPE_Monument'] ?>">Modifier</a>
				&nbsp;&nbsp;<a href="../../controllers/typemonument/typemonumentSupprimerAcceptChercher.php?idtypemonument=<?php echo $ligne['ID_TYPE_Monument'] ?>">Supprimer</a></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
	<a href="frmTypemonumentCreer.php"><button>Ajouter</button></a>
</body>
</html>