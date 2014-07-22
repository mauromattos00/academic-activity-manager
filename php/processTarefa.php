<?php

include'connection.php';

session_start();

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$descricao_tarefa = isset($_POST['descricao_tarefa']) && $_POST['descricao_tarefa'] ? trim($_POST['descricao_tarefa']) : null;
$id_trabalho = isset($_GET['id_trabalho']) && $_GET['id_trabalho'] ? trim($_GET['id_trabalho']) : null;
$fase = isset($_POST['fase']) && $_POST['fase'] ? trim($_POST['fase']) : null;

if ($nome && $descricao_tarefa && $id_trabalho && $fase) {

    $consulta = "SELECT * FROM tarefa WHERE nome = '$nome'";
    $result = mysql_query($consulta, $database);

    if (mysql_num_rows($result) > 0) {
        header('Location: ../index.php?pagina=formTarefa$message=1');
    }
    $sql = "INSERT INTO tarefa (nome, descricao_tarefa, id_trabalho, id_fase)
        VALUES ('$nome', '$descricao_tarefa', '$id_trabalho', '$fase')";

    $result = mysql_query($sql, $database);
//COMO REDIRECIONAR PARA A PÁGINA DE UM TRABALHO ESPECÍFICO?
    header("Location: ../index.php?pagina=trabalho&id_trabalho=$id_trabalho&message=1");
} else {
    header("Location: ../index.php?pagina=formTarefa&id_trabalho=$id_trabalho&message=2");
    exit;
}
