<?php

include'connection.php';

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$sobrenome = isset($_POST['sobrenome']) && $_POST['sobrenome'] ? trim($_POST['sobrenome']) : null;
$email = isset($_POST['email']) && $_POST['email'] ? trim($_POST['email']) : null;
$senha = isset($_POST['senha']) && $_POST['senha'] ? trim($_POST['senha']) : null;
$nascimento = isset($_POST['nascimento']) && $_POST['nascimento'] ? trim($_POST['nascimento']) : null;
$sexo = isset($_POST['sexo']) && $_POST['sexo'] ? trim($_POST['sexo']) : null;
$estado = isset($_POST['estado']) && $_POST['estado'] ? trim($_POST['estado']) : null;
$cidade = isset($_POST['cidade']) && $_POST['cidade'] ? trim($_POST['cidade']) : null;
$ensinoMedio = isset($_POST['ensinoMedio']) && $_POST['ensinoMedio'] ? trim($_POST['ensinoMedio']) : null;
$ensinoSuperior = isset($_POST['ensinoSuperior']) && $_POST['ensinoSuperior'] ? trim($_POST['ensinoSuperior']) : null;

if ($nome && $sobrenome && $email && $senha && $nascimento && $sexo && $estado && $cidade && $ensinoMedio && $ensinoSuperior){
    
    $sql = (isset($_GET['id_usuario']) && ($id_usuario = $_GET['id_usuario']))
            ? "UPDATE usuario SET nome='$nome',sobrenome='$sobrenome',email='$email',nascimento='$nascimento',senha='$senha',sexo='$sexo',cidade='$cidade',estado='$estado',ensinoMedio='$ensinoMedio',ensinoSuperior='$ensinoSuperior' WHERE id_usuario = $id_usuario" 
            : "INSERT INTO usuario (nome,sobrenome,email,senha,nascimento,sexo,cidade,estado,ensinoMedio,ensinoSuperior) VALUES ('$nome','$sobrenome','$email','$senha','$nascimento','$sexo','$cidade','$estado','$ensinoMedio','$ensinoSuperior')";

    $result = mysql_query($sql, $database);
    if ($result) {
        header('Location: ../index.php?message=1');
        exit;
    } else {
        header('Location: ../index.php?pagina=form&message=2');
        exit;
    }
} else {
    header('Location: ../index.php?pagina=form&message=5');
    exit;
}
?>