<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo "<p class='sucesso'>Tarefa adicionada com sucesso</p>";
            break;
    }
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql3 = "SELECT *, nome AS nomeTrabalho
            FROM trabalho
            WHERE id_usuario = $id_usuario";
    $result3 = mysql_query($sql3);
    $row3 = mysql_fetch_assoc($result3);
}

if (isset($_GET['id_trabalho'])) {
    $sql = "SELECT *
            FROM tarefa
            WHERE id_trabalho = '{$_GET['id_trabalho']}'
            ORDER BY id_fase";
    $result = mysql_query($sql);
}

$sql2 = "SELECT * FROM fase";
$result2 = mysql_query($sql2, $database);

$fases = array();
while ($row = mysql_fetch_assoc($result2)) {
    $fases[$row['id_fase']] = $row['nome'];
}
?>

<h1>TAREFAS - <?php echo $row3['nome'] ?></h1>
<a href="index.php?pagina=formTarefa&id_trabalho=<?php echo $_GET['id_trabalho'] ?>">Nova Tarefa</a>

<table>
    <tr>
        <th>Nome da Tarefa</th>
        <th>Descrição da Tarefa</th>
        <th>Fase</th>
    </tr>
    <?php while ($row = mysql_fetch_assoc($result)): ?>
        <tr>
            <td>
                <?php echo $row['nome'] ?>
            </td>
            <td>
                <?php echo $row['descricao_tarefa'] ?>
            </td>
            <td>
                <form id="form<?php echo $row['id_tarefa'] ?>" action="php/mudarFaseTarefa.php?id_tarefa=<?php echo $row['id_tarefa'] ?>" method="post">
                    <select name="fase" id="fase" onChange="$('#form<?php echo $row['id_tarefa'] ?>').submit()">

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