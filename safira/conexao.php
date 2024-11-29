<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'anna_tcc';
    
    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
    $conn = $conexao;

    // if($conexao->connect_errno)
    // {
    //     echo "Erro";
    // }
    // else
    // {
    //     echo "Conexão efetuada com sucesso";
    // }

?>