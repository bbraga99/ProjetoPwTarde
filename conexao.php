<?php

    $Servidor = "localhost";
    $User = "root";
    $Pass = "";
    $database = "projetopwnoite";

    $conexao = mysqli_connect($Servidor,$User,$Pass);
    mysqli_select_db($conexao,$database);

    
?>