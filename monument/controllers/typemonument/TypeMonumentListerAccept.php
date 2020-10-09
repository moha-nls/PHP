<?php

    require_once("../../model/typemonument/typeMonumentModel.php");
    session_start();

    $_SESSION['listeTypemonument'] = typeMonument_findAll();

    header("Location: ../../views/typemonument/ListerTypeMonument.php");
?>