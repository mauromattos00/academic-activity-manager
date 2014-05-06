<?php

include'connection.php';

if (isset($_GET['id_usuario']) && ($id_usuario = $_GET['id_usuario'])) {

    $sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql, $database);

    if (mysql_num_rows($result) == 1) {
        $sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
        $result = mysql_query($sql, $database);

        if ($result) {
            header('Location: index.php?message=1');
            exit;
        }
    }
    header('Location: index.php?message=2');
    exit;
} else {
    header('Location: index.php');
    exit;
}

?>