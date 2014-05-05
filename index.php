<?php
session_start();
include 'php/connection.php';
include 'php/function.php';
?>

<?php
if (isset($_GET['message'])) {
    switch ($_GET['message']) {
        case 1:
            echo '<p>Concluído!</p>';
            break;

        case 2:
            echo '<p>Ocorreu um problema ao conectar com o banco de dados, tente novamente.</p>';
            break;
    }
}
?>

<html lang="pt-br">
    <head>
        <title>PROJETO</title>
        <link rel="stylesheet" type="text/css" href="css/trontastic/jquery-ui-1.10.4.custom.min.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </head>

    <body>
        
        <ul id="menu">
            <li>
                <a href="index.php">Inicio</a>
            </li>

            <?php if (taLogado()): ?>
                <li>
                    <a href="index.php?pagina=lista" title="Pessoas cadastradas">Pessoas cadastradas</a>
                </li>
                <li>
                    <a href="index.php?pagina=form" title="Nova pessoa">Nova pessoa</a>
                </li>
            <?php endif; ?>

            <?php if (taLogado()): ?>
                <li>
                    <a href="#" title="Opções do usuário" class="submenu"><?php echo $_SESSION['email'] ?>)</a>
                    <ul>
                        <li>
                            <a href="php/logout.php" title="Logar no site">Sair</a>
                        </li>
                    </ul>
                </li>                
            <?php else: ?>
                <li>
                    <a href="#" title="Logar no site" id="formLogin">Login</a>
                    <form action="php/login.php" method="post">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" />

                        <label for="senha">Senha</label>
                        <input type="password" name="senha" />

                        <div id="manterLogado">
                            <input type="checkbox" name="manterLogado" id="manterLogado" value="1" />
                            <label for="manterLogado">Manter logado</label>
                        </div>

                        <input type="submit" value="Login" />
                    </form>
                </li>
            <?php endif; ?>
        </ul>

    </body>

</html>