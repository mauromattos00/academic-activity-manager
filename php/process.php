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
//Recolhe informações inseridas pelo usuário no formulário de cadastro

if ($nome && $sobrenome && $email && $senha && $nascimento && $sexo && $estado && $cidade && $ensinoMedio && $ensinoSuperior){
    
    $sql = (isset($_GET['id_usuario']) && ($id_usuario = $_GET['id_usuario']))
            ? "UPDATE usuario SET nome='$nome',sobrenome='$sobrenome',email='$email',nascimento='$nascimento',senha='$senha',sexo='$sexo',cidade='$cidade',estado='$estado',ensinoMedio='$ensinoMedio',ensinoSuperior='$ensinoSuperior' WHERE id_usuario = $id_usuario" 
            : "INSERT INTO usuario (nome,sobrenome,email,senha,nascimento,sexo,cidade,estado,ensinoMedio,ensinoSuperior) VALUES ('$nome','$sobrenome','$email','$senha','$nascimento','$sexo','$cidade','$estado','$ensinoMedio','$ensinoSuperior')";
/*
    1 - Verifica se todos os campos do formulário estão preenchidos
    2 - Se o usuário já tiver um ID no banco de dados, atualizar seus com as novas informações inseridas, senão, introduz novos dados a um novo ID
    3 - Se os teste funcionarem, atribui o processo à variável $sql
*/

    $result = mysql_query($sql, $database);
//Executa o comando correspondente a variavel $sql e efetua o login no phpMyAdmin com a variável $database

    if ($result) {
        header('Location: ../index.php?pagina=home&message=1');
        exit;
        // Se a conexão com o phpMyAdmin for bem sucedida e os dados forem adicionados com sucesso, encaminha o usuario para a pagina home e exibir a mensagem de sucesso
    } else {
        header('Location: ../index.php?pagina=form&message=4');
        exit;
        // Se os dados não forem inseridos ou a conexão com o bando de dados não acontecer, encaminhar o usuario para a pagina form e exibe a mensagem de erro
    }
} else {
    header('Location: ../index.php?pagina=form&message=3');
    exit;
    // Se algum dos campos não tiver nada inserido, encaminhar à pagina form e exibir a mensagem de que todos os dados devem ser inseridos
}
?>