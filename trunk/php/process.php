<?php

include'connection.php';

$nome = isset($_POST['nome']) && $_POST['nome'] ? trim($_POST['nome']) : null;
$sobrenome = isset($_POST['sobrenome']) && $_POST['sobrenome'] ? trim($_POST['sobrenome']) : null;
$email = isset($_POST['email']) && $_POST['email'] ? trim($_POST['email']) : null;
$senha = isset($_POST['senha']) && $_POST['senha'] ? trim($_POST['senha']) : null;
$confirmarSenha = isset($_POST['confirmarSenha']) && $_POST['confirmarSenha'] ? trim($_POST['confirmarSenha']) : null;

if ($senha <> $confirmarSenha) {
    header('Location: ../index.php?pagina=form&message=3');
    exit;
}

if ($nome && $sobrenome && $email && $senha) {
    $sql = (isset($_GET['id_usuario']) && ($id_usuario = $_GET['id_usuario']))
            ? "UPDATE usuario SET nome='$nome', sobrenome='$sobrenome', email='$email',senha=MD5('$senha') WHERE id_usuario = $id_usuario"
            : "INSERT INTO usuario (nome, sobrenome, email, senha) VALUES ('$nome', '$sobrenome', '$email', '$senha')";
    
    $result = mysql_query($sql, $database);

    if ($result) {
        header('Location: ../index.php?message=1');
        exit;
    } else {
        header('Location: ../index.php?pagina=form&message=2');
        exit;
    }
} else {
    header('Location: ../index.php?pagina=form&message=1');
    exit;
}
?>

