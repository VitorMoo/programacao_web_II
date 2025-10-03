<?php
session_start();

define('COOKIE_CARRINHO', 'carrinho_produtos');
define('COOKIE_TEMPO', 30 * 24 * 60 * 60);

$usuarios = array(
    'admin' => array(
        'senha' => 'admin123',
        'nome' => 'Administrador',
        'email' => 'admin@loja.com'
    )
);

$produtos_disponiveis = array(
    1 => array(
        'id' => 1,
        'nome' => 'Notebook Dell Inspiron',
        'preco' => 3500.00,
        'descricao' => 'Intel Core i5, 8GB RAM, 256GB SSD',
        'imagem' => '💻'
    ),
    2 => array(
        'id' => 2,
        'nome' => 'Mouse Logitech MX Master',
        'preco' => 450.00,
        'descricao' => 'Mouse sem fio ergonômico',
        'imagem' => '🖱️'
    ),
    3 => array(
        'id' => 3,
        'nome' => 'Teclado Mecânico RGB',
        'preco' => 350.00,
        'descricao' => 'Switch Cherry MX Blue, iluminação RGB',
        'imagem' => '⌨️'
    ),
    4 => array(
        'id' => 4,
        'nome' => 'Monitor LG 27" 4K',
        'preco' => 2200.00,
        'descricao' => 'IPS, 60Hz, HDR10',
        'imagem' => '🖥️'
    ),
    5 => array(
        'id' => 5,
        'nome' => 'Headset HyperX Cloud',
        'preco' => 380.00,
        'descricao' => 'Som surround 7.1, microfone removível',
        'imagem' => '🎧'
    ),
    6 => array(
        'id' => 6,
        'nome' => 'Webcam Logitech C920',
        'preco' => 550.00,
        'descricao' => 'Full HD 1080p, 30fps',
        'imagem' => '📷'
    ),
    7 => array(
        'id' => 7,
        'nome' => 'SSD Samsung 1TB',
        'preco' => 650.00,
        'descricao' => 'NVMe M.2, velocidade de leitura 3500MB/s',
        'imagem' => '💾'
    ),
    8 => array(
        'id' => 8,
        'nome' => 'Mousepad Gamer XXL',
        'preco' => 80.00,
        'descricao' => 'Base antiderrapante, 90x40cm',
        'imagem' => '🎮'
    )
);

function verificarLogin() {
    if (!isset($_SESSION['usuario_logado'])) {
        header('Location: login.php');
        exit;
    }
}

function obterCarrinho() {
    if (isset($_COOKIE[COOKIE_CARRINHO])) {
        return json_decode($_COOKIE[COOKIE_CARRINHO], true);
    }
    return array();
}

function salvarCarrinho($carrinho) {
    setcookie(COOKIE_CARRINHO, json_encode($carrinho), time() + COOKIE_TEMPO, '/');
}

function adicionarAoCarrinho($produto_id) {
    $carrinho = obterCarrinho();

    if (isset($carrinho[$produto_id])) {
        $carrinho[$produto_id]['quantidade']++;
    } else {
        global $produtos_disponiveis;
        if (isset($produtos_disponiveis[$produto_id])) {
            $carrinho[$produto_id] = array(
                'produto' => $produtos_disponiveis[$produto_id],
                'quantidade' => 1
            );
        }
    }

    salvarCarrinho($carrinho);
    return $carrinho;
}

function removerDoCarrinho($produto_id) {
    $carrinho = obterCarrinho();

    if (isset($carrinho[$produto_id])) {
        unset($carrinho[$produto_id]);
        salvarCarrinho($carrinho);
    }

    return $carrinho;
}

function limparCarrinho() {
    setcookie(COOKIE_CARRINHO, '', time() - 3600, '/');
}

function calcularTotalCarrinho($carrinho) {
    $total = 0;
    foreach ($carrinho as $item) {
        $total += $item['produto']['preco'] * $item['quantidade'];
    }
    return $total;
}
?>
