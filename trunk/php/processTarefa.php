<?php
include'connection.php';

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$descricao_tarefa = isset($_POST['descricao_tarefa']) && $_POST['descricao_tarefa'] ? trim($_POST['descricao_tarefa']) : null;
$id_trabalho = isset($_POST['id_trabalho']) && $_POST['id_trabalho'] ? trim($_POST['id_trabalho']) : null;

?>
