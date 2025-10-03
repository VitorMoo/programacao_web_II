<?php
require_once 'config.php';
verificarLogin();

$dados_inscricao = obterDadosInscricao();
$completa = inscricaoCompleta($dados_inscricao);
$mensagem = isset($_GET['inscricao_completa']) ? 'Inscrição finalizada com sucesso!' : '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo da Inscrição</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2, h3 {
            font-size: 16px;
        }
        .sucesso {
            color: green;
            border: 1px solid green;
            padding: 10px;
            margin: 10px 0;
        }
        .alerta {
            color: orange;
            border: 1px solid orange;
            padding: 10px;
            margin: 10px 0;
        }
        .secao {
            border: 1px solid black;
            padding: 10px;
            margin: 20px 0;
        }
        .secao-header {
            border-bottom: 1px solid black;
            margin-bottom: 10px;
            padding-bottom: 5px;
        }
        .btn-editar {
            text-decoration: none;
            padding: 3px 8px;
            border: 1px solid black;
        }
        .dado-item {
            margin: 5px 0;
        }
        .dado-label {
            font-weight: bold;
            font-size: 12px;
        }
        button, .btn {
            padding: 8px 15px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>Inscrição Vestibular - <?= htmlspecialchars($_SESSION['nome_usuario']) ?></h1>

    <p><a href="logout.php">Sair</a></p>

    <?php if ($mensagem): ?>
        <div class="sucesso"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>

    <?php if (!$completa): ?>
        <div class="alerta">Sua inscrição está incompleta. Complete todas as etapas.</div>
    <?php endif; ?>

    <h2>Status: <?= $completa ? 'Completa' : 'Incompleta' ?></h2>

    <div class="secao">
        <div class="secao-header">
            <h3>1. Dados Pessoais</h3>
            <a href="etapa1_dados_pessoais.php" class="btn-editar">Editar</a>
        </div>

        <?php if (!empty($dados_inscricao['dados_pessoais'])): ?>
            <div class="dado-item">
                <div class="dado-label">Nome Completo</div>
                <div><?= htmlspecialchars($dados_inscricao['dados_pessoais']['nome_completo'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">CPF</div>
                <div><?= htmlspecialchars($dados_inscricao['dados_pessoais']['cpf'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">RG</div>
                <div><?= htmlspecialchars($dados_inscricao['dados_pessoais']['rg'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">Data de Nascimento</div>
                <div><?php
                    $data = $dados_inscricao['dados_pessoais']['data_nascimento'] ?? '';
                    echo $data ? date('d/m/Y', strtotime($data)) : '-';
                ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">Sexo</div>
                <div><?php
                    $sexo = $dados_inscricao['dados_pessoais']['sexo'] ?? '';
                    echo $sexo == 'M' ? 'Masculino' : ($sexo == 'F' ? 'Feminino' : ($sexo == 'O' ? 'Outro' : '-'));
                ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">Telefone</div>
                <div><?= htmlspecialchars($dados_inscricao['dados_pessoais']['telefone'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">E-mail</div>
                <div><?= htmlspecialchars($dados_inscricao['dados_pessoais']['email'] ?? '-') ?></div>
            </div>
        <?php else: ?>
            <p>Nenhum dado cadastrado.</p>
        <?php endif; ?>
    </div>

    <div class="secao">
        <div class="secao-header">
            <h3>2. Endereço</h3>
            <a href="etapa2_endereco.php" class="btn-editar">Editar</a>
        </div>

        <?php if (!empty($dados_inscricao['endereco'])): ?>
            <div class="dado-item">
                <div class="dado-label">CEP</div>
                <div><?= htmlspecialchars($dados_inscricao['endereco']['cep'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">Estado</div>
                <div><?= htmlspecialchars($dados_inscricao['endereco']['estado'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">Rua/Avenida</div>
                <div><?= htmlspecialchars($dados_inscricao['endereco']['rua'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">Número</div>
                <div><?= htmlspecialchars($dados_inscricao['endereco']['numero'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">Complemento</div>
                <div><?= htmlspecialchars($dados_inscricao['endereco']['complemento'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">Bairro</div>
                <div><?= htmlspecialchars($dados_inscricao['endereco']['bairro'] ?? '-') ?></div>
            </div>
            <div class="dado-item">
                <div class="dado-label">Cidade</div>
                <div><?= htmlspecialchars($dados_inscricao['endereco']['cidade'] ?? '-') ?></div>
            </div>
        <?php else: ?>
            <p>Nenhum endereço cadastrado.</p>
        <?php endif; ?>
    </div>

    <div class="secao">
        <div class="secao-header">
            <h3>3. Opções de Curso</h3>
            <a href="etapa3_cursos.php" class="btn-editar">Editar</a>
        </div>

        <?php if (!empty($dados_inscricao['cursos'])): ?>
            <p><strong>1ª Opção:</strong> <?= htmlspecialchars($dados_inscricao['cursos']['opcao1'] ?? '-') ?></p>
            <p><strong>2ª Opção:</strong> <?= htmlspecialchars($dados_inscricao['cursos']['opcao2'] ?? '-') ?></p>
            <p><strong>3ª Opção:</strong> <?= htmlspecialchars($dados_inscricao['cursos']['opcao3'] ?? '-') ?></p>
        <?php else: ?>
            <p>Nenhum curso selecionado.</p>
        <?php endif; ?>
    </div>

    <?php if (!$completa): ?>
        <p><a href="etapa1_dados_pessoais.php"><button>Continuar Inscrição</button></a></p>
    <?php endif; ?>
</body>
</html>
