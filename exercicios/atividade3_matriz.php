<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriz 3x3 e Transposta</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            width: 50px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <h1>Matriz 3x3 e sua Transposta</h1>

    <?php
    $matriz = array(
        array(1, 2, 3),
        array(4, 5, 6),
        array(7, 8, 9)
    );

    function calcularTransposta($matriz) {
        $transposta = array();
        $linhas = count($matriz);
        $colunas = count($matriz[0]);

        for ($i = 0; $i < $colunas; $i++) {
            for ($j = 0; $j < $linhas; $j++) {
                $transposta[$i][$j] = $matriz[$j][$i];
            }
        }

        return $transposta;
    }

    function exibirMatriz($matriz, $titulo) {
        echo "<div>";
        echo "<h3>$titulo</h3>";
        echo "<table>";

        foreach ($matriz as $linha) {
            echo "<tr>";
            foreach ($linha as $elemento) {
                echo "<td>$elemento</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    }

    $transposta = calcularTransposta($matriz);
    ?>

    <div class="container">
        <?php
        exibirMatriz($matriz, "Matriz Original");

        exibirMatriz($transposta, "Matriz Transposta");
        ?>
    </div>

    <h3>Explicação:</h3>
    <p>A <strong>matriz transposta</strong> é obtida trocando linhas por colunas. Ou seja, o elemento da posição [i][j] na matriz original passa para a posição [j][i] na transposta.</p>

</body>
</html>
