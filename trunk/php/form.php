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
    <input type="text" name="nome" id="nome" value="<?php echo isset($nome) ? $nome : '' ?>" />

    <label for="sobrenome">Sobrenome</label>
    <input type="text" id="sobrenome" value="<?php echo isset($sobrenome) ? $sobrenome : '' ?>" />

    <label for="email">E-mail</label>
    <input type="text"  name="email" id="email" value="<?php echo isset($email) ? $email : '' ?>" />

    <?php if (!taLogado()): ?>
        <label for="nascimento">Data de nascimento</label>
        <span>Dia</span>
        <select>
            <?php
            for ($i = 1; $i <= 31; $i++) {
                print '"<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
        <span>Mês</span>
        <select>
            <?php
            $mes = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro");
            for ($i = 0; $i <= 12; $i++) {
                print '"<option value="' . $i . '">' . $mes[$i] . '</option>';
            }
            ?>
        </select>

        <span>Ano</span>            
        <select>
            <?php
            $a = date("Y");
            for ($i = $a - 110; $i < $a; $i++) {
                print '"<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>


        <label for="sexo">Sexo</label>
        <select>
            <option value="">Selecionar</option>
            <option value="feminino">Feminino</option>
            <option value="Masculino">Masculino</option>        
        </select>
    <?php endif; ?>

    <label for="estado">Estado</label>
    <input type="text" id="estado" name="estado" value="<?php echo isset($estado) ? $estado : '' ?>"/>

    <label for="cidade">Cidade</label>
    <input type="cidade"  id="cidade" name="cidade" value="<?php echo isset($cidade) ? $cidade : '' ?>"/>

    <label for="ensinoMedio">Ensino Médio</label>
    <input type="text"  id="ensinoMedio" name="ensinoMedio" value="<?php echo isset($ensinoMedio) ? $ensinoMedio : '' ?>"/>

    <label for="ensinoSuperior">Ensino Superior</label>
    <input type="text"  id="ensinoSuperior" name="ensinoSuperior" value="<?php echo isset($ensinoSuperior) ? $ensinoSuperior : '' ?>"/>

    <label for="Senha">Senha</label>
    <input type="password" maxlength="15" id="Senha" name="Senha" value="<?php echo isset($senha) ? $senha : '' ?>"/>

    <label for="confirmarSenha">Confirmar Senha</label>
    <input type="password"  maxlength="15" id="confirmarSenha" name="confirmarSenha" value="<?php echo isset($senha) ? $senha : '' ?>"/>

    <input type="submit" id="submit" value="Salvar" /><br>

    <a href="index.php" title="Cancelar">Cancelar</a>
</form>
