<?php
$sql = "SELECT * FROM trabalho WHERE id_disciplina = '{$_GET['id_disciplina']}'";
$result = mysql_query($sql, $database);


?>

<section>
    <h1>Trabalhos</h1>
    <?php while ($row = mysql_fetch_assoc($result)): ?>
        <p><a class="linklista" href='index.php?pagina=trabalho&id_trabalho=<?php echo $row['id_trabalho'] ?>'><?php echo $row['nome'] ?></a></p>
    <?php endwhile; ?>
</section>

<section>
    <h1>Tarefas</h1>
    <?php while ($row = mysql_fetch_assoc($result)): ?>
        <p><a class="linklista" href='index.php?pagina=tarefa&id_tarefa=<?php echo $row['id_tarefa'] ?>'><?php echo $row['nome'] ?></a></p>
    <?php endwhile; ?>
</section>