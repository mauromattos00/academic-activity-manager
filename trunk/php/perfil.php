<?php
if (isset($_GET['id_usuario']) && ($id_usuario = $_GET['id_usuario'])) {
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql, $database);

    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_assoc($result);
        $nome = $row['nome'];
        $sobrenome = $row['sobrenome'];
        $email = $row['email'];
        $nascimento = $row['nascimento'];
        $sexo = $row['sexo'];
        $estado = $row['estado'];
        $cidade = $row['cidade'];
        $ensinoMedio = $row['ensinoMedio'];
        $ensinoSuperior = $row['ensinoSuperior'];
    }
}
?>

<html>
    <h1>Meu perfil</h1>
    
    <img src="img/perfil.jpg" height="200" width="150">

    <p>
        <?php echo $nome . " " . $sobrenome ?>
    </p>    
    <p>
       Moro em <?php echo $cidade ?>
    </p>    
    <p>
        <?php echo $estado ?>
    </p>
    <p>
        Sexo <?php echo $sexo ?>
    </p>
    <p>
        Estudou na instituição <?php echo $ensinoMedio ?>
    </p>
    <p>
        Estudou na instituição <?php echo $ensinoSuperior ?>
    </p>
    
    <input type="button" id="add" value="Adicionar Amigo" />
</html>


