<?php
include'connection.php';

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo "<p class='sucesso'>Disciplina Adicionada com Sucesso.</p>";
            break;
    }
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT * FROM disciplina WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql);

    while ($row = mysql_fetch_assoc($result)) {
        echo "<p><a href='index.php?pagina=id_disc=" . $row['id_disciplina'] . "'>" . $row['nome'] . "</a></p>";
    }
}
?>



<a href="index.php?pagina=formDisciplina">Adicionar Disciplina</a>