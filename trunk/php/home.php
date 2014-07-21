<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo "<p class='sucesso'>Dados salvos com sucesso</p>";
            break;
    }
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT t.id_trabalho, t.nome AS nomeTrabalho, d.* 
            FROM trabalho t 
            JOIN disciplina d ON t.id_disciplina = d.id_disciplina 
            WHERE t.id_usuario = $id_usuario
            ORDER BY t.nome";
    $result = mysql_query($sql);
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql2 = "SELECT *
            FROM disciplina
            WHERE id_usuario = $id_usuario";
    $result2 = mysql_query($sql2);
}
?>

<div id="trabalhos">
    <h1>TRABALHOS</h1>

    <table>
        <?php while ($row = mysql_fetch_assoc($result)): ?>
            <tr>
                <td><a class="linklista" href='index.php?pagina=trabalho&id_trabalho=<?php echo $row['id_trabalho'] ?>'><?php echo $row['nomeTrabalho'] ?></a></td>
                <td><a class="linklista" href='index.php?pagina=disciplina&id_disciplina=<?php echo $row['id_disciplina'] ?>'><?php echo $row['nome'] ?></a></td>
            <tr>
            <?php endwhile; ?>
    </table>


</div>
<div id="disciplinas">
    <h1>DISCIPLINAS</h1>
            <?php while ($row2 = mysql_fetch_assoc($result2)): ?>
                <a class="linklista" href='index.php?pagina=disciplina&id_disciplina=<?php echo $row2['id_disciplina'] ?>'><?php echo $row2['nome'] ?></a></br>
                <?php endwhile; ?>
            </div>
