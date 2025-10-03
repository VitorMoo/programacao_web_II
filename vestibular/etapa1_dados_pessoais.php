<?php
require_once 'config.php';
verificarLogin();

$dados_inscricao = obterDadosInscricao();
$dados_pessoais = $dados_inscricao['dados_pessoais'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novos_dados = array(
        'nome_completo' => trim($_POST['nome_completo'] ?? ''),
        'cpf' => trim($_POST['cpf'] ?? ''),
        'rg' => trim($_POST['rg'] ?? ''),
        'data_nascimento' => trim($_POST['data_nascimento'] ?? ''),
        'sexo' => trim($_POST['sexo'] ?? ''),
        'telefone' => trim($_POST['telefone'] ?? ''),
        'email' => trim($_POST['email'] ?? '')
    );

    atualizarSecao('dados_pessoais', $novos_dados);
    header('Location: etapa2_endereco.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etapa 1 - Dados Pessoais</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 18px;
        }
        .progress {
            margin: 20px 0;
        }
        .step {
            display: inline-block;
            padding: 5px 10px;
            margin-right: 5px;
            border: 1px solid black;
        }
        .step.active {
            background: black;
            color: white;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 5px;
            margin-top: 3px;
        }
        button {
            padding: 8px 15px;
            margin-top: 15px;
        }
        .logout {
            text-align: right;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Inscrição Vestibular - <?= htmlspecialchars($_SESSION['nome_usuario']) ?></h1>

    <div class="logout">
        <a href="resumo.php">Resumo</a> | <a href="logout.php">Sair</a>
    </div>

    <div class="progress">
        <span class="step active">1. Dados Pessoais</span>
        <span class="step">2. Endereço</span>
        <span class="step">3. Cursos</span>
    </div>

    <h2>Etapa 1 - Dados Pessoais</h2>

    <form method="POST">
        <label>Nome Completo *</label>
        <input type="text" name="nome_completo" value="<?= htmlspecialchars($dados_pessoais['nome_completo'] ?? '') ?>" required>

        <label>CPF *</label>
        <input type="text" name="cpf" value="<?= htmlspecialchars($dados_pessoais['cpf'] ?? '') ?>" required>

        <label>RG *</label>
        <input type="text" name="rg" value="<?= htmlspecialchars($dados_pessoais['rg'] ?? '') ?>" required>

        <label>Data de Nascimento *</label>
        <input type="date" name="data_nascimento" value="<?= htmlspecialchars($dados_pessoais['data_nascimento'] ?? '') ?>" required>

        <label>Sexo *</label>
        <select name="sexo" required>
            <option value="">Selecione</option>
            <option value="M" <?= (($dados_pessoais['sexo'] ?? '') == 'M') ? 'selected' : '' ?>>Masculino</option>
            <option value="F" <?= (($dados_pessoais['sexo'] ?? '') == 'F') ? 'selected' : '' ?>>Feminino</option>
            <option value="O" <?= (($dados_pessoais['sexo'] ?? '') == 'O') ? 'selected' : '' ?>>Outro</option>
        </select>

        <label>Telefone *</label>
        <input type="text" name="telefone" value="<?= htmlspecialchars($dados_pessoais['telefone'] ?? '') ?>" required>

        <label>E-mail *</label>
        <input type="email" name="email" value="<?= htmlspecialchars($dados_pessoais['email'] ?? '') ?>" required>

        <button type="submit">Próxima Etapa</button>
    </form>
</body>
</html>
