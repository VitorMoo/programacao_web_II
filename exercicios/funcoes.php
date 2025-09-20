<?php

function calcularIMC($peso, $altura) {
    if ($altura <= 0) {
        throw new InvalidArgumentException("Altura deve ser maior que zero");
    }

    return $peso / ($altura * $altura);
}

function obterFaixaIMC($imc) {
    if ($imc < 18.5) {
        return array(
            'faixa' => 'Abaixo do peso',
            'descricao' => 'Você está abaixo do peso ideal. Consulte um nutricionista.'
        );
    } elseif ($imc >= 18.5 && $imc < 25) {
        return array(
            'faixa' => 'Peso normal',
            'descricao' => 'Parabéns! Seu peso está dentro da faixa ideal.'
        );
    } elseif ($imc >= 25 && $imc < 30) {
        return array(
            'faixa' => 'Sobrepeso',
            'descricao' => 'Você está com sobrepeso. Considere uma dieta equilibrada e exercícios.'
        );
    } elseif ($imc >= 30 && $imc < 35) {
        return array(
            'faixa' => 'Obesidade grau I',
            'descricao' => 'Obesidade grau I. É recomendável procurar orientação médica.'
        );
    } elseif ($imc >= 35 && $imc < 40) {
        return array(
            'faixa' => 'Obesidade grau II',
            'descricao' => 'Obesidade grau II (severa). Procure ajuda médica imediatamente.'
        );
    } else {
        return array(
            'faixa' => 'Obesidade grau III',
            'descricao' => 'Obesidade grau III (mórbida). É essencial buscar tratamento médico.'
        );
    }
}

function validarDadosIMC($peso, $altura) {
    $erros = array();
    $valido = true;

    if (empty($peso) || !is_numeric($peso)) {
        $erros[] = "Peso deve ser um número válido";
        $valido = false;
    } elseif ($peso <= 0 || $peso > 500) {
        $erros[] = "Peso deve estar entre 1 e 500 kg";
        $valido = false;
    }

    if (empty($altura) || !is_numeric($altura)) {
        $erros[] = "Altura deve ser um número válido";
        $valido = false;
    } elseif ($altura <= 0 || $altura > 3) {
        $erros[] = "Altura deve estar entre 0.1 e 3.0 metros";
        $valido = false;
    }

    return array(
        'valido' => $valido,
        'erros' => $erros
    );
}
?>
