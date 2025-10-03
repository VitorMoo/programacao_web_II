<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$usuario = trim($_POST['usuario'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (empty($usuario) || empty($senha)) {
    $_SESSION['erro_login'] = 'Por favor, preencha todos os campos.';
    header('Location: login.php');
    exit;
}

if (isset($usuarios[$usuario]) && $usuarios[$usuario]['senha'] === $senha) {
    $_SESSION['usuario_logado'] = $usuario;
    $_SESSION['nome_usuario'] = $usuarios[$usuario]['nome'];
    $_SESSION['email_usuario'] = $usuarios[$usuario]['email'];
    $_SESSION['login_timestamp'] = time();

    header('Location: produtos.php');
    exit;
} else {
    $_SESSION['erro_login'] = 'Usuário ou senha incorretos.';
    header('Location: login.php');
    exit;
}
?>
