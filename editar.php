<?php
//Remove mensagem de alerta
error_reporting(1);

$conexao = new mysqli("localhost", "andrecos_unifacs", "unifacs123", "andrecos_unifacs");

if ($conexao->connect_error) {
  echo "Erro de Conexão<br>";
}

$id = $_GET["id"];

$sql = "SELECT * FROM aluno WHERE id = $id";

// Executa no BD
$retorno = $conexao->query($sql);

if ($retorno != null) {
  $registro = $retorno->fetch_array();
} else {
  echo "alert('Retorno Vazio')";
}

$nome = $registro["nome"];
$matricula = $registro["matricula"];
$email = $registro["email"];
$sexo = $registro["sexo"];
$curso = $registro["curso"];

if ($_POST != NULL) {

  $nome = addslashes($_POST["nome"]);
  $matricula = addslashes($_POST["matricula"]);
  $email = addslashes($_POST["email"]);
  $sexo = addslashes($_POST["sexo"]);
  $curso = addslashes($_POST["curso"]);

  $sql = "UPDATE  aluno 
              SET nome= '$nome',
                      matricula='$matricula',
                      email='$email',
                      sexo='$sexo',
                      curso='$curso'
              WHERE  id=$id";

  $retorno = $conexao->query($sql);

  if ($retorno == true || $retorno == 1) {
    echo "<script>
      alert('Atualizado com Sucesso!');
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
  <title>Editar alunos - PHP</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body class="container">
  <center>
    <div>
      <h1>Editar Aluno </h1>
    </div>

    <form method="POST">
      <label>Nome:</label>
      <input type="Login" name="nome" placeholder="Nome" value="<?php echo "$nome" ?>" maxlength="60">
      <br>
      <label>Matricula:</label>
      <input type="text" name="matricula" placeholder="Matrícula" value="<?php echo "$matricula" ?>" maxlength="60">
      <br>
      <label>Email:</label>
      <input type="email" name="email" placeholder="Email" value="<?php echo "$email" ?>" maxlength="60">
      <br>
      <label>Sexo:</label>
      <br>
      <div id="sexo">
        <label for="masculino">Masculino</label>
        <input <?php if ($sexo == "masculino")  echo "checked" ?> type="radio" name="sexo" value="masculino">
        <br>
        <label for="feminino">Feminino</label>
        <input <?php if ($sexo == "feminino")  echo "checked" ?> type="radio" name="sexo" value="feminino">
      </div>
      </div>
      <br>
      <div id="curso">
        <label>Curso:</label>
        <select name="curso" required>
          <option value="">Selecione</option>
          <option <?php if ($curso == "sistemas_internet")  echo "selected" ?> value="sistemas_internet">Sistemas para Internet</option>
          <option <?php if ($curso == "redes")  echo "selected" ?> value="redes">Redes</option>
          <option <?php if ($curso == "sistemas_informacao")  echo "selected" ?> value="sistemas_informacao">Sistemas de Informação</option>
        </select>
      </div>
      <br>
      <input type="submit" value="Enviar">
    </form>
    <br>
  </center>
</body>

</html>