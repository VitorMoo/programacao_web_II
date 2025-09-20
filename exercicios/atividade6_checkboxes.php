<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Interesses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f8f9fa;
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
            margin-bottom: 10px;
        }
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        .checkbox-item {
            display: flex;
            align-items: center;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            transition: all 0.3s ease;
        }
        .checkbox-item:hover {
            border-color: #4CAF50;
            background-color: #f8f8f8;
        }
        .checkbox-item input[type="checkbox"] {
            margin-right: 10px;
            transform: scale(1.2);
        }
        .checkbox-item label {
            cursor: pointer;
            font-weight: 500;
            color: #333;
        }
        .checkbox-item input[type="checkbox"]:checked + label {
            color: #4CAF50;
            font-weight: bold;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .resultado {
            background-color: #e8f5e8;
            border-left: 5px solid #4CAF50;
            padding: 25px;
            margin-top: 30px;
            border-radius: 6px;
        }
        .resultado h2 {
            color: #2e7d32;
            margin-top: 0;
        }
        .interesses-lista {
            background-color: white;
            padding: 15px;
            border-radius: 6px;
            margin-top: 15px;
        }
        .interesses-lista ul {
            margin: 0;
            padding-left: 20px;
        }
        .interesses-lista li {
            margin: 8px 0;
            color: #333;
        }
        .contador {
            font-size: 18px;
            font-weight: bold;
            color: #4CAF50;
            text-align: center;
            margin: 15px 0;
        }
        .nenhum-interesse {
            background-color: #fff3cd;
            border-left: 5px solid #ffc107;
            padding: 20px;
            margin-top: 30px;
            border-radius: 6px;
        }
        .voltar {
            text-align: center;
            margin-top: 20px;
        }
        .voltar a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        .voltar a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Seleção de Interesses em Programação</h1>
        <p class="subtitle">Escolha as linguagens e tecnologias que mais despertam seu interesse</p>

        <?php
        $opcoes_interesses = array(
            'php' => 'PHP',
            'javascript' => 'JavaScript',
            'python' => 'Python',
            'c' => 'C',
            'java' => 'Java',
            'csharp' => 'C#',
            'go' => 'Go',
            'rust' => 'Rust'
        );

        if (isset($_GET['interesses']) && is_array($_GET['interesses'])) {
            $interesses_selecionados = $_GET['interesses'];
            $quantidade_selecionada = count($interesses_selecionados);

            $interesses_validos = array();
            foreach ($interesses_selecionados as $interesse) {
                if (array_key_exists($interesse, $opcoes_interesses)) {
                    $interesses_validos[] = $opcoes_interesses[$interesse];
                }
            }

            if (!empty($interesses_validos)) {
                ?>
                <div class="resultado">
                    <h2>Resultado da sua seleção</h2>
                    <div class="contador">
                        Você selecionou <?= $quantidade_selecionada ?> interesse<?= $quantidade_selecionada != 1 ? 's' : '' ?>
                    </div>

                    <div class="interesses-lista">
                        <h3>Seus interesses em programação:</h3>
                        <ul>
                            <?php foreach ($interesses_validos as $interesse): ?>
                                <li><?= htmlspecialchars($interesse) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>



                <div class="voltar">
                    <a href="atividade6_checkboxes.php">← Voltar ao formulário</a>
                </div>

                <?php
            } else {
                ?>
                <div class="nenhum-interesse">
                    <h3>Nenhum interesse válido selecionado</h3>
                    <p>Por favor, selecione pelo menos uma opção válida.</p>
                    <div class="voltar">
                        <a href="atividade6_checkboxes.php">← Voltar ao formulário</a>
                    </div>
                </div>
                <?php
            }
        } elseif (isset($_GET['interesses'])) {
            ?>
            <div class="nenhum-interesse">
                <h3>Nenhum interesse selecionado</h3>
                <p>Você precisa selecionar pelo menos uma opção para continuar.</p>
                <div class="voltar">
                    <a href="atividade6_checkboxes.php">← Voltar ao formulário</a>
                </div>
            </div>
            <?php
        } else {
            ?>
            <form method="GET" action="">
                <div class="checkbox-group">
                    <?php foreach ($opcoes_interesses as $value => $label): ?>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                   id="interesse_<?= $value ?>"
                                   name="interesses[]"
                                   value="<?= $value ?>">
                            <label for="interesse_<?= $value ?>"><?= $label ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <button type="submit">Ver Meus Interesses</button>
            </form>

            <?php
        }
        ?>
    </div>
</body>
</html>
