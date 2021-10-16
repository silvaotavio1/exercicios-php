<?php
include("inc/funcoes.php");
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Exercicio 4</title>
</head>

<form action="ex4.php" method="post">
    <p>Número de posições no array: <input value="<?php echo definePosicoes(); ?>" type="number" name="numPosicoes" /></p>
    <p>
        <button type="submit">Executar</button>
        <button type="button" onclick="window.open('/testephp/', '_self')">Voltar</button>
    </p>
</form>

</html>

<?php

$array = criarArray();

echo "<br>Lados disponíveis: ";
printArrayL($array);

echo "<br>Numero de possibilidades: <b>[";
echo numeroCombinacoes(sizeof($array)) . "]</b><br>";

echo "<br>Exemplo de possibilidades: <b>";
// triangulos($array);

$opcoes = array(
    array($array),
    array($array),
    array($array),
);

$combinar = array();
foreach ($opcoes as $k => $v) {
    $combinar[] = $v;
}
$texto = combinacao( '', $combinar, 0 );

echo $texto;

?>