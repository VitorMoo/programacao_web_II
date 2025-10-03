<?php
require_once 'config.php';

$_SESSION['mensagem_logout'] = 'Logout realizado com sucesso! Seu carrinho foi salvo.';

session_destroy();

header('Location: login.php');
exit;
?>
