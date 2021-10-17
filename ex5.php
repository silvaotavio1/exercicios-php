<?php
include("inc/funcoes.php");
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Exercicio 5</title>
</head>

<form action="ex5.php" method="post">
    <p>Informe um texto qualquer: <input value="<?php echo $_POST['texto']; ?>" type="text" name="texto" /></p>
    <p>Informe um subtexto para busca: <input value="<?php echo $_POST['subtexto']; ?>" type="text" name="subtexto" /></p>
    <p>
        <button type="submit">Executar</button>
        <button type="button" onclick="window.open('/testephp/', '_self')">Voltar</button>
    </p>
</form>

</html>

<?php

// echo "<br><p>Texto base: ";
// echo $_POST['texto'];

echo "<br>Resultado: ";
echo verificaSubTexto($_POST['texto'], $_POST['subtexto']);

?>