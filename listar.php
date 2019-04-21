<?php
//Remove mensagem de alerta
error_reporting(1);

$conexao = new mysqli("localhost", "andrecos_unifacs", "unifacs123", "andrecos_unifacs");

if ($conexao->connect_error) {
    echo "Erro de Conexão<br>";
}

$filtro_sql = "";

if ($_POST != NULL) {

    $value = $_POST['sexo'];

    if($value == "todos"){
        $filtro_sql = "";    
    }else{
        $filtro_sql = "WHERE sexo = '$value'"; 
    }
    
}

?>

<html>

<head>
    <title>Listar Alunos BD</title>
    <meta charset="utf-8">
</head>

<body>
    
    <h1>Alunos - Listar</h1>

    <form method="POST">
            <label>Filtrar</label>
            <br>
            <label for="masculino">Masculino</label>
            <input type="radio" name="sexo" value="masculino">
            <br>
            <label for="feminino">Feminino</label>
            <input type="radio" name="sexo" value="feminino">
            <br>
            <label for="todos">Todos</label>
            <input type="radio" name="sexo" value="todos">
            <br>
            <input type="submit" value="Filtrar">
        </form>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Email</th>
            <th>Sexo</th>
            <th>Curso</th>
        </tr>

        <?php

        $sql = "SELECT * FROM aluno $filtro_sql";

        $retorno = $conexao->query($sql);

        while ($registro = $retorno->fetch_array()) {
            $id = $registro["id"];
            $nome = $registro["nome"];
            $matricula = $registro["matricula"];
            $email = $registro["email"];
            $sexo = $registro["sexo"];
            $curso = $registro["curso"];

            echo "
            <tr>
                <td>$id</td>
                <td>$nome</td>
                <td>$matricula</td>
                <td>$email</td>
                <td>$sexo</td>
                <td>$curso</td>
            </tr>";
        }

        ?>

    </table>

</body>

</html>