<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo "<p class='erro'>Erro ao conectar com o banco de dados.</p>";
            break;
        case 2:
            echo "<p class='erro'>Dê um nome à nova disciplina!</p>";
            break;
    }
}
?>

<form action="php/processDisciplina.php<?php echo isset($id_usuario) ? '?id_usuario=' . $id_usuario : '' ?>" method="POST">
    <label for="nomeDisciplina">Nome da disciplina</label>
    <input type="text" name="nomeDisciplina" id="nomeDisciplina" />

    <label for="nomeProfessor">Nome do(a) professor(a)</label>
    <input type="text" name="nomeProfessor" id="nomeProfessor" />

    <input type="submit" name="submit" id="sumbit" value="Salvar" />
</form>