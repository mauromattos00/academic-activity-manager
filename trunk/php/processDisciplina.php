<?php
include'connection.php';

$nomeDisciplina = isset($_POST['nomeDisciplina']) && $_POST['nomeDisciplina'] ? trim($_POST['nomeDisciplina']) : null;
$nomeProfessor = isset($_POST['nomeProfessor']) && $_POST['nomeProfessor'] ? trim($_POST['nomeProfessor']) : null;

if($nomeDisciplina){
    $sql = (isset($_GET['id_usuario']) && ($id_usuario = $_GET['id_usuario']))
    ? "UPDATE disciplina set nome='$nomeDisciplina' WHERE id_usuario = $id_usuario"
    : "INSERT INTO disciplina (nome) VALUES ('$nomeDisciplina')";
    
    $result = mysql_query($sql, $database);    
    if ($result) {
        header('Location: ../index.php?pagina=formDisciplina&message=1');
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