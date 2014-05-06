<?php
session_start();
session_destroy();
setcookie("manterLogado", "", time() - 7200, '/site/');
setcookie('email', '', time() - 7200, '/site/');
header('Location: ../index.php');
exit;
?>