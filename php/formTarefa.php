<?php

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo "<p class='erro'>O nome desta tarefa já existe</p>";
            break;
        case 2:
            echo "<p class='erro'>Ocorreu um erro ao cadastrar a tarefa, tente novamente</p>";
            break;
    }
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT * 
            FROM trabalho
            WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql, $database);
}

    $sql2= "SELECT * FROM fase";
    $result2 = mysql_query($sql2, $database);
    
?>

<form action="php/processTarefa.php?id_trabalho=<?php echo $_GET['id_trabalho']?>" method="POST">

    <label for="nome">Nome da Tarefa</label>
    <input type="text" name="nome" id="nome" />

    <label for="descricao_tarefa">Detalhes da Tarefa</label>
    <input type="text" name="descricao_tarefa" id="descricao_tarefa" />
    
    
    <label>Fase do Trabalho</label>
    <select name="fase" id="fase">        
        <?php while ($row = mysql_fetch_assoc($result2)): ?>
            <option  value="<?php echo $row['id_fase'] ?>"><?php echo $row['nome'] ?></option>
        <?php endwhile; ?>
    </select>
    
    <input type="submit" name="submit" id="sumbit" value="Salvar" />
</form>