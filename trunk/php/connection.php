<?php
$database = mysql_connect('localhost', 'root', '');
$base = mysql_select_db('mydb');

if (!$database && !$base){
    die("<p>Ocorreu um problema ao tentar conectar com o banco de dados.</p>");
}
?>
