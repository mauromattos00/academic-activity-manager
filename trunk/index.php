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

        <?php
        if (isset($_SESSION['id_usuario']) && ($id_usuario = $_SESSION['id_usuario'])) {
            $sql = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
            $result = mysql_query($sql, $database);

            if (mysql_num_rows($result) == 1) {
                $row = mysql_fetch_assoc($result);
                $id_usuario = $row['id_usuario'];
            }
        }
        ?>
        <section id="barraTopo">

            <ul id="menu">
                <li>
                    <a href="index.php" class="icon-home"></a>
                </li>

                <?php if (taLogado()): ?>
                    <li>
                        <a href="#" class="submenu">Meu Horário</a>
                    </li>
                    <li>
                        <a href="#" class="submenu"><span class="icon-calendar-empty"></span>Meu Calendário</a>
                        <ul>
                            <li>
                                <a href="#">Semanal</a>
                            </li>
                            <li>
                                <a href="#">Mensal</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?pagina=disciplinas">Minhas disciplinas</a>
                    </li>

                    </li>
                    <li>
                        <a href="#">Meus Trabalhos</a>
                    </li>
                    <li>
                        <a href="#" class="submenu"><span class="icon-user"></span> <?php echo $_SESSION['nome'] ?></a>
                        <ul>
                            <li>
                                <a href="index.php?pagina=perfil" title="Mostrar meu perfil">Perfil</a>
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

                            <input type="submit" value="Entrar" >
                        </form>
                    </li>
                <?php endif; ?>
            </ul>

        </section>
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

        <ul id="menu"><li>Mauro Mattos</li></ul>
    </body>
</html>