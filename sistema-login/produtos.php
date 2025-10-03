<?php
require_once 'config.php';
verificarLogin();

$mensagem = '';
if (isset($_GET['add']) && isset($produtos_disponiveis[$_GET['add']])) {
    adicionarAoCarrinho($_GET['add']);
    $mensagem = 'Produto adicionado ao carrinho!';
}

$carrinho = obterCarrinho();
$total_itens = array_sum(array_column($carrinho, 'quantidade'));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            margin: 0;
        }
        .header {
            background: #333;
            color: white;
            padding: 15px;
            border-bottom: 3px solid #4CAF50;
        }
        .header-content {
            max-width: 1000px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo h1 {
            font-size: 1.5em;
            margin: 0;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .btn {
            padding: 8px 15px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn-carrinho {
            background: #4CAF50;
            color: white;
            position: relative;
        }
        .btn-carrinho:hover {
            background: #45a049;
        }
        .badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.75em;
            text-align: center;
            line-height: 20px;
        }
        .btn-logout {
            background: #f44336;
            color: white;
        }
        .btn-logout:hover {
            background: #da190b;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 0 15px;
        }
        .mensagem {
            background: #d4edda;
            color: #155724;
            padding: 10px 15px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .produtos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 15px;
        }
        .produto-card {
            background: white;
            border: 1px solid #ddd;
            padding: 15px;
        }
        .produto-imagem {
            font-size: 3em;
            text-align: center;
            margin-bottom: 10px;
        }
        .produto-nome {
            font-size: 1.1em;
            font-weight: bold;
            margin-bottom: 8px;
        }
        .produto-descricao {
            color: #666;
            font-size: 0.85em;
            margin-bottom: 10px;
            min-height: 35px;
        }
        .produto-preco {
            font-size: 1.3em;
            font-weight: bold;
            color: #4CAF50;
            margin-bottom: 10px;
        }
        .btn-adicionar {
            width: 100%;
            background: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 0.95em;
        }
        .btn-adicionar:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-content">
            <div class="logo">
                <h1>Sistema de login</h1>
            </div>
            <div class="user-info">
                <span>Olá, <?= htmlspecialchars($_SESSION['nome_usuario']) ?></span>
                <a href="carrinho.php" class="btn btn-carrinho">
                    Carrinho
                    <?php if ($total_itens > 0): ?>
                        <span class="badge"><?= $total_itens ?></span>
                    <?php endif; ?>
                </a>
                <a href="logout.php" class="btn btn-logout">Sair</a>
            </div>
        </div>
    </div>

    <div class="container">
        <?php if ($mensagem): ?>
            <div class="mensagem">
                <?= htmlspecialchars($mensagem) ?>
            </div>
        <?php endif; ?>

        <h2>Nossos Produtos</h2>

        <div class="produtos-grid">
            <?php foreach ($produtos_disponiveis as $produto): ?>
                <div class="produto-card">
                    <div class="produto-imagem"><?= $produto['imagem'] ?></div>
                    <div class="produto-nome"><?= htmlspecialchars($produto['nome']) ?></div>
                    <div class="produto-descricao"><?= htmlspecialchars($produto['descricao']) ?></div>
                    <div class="produto-preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></div>
                    <a href="produtos.php?add=<?= $produto['id'] ?>" class="btn btn-adicionar">
                        Adicionar ao Carrinho
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
