<?php

$dbHost = 'localhost';
$dbusername = 'root';
$dbPassword = '';
$dbName = 'controle_de_gastos';

$conexao = new mysqli($dbHost, $dbusername, $dbPassword, $dbName);

if ($conexao->connect_errno) {
    echo "Erro na conexão: " . $conexao->connect_error;
} else {
    echo "Conexão efetuada com sucesso!";
}

?>
