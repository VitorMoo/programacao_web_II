<?php
require_once 'config.php';
verificarLogin();

if (isset($_GET['remover'])) {
    removerDoCarrinho($_GET['remover']);
    header('Location: carrinho.php');
    exit;
}

if (isset($_GET['limpar'])) {
    limparCarrinho();
    header('Location: carrinho.php');
    exit;
}

$carrinho = obterCarrinho();
$total = calcularTotalCarrinho($carrinho);
$total_itens = array_sum(array_column($carrinho, 'quantidade'));
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
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
        .btn-voltar {
            background: #4CAF50;
            color: white;
        }
        .btn-voltar:hover {
            background: #45a049;
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
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .carrinho-vazio {
            background: white;
            padding: 40px;
            text-align: center;
            border: 1px solid #ddd;
        }
        .carrinho-item {
            background: white;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            display: grid;
            grid-template-columns: 60px 1fr auto auto;
            gap: 15px;
            align-items: center;
        }
        .item-imagem {
            font-size: 2.5em;
            text-align: center;
        }
        .item-info h3 {
            margin: 0 0 5px 0;
        }
        .item-info p {
            color: #666;
            font-size: 0.85em;
            margin: 0;
        }
        .item-quantidade {
            text-align: center;
        }
        .item-preco {
            text-align: right;
        }
        .btn-remover {
            background: #f44336;
            color: white;
            padding: 5px 10px;
            font-size: 0.85em;
            margin-top: 8px;
        }
        .btn-remover:hover {
            background: #da190b;
        }
        .resumo-carrinho {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
            margin-top: 20px;
        }
        .resumo-linha {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .resumo-total {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            font-size: 1.3em;
            font-weight: bold;
        }
        .acoes-carrinho {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        .btn-limpar {
            background: #ff9800;
            color: white;
            flex: 1;
            padding: 10px;
        }
        .btn-limpar:hover {
            background: #e68900;
        }
        .btn-finalizar {
            background: #4CAF50;
            color: white;
            flex: 2;
            padding: 10px;
            font-size: 1.05em;
        }
        .btn-finalizar:hover {
            background: #45a049;
        }
        .btn-continuar {
            background: #4CAF50;
            color: white;
            padding: 12px 30px;
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
                <span><?= htmlspecialchars($_SESSION['nome_usuario']) ?></span>
                <a href="produtos.php" class="btn btn-voltar">Continuar Comprando</a>
                <a href="logout.php" class="btn btn-logout">Sair</a>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Meu Carrinho</h2>

        <?php if (empty($carrinho)): ?>
            <div class="carrinho-vazio">
                <h3>Seu carrinho está vazio</h3>
                <p style="color: #999; margin: 15px 0;">Adicione produtos para começar suas compras!</p>
                <a href="produtos.php" class="btn btn-continuar">Ver Produtos</a>
            </div>
        <?php else: ?>
            <?php foreach ($carrinho as $item): ?>
                <div class="carrinho-item">
                    <div class="item-imagem">
                        <?= $item['produto']['imagem'] ?>
                    </div>
                    <div class="item-info">
                        <h3><?= htmlspecialchars($item['produto']['nome']) ?></h3>
                        <p><?= htmlspecialchars($item['produto']['descricao']) ?></p>
                        <a href="carrinho.php?remover=<?= $item['produto']['id'] ?>" class="btn btn-remover">
                            Remover
                        </a>
                    </div>
                    <div class="item-quantidade">
                        <div>Quantidade</div>
                        <div style="font-size: 1.3em; font-weight: bold; margin-top: 5px;">×<?= $item['quantidade'] ?></div>
                    </div>
                    <div class="item-preco">
                        <div style="font-size: 0.85em; color: #666;">
                            R$ <?= number_format($item['produto']['preco'], 2, ',', '.') ?> un.
                        </div>
                        <div style="font-size: 1.3em; font-weight: bold; margin-top: 5px;">
                            R$ <?= number_format($item['produto']['preco'] * $item['quantidade'], 2, ',', '.') ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="resumo-carrinho">
                <div class="resumo-linha">
                    <span>Total de itens:</span>
                    <strong><?= $total_itens ?> <?= $total_itens == 1 ? 'item' : 'itens' ?></strong>
                </div>
                <div class="resumo-total">
                    <span>Total:</span>
                    <span>R$ <?= number_format($total, 2, ',', '.') ?></span>
                </div>

                <div class="acoes-carrinho">
                    <a href="carrinho.php?limpar=1" class="btn btn-limpar"
                       onclick="return confirm('Deseja realmente limpar o carrinho?')">
                        Limpar Carrinho
                    </a>
                    <a href="#" class="btn btn-finalizar"
                       onclick="alert('Funcionalidade de compra não implementada neste exemplo.'); return false;">
                        Finalizar Compra
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
