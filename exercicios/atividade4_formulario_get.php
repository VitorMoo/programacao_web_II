<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Boas-vindas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .welcome-message {
            background-color: #e8f5e8;
            border: 2px solid #4CAF50;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Formulário de Boas-vindas</h1>

    <?php
    if (isset($_GET['nome']) && !empty(trim($_GET['nome']))) {
        $nome = htmlspecialchars(trim($_GET['nome']));
        echo "<div class='welcome-message'>";
        echo "<h2>Olá, $nome! Seja bem-vindo.</h2>";
        echo "<p><a href='atividade4_formulario_get.php'>Voltar ao formulário</a></p>";
        echo "</div>";
    } else {
        ?>
        <form method="GET" action="">
            <div class="form-group">
                <label for="nome">Digite seu nome:</label>
                <input type="text" id="nome" name="nome" required placeholder="Seu nome completo">
            </div>
            <button type="submit">Enviar</button>
        </form>
        <?php
    }
    ?>

</body>
</html>
