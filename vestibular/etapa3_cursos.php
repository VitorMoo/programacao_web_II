<?php
require_once 'config.php';
verificarLogin();

$dados_inscricao = obterDadosInscricao();
$cursos = $dados_inscricao['cursos'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novos_dados = array(
        'opcao1' => trim($_POST['opcao1'] ?? ''),
        'opcao2' => trim($_POST['opcao2'] ?? ''),
        'opcao3' => trim($_POST['opcao3'] ?? '')
    );

    if ($novos_dados['opcao1'] === $novos_dados['opcao2'] ||
        $novos_dados['opcao1'] === $novos_dados['opcao3'] ||
        $novos_dados['opcao2'] === $novos_dados['opcao3']) {
        $erro = 'As três opções de curso devem ser diferentes!';
    } else {
        atualizarSecao('cursos', $novos_dados);
        header('Location: resumo.php?inscricao_completa=1');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etapa 3 - Escolha de Cursos</title>
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
        .erro {
            color: red;
            border: 1px solid red;
            padding: 5px;
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        select {
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
        <span class="step completed">2. Endereço</span>
        <span class="step active">3. Cursos</span>
    </div>

    <h2>Etapa 3 - Escolha de Cursos</h2>

    <p>Escolha 3 opções de cursos diferentes.</p>

    <?php if (isset($erro)): ?>
        <div class="erro"><?= htmlspecialchars($erro) ?></div>
    <?php endif; ?>

    <form method="POST">
        <label>1ª Opção de Curso *</label>
        <select name="opcao1" required>
            <option value="">Selecione</option>
            <?php foreach ($cursos_disponiveis as $curso): ?>
                <option value="<?= htmlspecialchars($curso) ?>" <?= (($cursos['opcao1'] ?? '') == $curso) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($curso) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>2ª Opção de Curso *</label>
        <select name="opcao2" required>
            <option value="">Selecione</option>
            <?php foreach ($cursos_disponiveis as $curso): ?>
                <option value="<?= htmlspecialchars($curso) ?>" <?= (($cursos['opcao2'] ?? '') == $curso) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($curso) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>3ª Opção de Curso *</label>
        <select name="opcao3" required>
            <option value="">Selecione</option>
            <?php foreach ($cursos_disponiveis as $curso): ?>
                <option value="<?= htmlspecialchars($curso) ?>" <?= (($cursos['opcao3'] ?? '') == $curso) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($curso) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <a href="etapa2_endereco.php" class="btn">Voltar</a>
        <button type="submit">Finalizar Inscrição</button>
    </form>
</body>
</html>
