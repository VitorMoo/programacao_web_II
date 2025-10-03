<?php
session_start();

define('COOKIE_INSCRICAO', 'dados_inscricao_vestibular');
define('COOKIE_TEMPO', 90 * 24 * 60 * 60);

$usuarios = array(
    'vitor' => array(
        'senha' => 'vitor123',
        'nome' => 'Vitor Moreira'
    )
);

$cursos_disponiveis = array(
    'Ciência da Computação',
    'Engenharia de Software',
    'Sistemas de Informação',
    'Análise e Desenvolvimento de Sistemas',
    'Medicina',
    'Enfermagem',
    'Farmácia',
    'Direito',
    'Administração',
    'Ciências Contábeis',
    'Psicologia',
    'Pedagogia',
    'Arquitetura e Urbanismo',
    'Engenharia Civil',
    'Engenharia Mecânica'
);

function verificarLogin() {
    if (!isset($_SESSION['usuario_logado'])) {
        header('Location: login.php');
        exit;
    }
}

function obterDadosInscricao() {
    $usuario = $_SESSION['usuario_logado'] ?? '';
    $cookie_name = COOKIE_INSCRICAO . '_' . $usuario;

    if (isset($_COOKIE[$cookie_name])) {
        return json_decode($_COOKIE[$cookie_name], true);
    }

    return array(
        'dados_pessoais' => array(),
        'endereco' => array(),
        'cursos' => array()
    );
}

function salvarDadosInscricao($dados) {
    $usuario = $_SESSION['usuario_logado'] ?? '';
    $cookie_name = COOKIE_INSCRICAO . '_' . $usuario;

    setcookie($cookie_name, json_encode($dados), time() + COOKIE_TEMPO, '/');
}

function atualizarSecao($secao, $novos_dados) {
    $dados = obterDadosInscricao();
    $dados[$secao] = $novos_dados;
    salvarDadosInscricao($dados);
    return $dados;
}

function inscricaoCompleta($dados) {
    return !empty($dados['dados_pessoais']) &&
           !empty($dados['endereco']) &&
           !empty($dados['cursos']);
}
?>
