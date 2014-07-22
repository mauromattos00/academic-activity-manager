<?php

include'connection.php';

session_start();

$fase = isset($_POST['fase']) && $_POST['fase'] ? trim($_POST['fase']) : null;

if ($fase) {
    $sql = "UPDATE tarefa 
            SET id_fase='$fase' 
            WHERE id_tarefa ='{$_GET['id_tarefa']}'";
    $result = mysql_query($sql, $database);

    if ($result) {
        $sql = "SELECT *
                FROM tarefa
                WHERE id_tarefa = {$_GET['id_tarefa']}";

        $result = mysql_query($sql);        
        $row = mysql_fetch_assoc($result);

        header('Location: ../index.php?pagina=trabalho&id_trabalho=' . $row['id_trabalho'] . '&message=3');
        exit;
    } else {
        header('Location: ../index.php?pagina=listadetrabalhos&message=2');
        exit;
    }
}
?>


