<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Exemplo PHP</title>
</head>

<body>
   <?php
        $name = "Pedro";
        $age = "30";
        echo "Meus Dados <br> <b>Nome:</b> $name <br><b>Idade:</b> $age";
    ?>

    <ul>
    <?php
    for($i = 0; $i<=100; $i++){
        echo "<li>Item &i</li>";
    }
    ?>
    </ul>

</body>

</html>