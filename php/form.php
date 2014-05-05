<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo '<p>Todos os campos devem ser preenchidos!</p>';
            break;
        case 2:
            echo '<p>Ocorreu um problema ao salvar os dados. Por favor, tente novamente.</p>';
            break;
        case 3:
            echo '<p>Os campos SENHA e CONFIRMAR SENHA devem ser iguais, tente novamente.</p>';
            break;
    }
}

if (isset($_GET['id_usuario']) && ($id_usuario = $_GET['id_usuario'])) {
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql, $database);

    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_assoc($result);
        $nome = $row['nome'];
        $email = $row['email'];
    }
}
?>

<?php if (isset($id_usuario)): ?>
    <h1>Editar Conta <?php echo $nome ?></h1>
<?php else: ?>
    <h1>Nova Conta</h1>
<?php endif; ?>
<html>
    
    <head>
        <link rel="stylesheet" type="text/css" href="css/trontastic/jquery-ui-1.10.4.custom.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </head>
    
    <body>
        <form action="process.php<?php echo isset($id_usuario) ? '?id_usuario=' . $id_usuario : '' ?>" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="<?php echo isset($nome) ? $nome : '' ?>" />

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" value="<?php echo isset($sobrenome) ? $sobrenome : '' ?>" />

            <label for="email">E-mail</label>
            <input type="text" name="email" value="<?php echo isset($email) ? $email : '' ?>" />

            <label for="senha">Senha</label>
            <input type="password" maxlength="15" name="senha" value="<?php echo isset($senha) ? $senha : '' ?>"/>

            <label for="confirmarSenha">Confirmar Senha</label>
            <input type="password" maxlength="15" name="confirmarSenha" value="<?php echo isset($confirmarSenha) ? $confirmarSenha : '' ?>"/>

            <input type="submit" value="Salvar" />
            <a href="index.php" title="Cancelar">Cancelar</a>
        </form>
    </body>
</html>