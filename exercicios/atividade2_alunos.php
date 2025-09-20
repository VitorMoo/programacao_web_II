<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas dos Alunos</title>
</head>
<body>
    <h1>Notas dos Alunos</h1>

    <?php
    $alunos = array(
        array(
            "nome" => "Vitor Moreira",
            "nota_parcial" => 8.5,
            "exame" => 9.0
        ),
        array(
            "nome" => "Luana Catisti",
            "nota_parcial" => 9.5,
            "exame" => 8.8
        ),
        array(
            "nome" => "Victor Vicentini",
            "nota_parcial" => 7.0,
            "exame" => 8.2
        )
    );

    $maior_media = 0;
    $aluno_maior_nota = "";

    foreach ($alunos as &$aluno) {
        $aluno["media"] = ($aluno["nota_parcial"] + $aluno["exame"]) / 2;
        if ($aluno["media"] > $maior_media) {
            $maior_media = $aluno["media"];
            $aluno_maior_nota = $aluno["nome"];
        }
    }
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Nota Parcial</th>
                <th>Exame</th>
                <th>Média</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno): ?>
            <tr>
                <td>
                    <?php if ($aluno["nome"] == $aluno_maior_nota): ?>
                        <strong><?= $aluno["nome"] ?></strong>
                    <?php else: ?>
                        <?= $aluno["nome"] ?>
                    <?php endif; ?>
                </td>
                <td><?= number_format($aluno["nota_parcial"], 1) ?></td>
                <td><?= number_format($aluno["exame"], 1) ?></td>
                <td><?= number_format($aluno["media"], 1) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><strong>Aluno com maior média:</strong> <?= $aluno_maior_nota ?> (<?= number_format($maior_media, 1) ?>)</p>

</body>
</html>
