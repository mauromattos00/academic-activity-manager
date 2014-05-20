<?php
session_start();
session_destroy();
setcookie("manterLogado", "", time()-60*60, '/projeto/trunk/');
setcookie('email', "", time()-60*60, '/projeto/trunk/');
header('Location: ../index.php');
exit;
?>