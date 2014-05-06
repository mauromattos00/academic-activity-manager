<?php
include 'connection.php';

$email = isset($_POST['email']) && $_POST['email'] ? trim($_POST['email']) : null;
$senha = isset($_POST['senha']) && $_POST['senha'] ? trim($_POST['senha']) : null;

if ($email && $senha) {
	$sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
	$result = mysql_query($sql, $database);
	if (mysql_num_rows($result) == 1) {
		session_start();
		$row = mysql_fetch_assoc($result);
		$_SESSION['email'] = $row['email'];
				
		if (isset($_POST['manterLogado']) && $_POST['manterLogado'] == '1') {
			setcookie('manterLogado', 1, time()+60*60, '/site/');
			setcookie('email', $row['email'], time()+60*60, '/site/');
		}
			
		header('Location: ../index.php');
		exit;
	} else {
		header('Location: ../index.php?pagina=formLogin&message=2');
		exit;
	}
} else {
    header('Location: ../index.php?pagina=formLogin&message=1');
    exit;
}
?>