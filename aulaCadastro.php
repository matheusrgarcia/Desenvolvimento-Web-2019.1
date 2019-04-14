<?php
//Remove mensagem de alerta
error_reporting(1);

$conexao = new mysqli("localhost", "root", "", "20191_eng");

if ($conexao->connect_error) {
    echo "Erro de Conexão<br>";
}

$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$grupo = $_POST["grupo"];
$detalhes = $_POST["detalhes"];

$sql = "INSERT INTO contato(nome, telefone, email, grupo, detalhes) VALUES ('$nome', '$telefone', '$email', '$grupo', '$detalhes')";

echo $sql;

$retorno = $conexao -> query($sql);

if($retorno == true){
    echo "<script>
            alert('Cadastrado com Sucesso!');
            location.href='cadastrar.php';
            </script:>
        ";
}else{
    echo " alert('Erro!')";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Aula BD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
    <center>
        <div class="container">
            <h1>Cadastrar Contato </h1>
        </div>

        <form method="POST">
            <label>Name:</label>
            <input type="Login" name="user_name" placeholder="Nome" value="" maxlength="60">
            <br>
            <label>Telefone:</label>
            <input type="text" name="phone" placeholder="phone" value="" maxlength="60">
            <br><br>
            <input type="submit" name="Send">
            <br>
            <div class="form-group">
                <label>Grupo</label>
                <select name="grupo" required class="form-control">
                    <option value="">Selecione</option>
                    <option value="friends">Amigos</option>
                    <option value="family">Família</option>
                    <option value="work">Trabalho</option>
                    <option value="others">Outros</option>
                </select>
            </div>
            <br><br>
            Outras Informações
            <br>
            <textarea name="info"></textarea>
            <input type="hidden" name="id_usuario" value="10">
            <input type="submit" value="Salvar">
        </form>
        <br>
        <button type="button" onClick="myFunction()">Set color</button>
    </center>

</body>

</html>