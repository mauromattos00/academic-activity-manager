<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 3:
            echo '<p class="erro">Todos os campos devem ser preenchidos!</p>';
            break;
        case 4:
            echo '<p class="erro">Ocorreu um problema ao salvar os dados. Por favor, tente novamente.</p>';
            break;
    }
}

if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
    $sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
    $result = mysql_query($sql, $database);

    if (mysql_num_rows($result) == 1) {
        $row = mysql_fetch_assoc($result);
        $nome = $row['nome'];
        $sobrenome = $row['sobrenome'];
        $email = $row['email'];
        $senha = $row['senha'];
        $nascimento = $row['nascimento'];
        $sexo = $row['sexo'];
        $estado = $row['estado'];
        $cidade = $row['cidade'];
        $ensinoMedio = $row['ensinoMedio'];
        $ensinoSuperior = $row['ensinoSuperior'];
    }
}
?>

<section id="formulario">
    <?php if (isset($id_usuario)): ?>
        <h1>Editar Dados</h1>
    <?php else: ?>
        <h1>Criar uma conta</h1>
    <?php endif; ?>

    <section id="formEsquerda">
        <form id="form" action="php/process.php<?php echo isset($id_usuario) ? '?id_usuario=' . $id_usuario : '' ?>" method="POST">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo isset($nome) ? $nome : '' ?>" />

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" value="<?php echo isset($sobrenome) ? $sobrenome : '' ?>" />

            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" value="<?php echo isset($email) ? $email : '' ?>" />

            <label for="Senha">Senha</label>
            <input type="password" maxlength="15" name="senha" id="senha" value="<?php echo isset($senha) ? $senha : '' ?>"/>

            <label for="nascimento">Data de nascimento (dd/mm/aaaa)</label>
            <input type="text" name="nascimento" id="nascimento" value="<?php echo isset($nascimento) ? $nascimento : '' ?>" />
    </section>

    <section id="formDireita">
        <label for="sexo">Sexo</label>
         
        <select name="sexo" id="sexo">
        <option  value="Masculino">Masculino</option>
        <option  value="Feminino">Feminino</option>
        </select>

        <label for="estado">Estado</label>
        <input type="text" name="estado" id="estado" value="<?php echo isset($estado) ? $estado : '' ?>"/>

        <label for="cidade">Cidade</label>
        <input type="text" name="cidade"  id="cidade" value="<?php echo isset($cidade) ? $cidade : '' ?>"/>

        <label for="ensinoMedio">Ensino Médio</label>
        <input type="text" name="ensinoMedio"  id="ensinoMedio" value="<?php echo isset($ensinoMedio) ? $ensinoMedio : '' ?>"/>

        <label for="ensinoSuperior">Ensino Superior</label>
        <input type="text" name="ensinoSuperior"  id="ensinoSuperior" value="<?php echo isset($ensinoSuperior) ? $ensinoSuperior : '' ?>"/>
    </section>
</section>
<div class="botoes">
    <input type="submit" id="submit" value="Salvar" /><br>
</div>
</form>
