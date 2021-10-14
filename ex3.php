<?php
include("inc/funcoes.php");
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Exercicio 3</title>
</head>

<form action="ex3.php" method="post">
    <p>Informe uma data <b>inicial</b> no formato dd/mm/yyyy: <input value="<?php echo $_POST['data']; ?>" type="text" name="dataini" /></p>
    <p>Informe uma data <b>final</b> no formato dd/mm/yyyy: <input value="<?php echo $_POST['data']; ?>" type="text" name="datafim" /></p>
    <p>
        <button type="submit">Executar</button>
        <button type="button" onclick="window.open('/testephp/', '_self')">Voltar</button>
    </p>
</form>

</html>

<?php

echo "<br>A diferença em dias eh de: " . diferencaDatas() . " dias";

?>