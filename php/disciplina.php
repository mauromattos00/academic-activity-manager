<?php
$sql = "SELECT *
        FROM trabalho t
        WHERE id_disciplina = '{$_GET['id_disciplina']}'";
$result = mysql_query($sql, $database);

$sqlNomeDisciplina = "SELECT *
                      FROM disciplina
                      WHERE id_disciplina = '{$_GET['id_disciplina']}'";
$result2 = mysql_query($sqlNomeDisciplina, $database); 
$row2 = mysql_fetch_assoc($result2);
?>

<h1><?php echo $row2['nome'] ?></h1>

<section>
    
    <h1>Trabalhos</h1>
<?php while ($row = mysql_fetch_assoc($result)): ?>
        <b><p><a class="linklista" href='index.php?pagina=trabalho&id_trabalho=<?php echo $row['id_trabalho'] ?>'><?php echo $row['nome'] ?></a></p></b>
<?php endwhile; ?>
        
    <h3><a href="index.php?pagina=formTrabalho">Novo Trabalho</a></h3>
    
</section>

<section>
    
    <h1>Tarefas</h1>
<?php while ($row = mysql_fetch_assoc($result)): ?>
        <b><p><a class="linklista" href='index.php?pagina=tarefa&id_tarefa=<?php echo $row['id_tarefa'] ?>'><?php echo $row['nome'] ?></a></p></b>
<?php endwhile; ?>
        
    <h3><a href="index.php?pagina=formTarefa">Nova Tarefa</a></h3>
    
</section>