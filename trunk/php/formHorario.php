<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo "<p class='sucesso'>Aula adicionada com sucesso!</p>";
            break;
        case 2:
            echo "<p class='erro'>Todos os campos devem ser preenchidos.</p>";
            break;
    }
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT * 
            FROM semana";
    $result = mysql_query($sql, $database);
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql2 = "SELECT *
            FROM disciplina
            WHERE id_usuario = $id_usuario";
    $result2 = mysql_query($sql2, $database);
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql3 = "SELECT *
            FROM professor
            WHERE id_usuario = $id_usuario";
    $result3 = mysql_query($sql3, $database);
}
?>

<h1>Formulário de Criação de Horário Semanal</h1>

<form action="php/processHorario.php?id_usuario=<?php echo $_SESSION['id_usuario'] ?>" method="post">

    <label>Dia da Semana</label>
    <select name="DiaDaSemana" id="DiaDaSemana">
        <?php while ($row = mysql_fetch_assoc($result)): ?>
            <option  value="<?php echo $row['id_DiadaSemana'] ?>"><?php echo $row['nome'] ?></option>
        <?php endwhile; ?>
    </select>

    </br>

    <label for="hora_inicio">Início da Aula</label>
    <select name="hora_inicio" id="hora_inicio">
        <?php for ($i = 0; $i <= 23; $i++): ?>
            <option  value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php endfor; ?>
    </select>
    
    <select name="minuto_inicio" id="minuto_inicio">
        <?php for ($i = 0; $i <= 59; $i++): ?>
            <option  value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php endfor; ?>
    </select>

    <label for="hora_fim">Fim da Aula</label>
     <select name="hora_fim" id="hora_fim">
        <?php for ($i = 0; $i <= 23; $i++): ?>
            <option  value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php endfor; ?>
    </select>
    
    <select name="minuto_fim" id="minuto_fim">
        <?php for ($i = 0; $i <= 59; $i++): ?>
            <option  value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php endfor; ?>
    </select>

    <label for="disciplina">Diciplina</label>
    <select name="disciplina" id="disciplina">
        <?php while ($row2 = mysql_fetch_assoc($result2)): ?>
            <option  value="<?php echo $row2['id_disciplina'] ?>"><?php echo $row2['nome'] ?></option>
        <?php endwhile; ?>
    </select>

    <label for="professor">Professor</label>
    <select name="professor" id="professor">
        <?php while ($row3 = mysql_fetch_assoc($result3)): ?>
            <option  value="<?php echo $row3['id_professor'] ?>"><?php echo $row3['nome'] ?></option>
        <?php endwhile; ?>
    </select>
    
    <input type="submit" name="submit" id="sumbit" value="Salvar" />
</form>