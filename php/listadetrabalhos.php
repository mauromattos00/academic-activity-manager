<?php

if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo "<p class='sucesso'>Trabalho adicionado com sucesso.</p>";
            break;
    }
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT * FROM trabalho WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql);
}
?>

<?php while ($row = mysql_fetch_assoc($result)): ?>
    <p><a href='index.php?pagina=trabalho&id_trabalho=<?php echo $row['id_trabalho'] ?>'><?php echo $row['nome'] ?></a></p>
<?php endwhile; ?>



<a href="index.php?pagina=formTrabalho">Novo Trabalho</a>