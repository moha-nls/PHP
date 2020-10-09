<?php

    require_once("../../model/typemonument/typeMonumentModel.php");
    session_start();


    $id = $_POST['idTypeMonument'];

    //controle si libelle est vide
    

    typeMonument_Delete($id);

    Header("Location: ../../controllers/typemonument/TypeMonumentListerAccept.php");

?>