<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Gerar tabela em PHP</title>
</head>

<body>
    <?php

    $qtd_linhas = $_GET["qtd_linhas"];
    $qtd_colunas = $_GET["qtd_colunas"];

    if ($qtd_linhas == NULL || $qtd_colunas == NULL) {
        echo "<br> Falta algum parâmetro de quantidade!";
    } else {
        echo "<table border='1' height='300px' width='300px'>";
        if ($qtd_linhas > 0) {
            for ($i = 1; $i <= $qtd_linhas; $i++) {
                echo "<tr>";
                if ($qtd_colunas > 0) {
                    for ($j = 1; $j <= $qtd_colunas; $j++) {
                        echo "<td></td>";
                    }
                }
                echo "</tr>";
            }
        }
        echo "</table>";
    }

    ?>

</body>

</html>