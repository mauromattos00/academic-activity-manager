<?php
session_start();
session_destroy();
setcookie("manterLogado", "", time()-60*60, '/site/');
setcookie('email', "", time()-60*60, '/site/');
header('Location: ../index.php');
exit;
?>