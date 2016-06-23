<?php
$database = mysql_connect('localhost', 'root', '');
// Efetua o login no phpMyAdmin

$base = mysql_select_db('mydb');
// Conecta com o banco de dados do projeto

if (!$database && !$base){
    die("<p>Ocorreu um problema ao tentar conectar com o banco de dados.</p>");
    //Se a conexão não for bem sucedida, interromper o processo e exibe a mensagem acima ao usuário
}
?>
