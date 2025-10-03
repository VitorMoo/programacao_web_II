<?php
require_once 'config.php';
verificarLogin();

$dados_inscricao = obterDadosInscricao();
$endereco = $dados_inscricao['endereco'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novos_dados = array(
        'cep' => trim($_POST['cep'] ?? ''),
        'rua' => trim($_POST['rua'] ?? ''),
        'numero' => trim($_POST['numero'] ?? ''),
        'complemento' => trim($_POST['complemento'] ?? ''),
        'bairro' => trim($_POST['bairro'] ?? ''),
        'cidade' => trim($_POST['cidade'] ?? ''),
        'estado' => trim($_POST['estado'] ?? '')
    );

    atualizarSecao('endereco', $novos_dados);
    header('Location: etapa3_cursos.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etapa 2 - Endereço</title>
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
        .step.completed {
            background: gray;
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
        button, .btn {
            padding: 8px 15px;
            margin-top: 15px;
            text-decoration: none;
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
        <span class="step completed">1. Dados Pessoais</span>
        <span class="step active">2. Endereço</span>
        <span class="step">3. Cursos</span>
    </div>

    <h2>Etapa 2 - Endereço</h2>

    <form method="POST">
        <label>CEP *</label>
        <input type="text" name="cep" value="<?= htmlspecialchars($endereco['cep'] ?? '') ?>" required>

        <label>Estado *</label>
        <select name="estado" required>
            <option value="">Selecione</option>
            <option value="SP" <?= (($endereco['estado'] ?? '') == 'SP') ? 'selected' : '' ?>>São Paulo</option>
            <option value="RJ" <?= (($endereco['estado'] ?? '') == 'RJ') ? 'selected' : '' ?>>Rio de Janeiro</option>
            <option value="MG" <?= (($endereco['estado'] ?? '') == 'MG') ? 'selected' : '' ?>>Minas Gerais</option>
            <option value="PR" <?= (($endereco['estado'] ?? '') == 'PR') ? 'selected' : '' ?>>Paraná</option>
            <option value="SC" <?= (($endereco['estado'] ?? '') == 'SC') ? 'selected' : '' ?>>Santa Catarina</option>
            <option value="RS" <?= (($endereco['estado'] ?? '') == 'RS') ? 'selected' : '' ?>>Rio Grande do Sul</option>
        </select>

        <label>Rua/Avenida *</label>
        <input type="text" name="rua" value="<?= htmlspecialchars($endereco['rua'] ?? '') ?>" required>

        <label>Número *</label>
        <input type="text" name="numero" value="<?= htmlspecialchars($endereco['numero'] ?? '') ?>" required>

        <label>Complemento</label>
        <input type="text" name="complemento" value="<?= htmlspecialchars($endereco['complemento'] ?? '') ?>">

        <label>Bairro *</label>
        <input type="text" name="bairro" value="<?= htmlspecialchars($endereco['bairro'] ?? '') ?>" required>

        <label>Cidade *</label>
        <input type="text" name="cidade" value="<?= htmlspecialchars($endereco['cidade'] ?? '') ?>" required>

        <a href="etapa1_dados_pessoais.php" class="btn">Voltar</a>
        <button type="submit">Próxima Etapa</button>
    </form>
</body>
</html>
