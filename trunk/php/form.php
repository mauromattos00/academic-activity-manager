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
        case 4:
            echo '<p>Concluído!</p>';
            break;
    }
}

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
        $senha = $row['senha'];
    }
}
?>

<?php if (isset($id_usuario)): ?>
    <h1>Editar Dados</h1>
<?php else: ?>
    <h1>Criar uma conta</h1>
<?php endif; ?>

<form action="php/process.php<?php echo isset($id_usuario) ? '?id_usuario=' . $id_usuario : '' ?>" method="POST">
    <label for="nome">Nome</label>
    <input type="text" id="nome" value="<?php echo isset($nome) ? $nome : '' ?>" />

    <label for="sobrenome">Sobrenome</label>
    <input type="text" id="sobrenome" value="<?php echo isset($sobrenome) ? $sobrenome : '' ?>" />

    <label for="email">E-mail</label>
    <input type="text" id="email" value="<?php echo isset($email) ? $email : '' ?>" />

    <label for="nascimento">Data de nascimento (dd/mm/aaaa)</label>
    <input type="text" id="nascimento" value="<?php echo isset($nascimento) ? $nascimento : '' ?>" />

    <label for="sexo">Sexo</label>
    <input type="text" id="sexo" value="<?php echo isset($sexo) ? $sexo : '' ?>" />

    <label for="estado">Estado</label>
    <input type="text" id="estado" value="<?php echo isset($estado) ? $estado : '' ?>"/>

    <label for="cidade">Cidade</label>
    <input type="text"  id="cidade" value="<?php echo isset($cidade) ? $cidade : '' ?>"/>

    <label for="Senha">Senha</label>
    <input type="password" maxlength="15" id="senha" value="<?php echo isset($senha) ? $senha : '' ?>"/>

    <input type="submit" id="submit" value="Salvar" /><br>
</form>
