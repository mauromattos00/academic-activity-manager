<?php

function taLogado() {
	if (isset($_COOKIE['manterLogado']))
		$_SESSION['email'] = $_COOKIE['email'];
		
	return isset($_SESSION['email']) && $_SESSION['email'] ? true : false;
}

?>
