<?php
require_once 'config.php';

if (isset($_SESSION['usuario_logado'])) {
    header('Location: etapa1_dados_pessoais.php');
    exit;
}

$erro = isset($_SESSION['erro_login']) ? $_SESSION['erro_login'] : '';
unset($_SESSION['erro_login']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Inscrição Vestibular</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .login-container {
            width: 300px;
            margin: 50px auto;
        }
        h1 {
            font-size: 18px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 5px;
            margin-top: 3px;
        }
        button {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
        }
        .erro {
            color: red;
            border: 1px solid red;
            padding: 5px;
            margin-bottom: 10px;
        }
        .usuarios-teste {
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Inscrição Vestibular</h1>

        <?php if ($erro): ?>
            <div class="erro"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>

        <form action="autenticar.php" method="POST">
            <label>Usuário</label>
            <input type="text" name="usuario" required>

            <label>Senha</label>
            <input type="password" name="senha" required>

            <button type="submit">Entrar</button>
        </form>

        <div class="usuarios-teste">
            <p><strong>Usuários:</strong></p>
            <p>vitor / vitor123</p>
        </div>
    </div>
</body>
</html>
