<?php

include'connection.php';

$nomeDisciplina = isset($_POST['nomeDisciplina']) && $_POST['nomeDisciplina'] ? trim($_POST['nomeDisciplina']) : null;
$nomeProfessor = isset($_POST['nomeProfessor']) && $_POST['nomeProfessor'] ? trim($_POST['nomeProfessor']) : null;

if($nomeProfessor){
    $sql = (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario']))
            ? "UPDATE professor set nome='$nomeProfessor' WHERE id_usuario = $id_usuario"
            : "INSERT INTO professor (nome, id_usuario) VALUES ('$nomeProfessor', '12')";
}

if ($nomeDisciplina) {
    
    $sql = (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario']))
            ? "UPDATE disciplina set nome='$nomeDisciplina' WHERE id_usuario = $id_usuario"
            : "INSERT INTO disciplina (nome, id_usuario) VALUES ('$nomeDisciplina', '12')";

    $result = mysql_query($sql, $database);

    if ($result) {
        header('Location: ../index.php?pagina=listadedisciplinas&message=1');
        exit;
    } else {
        header('Location: ../index.php?pagina=formDisciplina&message=2');
        exit;
    }
} else {
    header('Location: ../index.php?pagina=formDisciplina&message=3');
    exit;
}
?>