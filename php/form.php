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
            <option value="">Selecionar</option>
            <option value="1">1</option>
            <option value="2">2</option>        
            <option value="3">3</option>
            <option value="4">4</option>        
            <option value="5">5</option>
            <option value="6">6</option>        
            <option value="7">7</option>
            <option value="8">8</option>        
            <option value="9">9</option>
            <option value="10">10</option>        
            <option value="11">11</option>
            <option value="12">12</option>        
            <option value="13">13</option>
            <option value="14">14</option>        
            <option value="15">15</option>
            <option value="16">16</option>        
            <option value="17">17</option>
            <option value="18">18</option>        
            <option value="19">19</option>
            <option value="20">20</option>        
            <option value="21">21</option>
            <option value="22">22</option>        
            <option value="23">23</option>
            <option value="24">24</option>        
            <option value="25">25</option>
            <option value="26">26</option>        
            <option value="27">27</option>
            <option value="28">28</option>        
            <option value="29">29</option>
            <option value="30">30</option>        
            <option value="31">31</option>        
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
