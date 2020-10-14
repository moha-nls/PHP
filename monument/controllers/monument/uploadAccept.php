<?php
    session_start();

    $ext = strstr($_FILES['photo']['name'],".");
    $destination = "../../images/monument/monument_".$_SESSION['idMonument'].$ext; 

    //$_FILES['photo']['name']
    if ( isset($_FILES['photo']['tmp_name']) ) {
        $retour = copy($_FILES['photo']['tmp_name'], $destination );
        if($retour) {
            echo '<p>La photo a bien été envoyée.</p>';
            echo '<img src="' . $_FILES['photo']['name'] . '">';
        }
    }
?>