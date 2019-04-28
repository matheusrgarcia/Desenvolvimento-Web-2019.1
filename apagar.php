<?php
//Remove mensagem de alerta
error_reporting(1);

$conexao = new mysqli("localhost", "andrecos_unifacs", "unifacs123", "andrecos_unifacs");

if ($conexao->connect_error) {
    echo "Erro de Conexão<br>";
}


?>

<html>

<head>
    <title>Listar Alunos BD</title>
    <meta charset="utf-8">
</head>

<body>

    <h1>Alunos - Listagem</h1>

    <?php

    $id = $_GET["id"];
    
    if ($id != null) {
        // Esqueceu de passar o ID?
        if ($id == NULL) {
            echo "O ID não foi passado! <br>";
        }
        // Cria comando SQl
        $sql = "DELETE FROM aluno 
            WHERE id = $id";
        // Executa no BD
        $retorno = $conexao->query($sql);
        // Executou?
        if ($retorno == true) {
            echo "<script>
                alert('Deletado com Sucesso!');
                location.href='apagar.php';
            </script>";
        } else {
            echo "<script>
                alert('Erro ao Deletar!');
            </script>";
            // Exibe do erro que o banco retorna
            echo $conexao->error;
        }
    }

    ?>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Apagar</th>
        </tr>

        <?php

        $sql = "SELECT * FROM aluno";

        $retorno = $conexao->query($sql);

        while ($registro = $retorno->fetch_array()) {
            $id = $registro["id"];
            $nome = $registro["nome"];

            echo "
            <tr>
                <td>$id</td>
                <td>$nome</td>
                <td><a onclick=\"return confirm('Deseja Apagar?');\" class='btn btn-danger' href='apagar.php?id=$id'>Apagar</a></td>
            </tr>";
        }

        ?>

    </table>

</body>

</html>