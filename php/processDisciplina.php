<?php

include'connection.php';

session_start();

$nomeDisciplina = isset($_POST['nomeDisciplina']) && $_POST['nomeDisciplina'] ? trim($_POST['nomeDisciplina']) : null;
$nomeProfessor = isset($_POST['nomeProfessor']) && $_POST['nomeProfessor'] ? trim($_POST['nomeProfessor']) : null;

if ($nomeDisciplina) {

    $consulta = "SELECT * FROM disciplina WHERE nome = '$nomeDisciplina'";
    $result = mysql_query($consulta, $database);

    if (mysql_num_rows($result) > 0) {
        header('Location: ../index.php?pagina=formDisciplina$message=3');
    }

    $sql = "INSERT INTO disciplina (nome, id_usuario) VALUES ('$nomeDisciplina', '{$_SESSION['id_usuario']}')";

    $result = mysql_query($sql, $database);
    
    if ($result) {
        $id_disciplina = mysql_insert_id($database);

        if ($nomeProfessor) {
            $sql = "INSERT INTO professor (nome, id_usuario) VALUES ('$nomeProfessor', '{$_SESSION['id_usuario']}')";
            $result = mysql_query($sql, $database);
            $id_professor = mysql_insert_id($database);

            $sql = "INSERT INTO disciplina_has_professor (id_disciplina, id_professor) VALUES ($id_disciplina, $id_professor)";
            $result = mysql_query($sql, $database);
            
            header('Location: ../index.php?pagina=listadedisciplinas&message=1');
            exit;
            }
        }
    } else {
        header('Location: ../index.php?pagina=formDisciplina&message=2');
        exit;
    }
?>