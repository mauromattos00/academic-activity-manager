<?php
if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT * 
            FROM trabalho
            WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql, $database);
}
?>

<form action="php/processTarefa.php?id_trabalho=<?php echo $_GET['id_trabalho']?>" method="POST">

    <label for="nome">Nome da Tarefa</label>
    <input type="text" name="nomeTarefa" id="nomeTarefa" />

    <label for="descricao_tarefa">Detalhes da Tarefa</label>
    <input type="text" name="detalhesTarefa" id="detalhesTarefa" />
    
    <input type="submit" name="submit" id="sumbit" value="Salvar" />
</form>