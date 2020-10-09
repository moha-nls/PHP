<?php

    require_once("../../model/typemonument/typeMonumentModel.php");
    session_start();

    $libelle = trim(ucfirst($_POST['libelle']));
    $id = $_POST['idTypeMonument'];

    //controle si libelle est vide
    

    typeMonument_Update($id, $libelle);
    
    Header("Location: ../../controllers/typemonument/TypeMonumentListerAccept.php");
?>