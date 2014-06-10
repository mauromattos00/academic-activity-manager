<?php
if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
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
    <section id="dados">
        <img src="img/perfil.jpg" height="200" width="150"> <br/>
        <ul id="imgPerfil2">
            <li>
                <a href="#" class="submenu"><p>Adicionar Imagem de Perfil</p></a>
                <ul id="imgPerfil">
                    <li>
                        <form action="php/imgProcess.php"<?php echo isset($id_usuario) ? '?id_usuario=' . $id_usuario : '' ?>" method="POST">
                            <input type="file" id="userImage">
                            <input type="Submit" id="submit" value="Enviar Imagem">
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
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
            Estudou na instituição <a href="#"><b><?php echo $ensinoMedio ?></b></a>
        </p>
        <p>
            Estudou na instituição <a href="#"><b><?php echo $ensinoSuperior ?></b></a>
        </p>
        
        <a href="index.php?pagina=form" title="Editar minha conta"><b>Editar Conta</b></a>
    </section>
    
</html>


