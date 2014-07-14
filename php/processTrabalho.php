<?php

include'connection.php';

session_start();

$nomeTrabalho = isset($_POST['nomeTrabalho']) && $_POST['nomeTrabalho'] ? trim($_POST['nomeTrabalho']) : null;
$Disciplina = isset($_POST['disciplina']) && $_POST['disciplina'] ? trim($_POST['disciplina']) : null;
$faseTrabalho = isset($_POST['faseTrabalho']) && $_POST['faseTrabalho'] ? trim($_POST['faseTrabalho']) : null;

if ($nomeTrabalho && $Disciplina && $faseTrabalho) {

    $consulta = "SELECT * FROM trabalho WHERE nome = '$nomeTrabalho'";
    $result = mysql_query($consulta, $database);

    if (mysql_num_rows($result) > 0) {
        header('Location: ../index.php?pagina=formTrabalho$message=2');
    }

    $sql = "INSERT INTO trabalho (nome, id_usuario, id_fase) VALUES ('$nomeTrabalho', '{$_SESSION['id_usuario']}', '$faseTrabalho')";
    
    header('Location: ../index.php?pagina=listadetrabalhos&message=1');
    
    } else {
        header('Location: ../index.php?pagina=formTrabalho&message=1');
        exit;
    }
?>