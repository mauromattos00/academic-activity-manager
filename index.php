<?php
session_start();
include 'php/connection.php';
include 'php/function.php';
?>


<html lang="pt-br">
    <head>
        <title>PROJETO</title>
        <link rel="stylesheet" type="text/css" href="css/fontello.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </head>

    <body>

        <ul id="menu">
            <li>
                <a href="index.php" class="icon-home"></a>
            </li>

            <?php if (taLogado()): ?>
                <li>
                    <a href="#" title="Opções do Usuário" class="submenu"> <span class="icon-cog"></span> <?php echo $_SESSION['nome'] ?></a>
                    <ul>
                        <li>
                            <a href="index.php?pagina=form&id_usuario=<?php echo $_SESSION['id_usuario'] ?>" title="Editar minha conta">Editar Conta</a>
                        </li>
                        <li>
                            <a href="php/logout.php" title="Sair da Minha Sessão">Sair</a>
                        </li>
                    </ul>
                </li>                
            <?php else: ?>
                <li>
                    <a href="index.php?pagina=form">Cadastre-se</a>
                </li>
                <li>
                    <a href="#" title="Logar no site" id="formLogin">Login</a>
                    <form action="php/login.php" method="post">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email" />

                        <label for="senha">Senha</label>
                        <input type="password" maxlength="15" id="senha" name="senha" />

                        <div id="manterLogado">
                            <input type="checkbox" name="manterLogado" id="manterLogado" value="1" />
                            <label for="manterLogado">Manter logado</label>
                        </div>

                        <input type="submit" value="Entrar" />
                    </form>
                </li>
            </ul>
        <?php endif; ?>

        <div class="lateral">

        </div>

        <div class="conteudoPrincipal">

            <?php
            if (isset($_GET['message'])) {
                switch ($_GET['message']) {
                    case 1:
                        echo "Concluído!";
                        break;
                    case 2:
                        echo '<p>Ocorreu um erro ao conectar com o banco de dados. Tente novamente.</p>';
                        break;
                }
            }
            ?>
            <?php
            if (isset($_GET['pagina'])) {
                include 'php/' . $_GET['pagina'] . '.php';
            }
            ?>

        </div>


    </body>

</html>