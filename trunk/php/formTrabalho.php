<?php

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo "<p class='erro'>Dê um nome ao novo trabalho!</p>";
            break;
        case 2:
            echo "<p class='erro'>O nome desse trabalho já existe em sua lista.</p>";
            break;
    }
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT * FROM disciplina WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql, $database);
}


?>

<form action="php/processTrabalho.php<?php echo isset($id_usuario) ? '?id_usuario=' . $id_usuario : '' ?>" method="POST">
    <label for="nomeTrabalho">Nome do Trabalho</label>
    <input type="text" name="nomeTrabalho" id="nomeTrabalho" />

    <label for="disciplina">Disciplina</label>
    <select name="disciplina" id="disciplina">        
        <?php while ($row = mysql_fetch_assoc($result)): ?>
            <option  value="<?php echo $row['id_disciplina'] ?>"><?php echo $row['nome'] ?></option>
        <?php endwhile; ?>
    </select>
    
    <?php
    $sql= "SELECT * FROM fasedotrabalho";
    $result = mysql_query($sql, $database);
    ?>
    
    <label>Fase do Trabalho</label>
    <select name=faseTrabalho" id="faseTrabalho">        
        <?php while ($row = mysql_fetch_assoc($result)): ?>
            <option  value="<?php echo $row['id_fase'] ?>"><?php echo $row['nome'] ?></option>
        <?php endwhile; ?>
    </select>

    <input type="submit" name="submit" id="sumbit" value="Salvar" />
</form>
