<?php

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
}
?>

<?php while ($row = mysql_fetch_assoc($result)): ?>
    <p><a href='index.php?pagina=disciplina&id_disc="<?php echo $row['id_disciplina'] ?>"'>"<?php $row['nome'] ?>"</a></p>";
<?php endwhile; ?>



<a href="index.php?pagina=formDisciplina">Adicionar Disciplina</a>