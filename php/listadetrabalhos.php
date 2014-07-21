<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo "<p class='sucesso'>Trabalho adicionado com sucesso.</p>";
            break;
        case 2:
            echo "<p class='erro'>Ocorreu um ao alterar a fase do trabalho.</p>";
            break;
        case 3:
            echo "<p class='sucesso'>Fase do trabalho alterada com sucesso.</p>";
            break;
    }
}

$sql = "SELECT * FROM fase";
$result = mysql_query($sql, $database);

$fases = array();
while ($row = mysql_fetch_assoc($result)) {
    $fases[$row['id_fase']] = $row['nome'];
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT t.*, d.nome AS nomeDisciplina, f.nome AS nomeFase 
            FROM trabalho t 
            JOIN disciplina d ON t.id_disciplina = d.id_disciplina 
            JOIN fase f ON t.id_fase = f.id_fase
            WHERE t.id_usuario = $id_usuario
            ORDER BY t.id_fase asc";
    $result = mysql_query($sql);
}
?>

<table>
    <tr>
        <th>Nome do Trabalho</th>
        <th>Disciplina</th>
        <th>Fase</th>
    </tr>
    <?php while ($row = mysql_fetch_assoc($result)): ?>
        <tr>
            <td><a class="linklista" href='index.php?pagina=trabalho&id_trabalho=<?php echo $row['id_trabalho'] ?>'><?php echo $row['nome'] ?></a></td>
            <td><a class="linklista" href='index.php?pagina=disciplina&id_disciplina=<?php echo $row['id_disciplina'] ?>'><?php echo $row['nomeDisciplina'] ?></a></td>
            <td>
                <form id="form<?php echo $row['id_trabalho'] ?>" action="php/mudarFase.php?id_trabalho=<?php echo $row['id_trabalho'] ?>" method="post">
                    <select name="fase" id="fase" onChange="$('#form<?php echo $row['id_trabalho'] ?>').submit()">

                        <?php foreach ($fases as $id_fase => $nome): ?>
                            <?php if ($id_fase == $row['id_fase']): ?>
                                <option  value="<?php echo $id_fase ?>" selected="selected"><?php echo $nome ?></option>
                            <?php else: ?>
                                <option  value="<?php echo $id_fase ?>"><?php echo $nome ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
</table>



<h3><a href="index.php?pagina=formTrabalho">Novo Trabalho</a></h3>