<?php

include'connection.php';

session_start();

$fase = isset($_POST['fase']) && $_POST['fase'] ? trim($_POST['fase']) : null;

if ($fase) {
    $sql = "UPDATE trabalho SET id_fase='$fase' WHERE id_trabalho ='{$_GET['id_trabalho']}'";
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
