<?php

include'connection.php';

session_start();

$faseTrabalho = isset($_POST['faseTrabalho']) && $_POST['faseTrabalho'] ? trim($_POST['faseTrabalho']) : null;

if ($faseTrabalho) {
    $sql = "UPDATE trabalho SET id_fase='$faseTrabalho' WHERE id_trabalho ='{$_GET['id_trabalho']}'";
    $result = mysql_query($sql, $database);

    if ($result) {
        header('Location: ../index.php?pagina=listadetrabalhos&message=3');
        exit;
    } else {
        header('Location: ../index.php?pagina=listadetrabalhos&message=2');
        exit;
    }
}
?>
