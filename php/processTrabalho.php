<?php

include'connection.php';

session_start();

$nomeTrabalho = isset($_POST['nomeTrabalho']) && $_POST['nomeTrabalho'] ? trim($_POST['nomeTrabalho']) : null;
$Disciplina = isset($_POST['disciplina']) && $_POST['disciplina'] ? trim($_POST['disciplina']) : null;
$fase = isset($_POST['fase']) && $_POST['fase'] ? trim($_POST['fase']) : null;

if ($nomeTrabalho && $Disciplina && $fase) {

    $consulta = "SELECT * FROM trabalho WHERE nome = '$nomeTrabalho'";
    $result = mysql_query($consulta, $database);

    if (mysql_num_rows($result) > 0) {
        header('Location: ../index.php?pagina=formTrabalho$message=2');
    }

    $sql = "INSERT INTO trabalho (nome, id_usuario, id_disciplina, id_fase)
            VALUES ('$nomeTrabalho', '{$_SESSION['id_usuario']}', '$Disciplina', '$fase')";
            
    $result = mysql_query($sql, $database);
    
    header('Location: ../index.php?pagina=listadetrabalhos&message=1');
    
    } else {
        header('Location: ../index.php?pagina=formTrabalho&message=1');
        exit;
    }
?>