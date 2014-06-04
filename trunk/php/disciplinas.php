<?php
include'connection.php';

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql, $database);

    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_assoc($result);
        $id_usuario = $row['id_usuario'];
    }
}
?>

<html>
    <a href="index.php?pagina=formDisciplina&id_usuario=<?php echo $_SESSION['id_usuario'] ?>">Adicionar Disciplina</a>
</html>