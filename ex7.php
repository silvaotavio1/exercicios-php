<?php
include("inc/funcoes.php");
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Exercicio 7</title>
</head>

<form action="ex1.php" method="post">
    <p>Número de posições no array: <input value="<?php echo definePosicoes(); ?>" type="number" name="numPosicoes" /></p>
    <p>Numero de inversões: <input value="<?php echo defineInversao() ?>" type="number" name="numInversoes" /></p>
    <p>
        <input type="submit">Executar</input>
        <button type="submit" onclick="window.open('/testephp/', '_self')">Voltar</button>
    </p>
</form>

</html>

<?php

echo "<br>Array antes de sofrer alteração: ";
printArray(criarArray());

echo "<br>Array após sofrer alteração: ";
printArray(inverterArray());

?>