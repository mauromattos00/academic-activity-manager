<?php
session_start();
include 'php/connection.php';
include 'php/function.php';
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>ORGANIZE</title>
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
            // Se houver um ID usuario via session, consultar todos os dados referente àquele ID

            if (mysql_num_rows($result) == 1) {
                $row = mysql_fetch_assoc($result);
                $id_usuario = $row['id_usuario'];
                //Se o numero de linhas encontradas no banco de dados for igual 1, recolher os dados da linha e transformá-los e um vetor
            }
        }
        ?>
        <section id="barraTopo">
            <ul id="menu">
                <li>
                    <a href="index.php?pagina=home" class="icon-home"></a>
                </li>
                <?php if (taLogado()): ?>
                    <li>
                        <a href="index.php?pagina=horario" class="submenu">Horário</a>
                    </li>
                    <li>
                        <a href="#" class="submenu"><span class="icon-calendar-empty"></span>Calendário</a>
                    </li>
                    <li>
                        <a href="index.php?pagina=listadedisciplinas">Disciplinas</a>
                    </li>
                    <li>
                        <a href="index.php?pagina=listadetrabalhos">Trabalhos</a>
                    </li>
                    <li>
                        <a href="index.php?pagina=perfil"><span class="icon-user"></span> <?php echo $_SESSION['nome'] ?></a>
                    </li>
                    <li>
                        <a href="php/logout.php" title="Sair da Minha Sessão">Sair</a>
                    </li>
                    <!-- Se o usuário estiver logado, exibir esses links na barra de navegação -->
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
                    <!-- Se o usuário não estiver logado, exibir esses links na barra de navegação -->
                <?php endif; ?>
            </ul>
        </section>

        <div class="conteudoPrincipal">            
            <?php
            if (isset($_GET['pagina'])) {
                include 'php/' . $_GET['pagina'] . '.php';
            }
            ?>
            <iframe src="https://drive.google.com/embeddedfolderview?id=0B3Mie4L5IVH-VTFoc09VWEx1QUk#list" style="width:700px; height:600px; border:0;"></iframe>
        </div>
    </body>
</html>