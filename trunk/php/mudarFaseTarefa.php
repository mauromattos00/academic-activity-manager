<?php

include'connection.php';

session_start();

$fase = isset($_POST['fase']) && $_POST['fase'] ? trim($_POST['fase']) : null;

if ($fase) {
    $sql = "UPDATE tarefa SET id_fase='$fase' WHERE id_tarefa ='{$_GET['id_tarefa']}'";
    $result = mysql_query($sql, $database);

    //COMO MANDAR DE VOLTA PARA A PÁGINA DE UM TRABALHO ESPECÍFICO?
    if ($result) {
        header('Location: ../index.php?pagina=trabalhos&message=3');
        exit;
    } else {
        header('Location: ../index.php?pagina=listadetrabalhos&message=2');
        exit;
    }
}
?>


