<?php

include'connection.php';

session_start();

$DiaDaSemana = isset($_POST['DiaDaSemana']) && $_POST['DiaDaSemana'] ? trim($_POST['DiaDaSemana']) : null;
$hora_inicio = isset($_POST['hora_inicio']) ? trim($_POST['hora_inicio']) : null;
$minuto_inicio = isset($_POST['minuto_inicio']) ? trim($_POST['minuto_inicio']) : null;
$hora_fim = isset($_POST['hora_fim']) ? trim($_POST['hora_fim']) : null;
$minuto_fim = isset($_POST['minuto_fim']) ? trim($_POST['minuto_fim']) : null;
$disciplina = isset($_POST['disciplina']) && $_POST['disciplina'] ? trim($_POST['disciplina']) : null;
$professor = isset($_POST['professor']) && $_POST['professor'] ? trim($_POST['professor']) : null;

if ($DiaDaSemana && $disciplina && $professor) {
    $sql = "INSERT INTO horario (id_DiadaSemana, id_usuario, hora_inicio, minuto_inicio, hora_fim, minuto_fim, id_disciplina, id_professor)
            VALUES ('$DiaDaSemana', '{$_SESSION['id_usuario']}', '$hora_inicio', '$minuto_inicio', '$hora_fim', '$minuto_fim', '$disciplina', '$professor')";

    $result = mysql_query($sql, $database);

    header("Location: ../index.php?pagina=formHorario&message=1");
} else {
    header("Location: ../index.php?pagina=formHorario&message=2");
    exit;
}
?>
