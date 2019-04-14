<?php
//Remove mensagem de alerta
error_reporting(1);

if ($_POST != null) {

    $conexao = new mysqli("localhost", "andrecos_unifacs", "unifacs123", "andrecos_unifacs");

    if ($conexao->connect_error) {
        echo "Erro de Conexão<br>";
    }

    $nome = addslashes ($_POST["nome"]);
    $matricula = addslashes ($_POST["matricula"]);
    $email = addslashes ($_POST["email"]);
    $sexo = addslashes ($_POST["sexo"]);
    $curso = addslashes ($_POST["curso"]);

    $sql = "INSERT INTO aluno(nome, matricula, email, sexo, curso) VALUES ('$nome', '$matricula', '$email', '$sexo', '$curso')";

    $retorno = $conexao->query($sql);

    if ($retorno == true || $retorno == 1) {
        echo "<script>
            alert('Cadastrado com Sucesso!');
        </script>
        ";
    } else {
        echo "alert('Erro!')";
    }
    
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Desafio PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body class="container">
    <center>
        <div>
            <h1>Cadastrar Aluno </h1>
        </div>

        <form method="POST">
            <label>Nome:</label>
            <input type="Login" name="nome" placeholder="Nome" value="" maxlength="60">
            <br>
            <label>Matricula:</label>
            <input type="text" name="matricula" placeholder="phone" value="" maxlength="60">
            <br>
            <label>Email:</label>
            <input type="email" name="email" placeholder="email" value="" maxlength="60">
            <br>
            <label>Sexo:</label>
            <br>
            <div id="sexo">
                <label for="masculino">Masculino</label>
                <input type="radio" name="gender" value="masculino">
                <br>
                <label for="feminino">Feminino</label>
                <input type="radio" name="gender" value="feminino">
            </div>
            </div>
            <br>
            <div id="curso">
                <label>Curso:</label>
                <select name="curso" required>
                    <option value="">Selecione</option>
                    <option value="sistemas_internet">Sistemas para Internet</option>
                    <option value="redes">Redes</option>
                    <option value="sistemas_informacao">Sistemas de Informação</option>
                </select>
            </div>
            <br>
            <input type="submit" value="Enviar">
        </form>
        <br>
    </center>
</body>

</html>