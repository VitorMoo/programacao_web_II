<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="number"]:focus {
            border-color: #4CAF50;
            outline: none;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .resultado {
            background-color: #e8f5e8;
            border-left: 5px solid #4CAF50;
            padding: 20px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .erro {
            background-color: #ffe8e8;
            border-left: 5px solid #f44336;
            padding: 15px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .imc-valor {
            font-size: 24px;
            font-weight: bold;
            color: #2e7d32;
            text-align: center;
            margin: 15px 0;
        }
        .faixa-imc {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
        }
        .descricao {
            text-align: center;
            color: #666;
            font-style: italic;
        }
        .tabela-referencia {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
        }
        .tabela-referencia th,
        .tabela-referencia td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .tabela-referencia th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de IMC</h1>
        <p style="text-align: center; color: #666;">
            O Índice de Massa Corporal (IMC) é uma medida internacional usada para calcular se uma pessoa está no peso ideal.
        </p>

        <?php
        // Usando require_once para incluir as funções
        // Justificativa: require_once é mais seguro que include_once pois interrompe a execução
        // se o arquivo não for encontrado, evitando erros fatais. O 'once' evita inclusões duplicadas.
        require_once 'funcoes.php';

        $resultado_calculado = false;
        $erros = array();

        // Verificando se o formulário foi enviado via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $peso = isset($_POST['peso']) ? floatval($_POST['peso']) : '';
            $altura = isset($_POST['altura']) ? floatval($_POST['altura']) : '';

            // Validando os dados
            $validacao = validarDadosIMC($peso, $altura);

            if ($validacao['valido']) {
                try {
                    // Calculando o IMC
                    $imc = calcularIMC($peso, $altura);
                    $faixa_info = obterFaixaIMC($imc);
                    $resultado_calculado = true;
                } catch (Exception $e) {
                    $erros[] = "Erro ao calcular IMC: " . $e->getMessage();
                }
            } else {
                $erros = $validacao['erros'];
            }
        }
        ?>

        <!-- Formulário -->
        <form method="POST" action="">
            <div class="form-group">
                <label for="peso">Peso (kg):</label>
                <input type="number"
                       id="peso"
                       name="peso"
                       step="0.1"
                       min="1"
                       max="500"
                       value="<?= isset($peso) ? $peso : '' ?>"
                       placeholder="Ex: 70.5"
                       required>
            </div>

            <div class="form-group">
                <label for="altura">Altura (m):</label>
                <input type="number"
                       id="altura"
                       name="altura"
                       step="0.01"
                       min="0.1"
                       max="3.0"
                       value="<?= isset($altura) ? $altura : '' ?>"
                       placeholder="Ex: 1.75"
                       required>
            </div>

            <button type="submit">Calcular IMC</button>
        </form>

        <?php if (!empty($erros)): ?>
            <div class="erro">
                <h3>Erros encontrados:</h3>
                <ul>
                    <?php foreach ($erros as $erro): ?>
                        <li><?= htmlspecialchars($erro) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($resultado_calculado): ?>
            <div class="resultado">
                <h2>Resultado do seu IMC</h2>
                <div class="imc-valor">
                    IMC: <?= number_format($imc, 2, ',', '.') ?>
                </div>
                <div class="faixa-imc">
                    Classificação: <?= $faixa_info['faixa'] ?>
                </div>
                <div class="descricao">
                    <?= $faixa_info['descricao'] ?>
                </div>

                <p><strong>Dados informados:</strong></p>
                <ul>
                    <li>Peso: <?= number_format($peso, 1, ',', '.') ?> kg</li>
                    <li>Altura: <?= number_format($altura, 2, ',', '.') ?> m</li>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Tabela de referência -->
        <h3>Tabela de Referência IMC</h3>
        <table class="tabela-referencia">
            <thead>
                <tr>
                    <th>IMC</th>
                    <th>Classificação</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Menor que 18,5</td>
                    <td>Abaixo do peso</td>
                </tr>
                <tr>
                    <td>18,5 a 24,9</td>
                    <td>Peso normal</td>
                </tr>
                <tr>
                    <td>25,0 a 29,9</td>
                    <td>Sobrepeso</td>
                </tr>
                <tr>
                    <td>30,0 a 34,9</td>
                    <td>Obesidade grau I</td>
                </tr>
                <tr>
                    <td>35,0 a 39,9</td>
                    <td>Obesidade grau II</td>
                </tr>
                <tr>
                    <td>Maior que 40,0</td>
                    <td>Obesidade grau III</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border-radius: 4px;">
            <h4>📋 Justificativa do método de inclusão:</h4>
            <p><strong>Escolhi usar <code>require_once</code> porque:</strong></p>
            <ul>
                <li><strong>Segurança:</strong> <code>require_once</code> interrompe a execução se o arquivo não for encontrado, evitando erros fatais</li>
                <li><strong>Evita duplicação:</strong> O <code>once</code> garante que o arquivo seja incluído apenas uma vez, evitando redeclaração de funções</li>
                <li><strong>Dependência crítica:</strong> Como as funções são essenciais para o funcionamento da calculadora, é importante que a execução pare se houver problema</li>
                <li><strong>Alternativa seria <code>include_once</code>:</strong> Mas geraria apenas warning e continuaria executando, podendo causar erros</li>
            </ul>
        </div>
    </div>
</body>
</html>
