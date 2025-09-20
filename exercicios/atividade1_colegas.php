<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Colegas</title>
</head>
<body>
    <h1>Lista de Colegas</h1>

    <?php
    $colegas = array("Vitor Moreira", "Luana Catisti", "Victor Vicentini", "Matheus Bonadio", "Guilherme Francoi");

    echo "<h2>Meus colegas:</h2>";

    foreach ($colegas as $nome) {
        echo "<p>" . $nome . "</p>\n";
    }
    ?>

</body>
</html>
