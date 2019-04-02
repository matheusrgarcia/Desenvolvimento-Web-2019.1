<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Exemplo PHP</title>
</head>

<body>
    <?php
    $name = "Matheus";
    $age = "21";
    echo "Meus Dados <br> <b>Nome:</b> $name <br><b>Idade:</b> $age";
    ?>

    <ul>
        <?php
        for ($i = 0; $i <= 100; $i++) {
            echo "<li>Item &i</li>";
        }
        ?>
    </ul>

    <?php
        error.reporting(1);
        
        //Pegar parâmetros do navegador
        $quantidade = $_GET["qtd"];

        if($quantidade == NULL){
            echo "<br> Falta o parâmetro qtd !";
        }else{
            for ($i = 0; $i <= quantidade; $i++) {
                echo "<li>Item &i</li>";
            }
        }

        $alunos = array("Aluno 1" => "Matheus", "Felipe", "Lucas");
        array_push($alunos, "Luiz");

        foreach($alunos as $indice => $aluno){
            echo "<li>$indice - $aluno</li>";
        }
        
    ?>

</body>

</html> 