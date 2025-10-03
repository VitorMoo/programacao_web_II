<?php
require_once 'config.php';

if (isset($_SESSION['usuario_logado'])) {
    header('Location: produtos.php');
    exit;
}

$erro = '';
if (isset($_SESSION['erro_login'])) {
    $erro = $_SESSION['erro_login'];
    unset($_SESSION['erro_login']);
}

$sucesso = '';
if (isset($_SESSION['mensagem_logout'])) {
    $sucesso = $_SESSION['mensagem_logout'];
    unset($_SESSION['mensagem_logout']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 50px;
        }
        .login-container {
            background: white;
            border: 1px solid #ccc;
            padding: 30px;
            width: 400px;
            margin: 0 auto;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo h1 {
            color: #333;
            font-size: 1.8em;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }
        .btn-login {
            width: 100%;
            padding: 10px;
            background: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-login:hover {
            background: #45a049;
        }
        .erro {
            background: #ffdddd;
            color: #d8000c;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #d8000c;
        }
        .sucesso {
            background: #ddffdd;
            color: #4CAF50;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #4CAF50;
        }
        .usuarios-teste {
            margin-top: 20px;
            padding: 15px;
            background: #f9f9f9;
            border: 1px solid #ddd;
        }
        .usuarios-teste h3 {
            margin-bottom: 10px;
            font-size: 0.9em;
        }
        .usuario-item {
            padding: 5px;
            margin: 5px 0;
            font-size: 0.85em;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <h1>Sistema de login</h1>
        </div>

        <?php if ($erro): ?>
            <div class="erro">
                <?= htmlspecialchars($erro) ?>
            </div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div class="sucesso">
                <?= htmlspecialchars($sucesso) ?>
            </div>
        <?php endif; ?>

        <form action="autenticar.php" method="POST">
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" id="usuario" name="usuario" required autofocus>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <button type="submit" class="btn-login">Entrar</button>
        </form>

        <div class="usuarios-teste">
            <h3>Usuários para teste:</h3>
            <div class="usuario-item">admin / admin123</div>
        </div>
    </div>
</body>
</html>
