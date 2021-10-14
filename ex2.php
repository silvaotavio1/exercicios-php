<?php
include("inc/funcoes.php");
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Exercicio 2</title>
</head>

<form action="ex2.php" method="post">
    <p>Número de posições no array: <input value="<?php echo definePosicoes(); ?>" type="number" name="numPosicoes" /></p>
    <p>
        <button type="submit">Executar</button>
        <button type="button" onclick="window.open('/testephp/', '_self')">Voltar</button>
    </p>
</form>

</html>

<?php

$array = criarArrayR();

echo "<br>Array antes de sofrer alteração: ";
printArray($array); //criando array aleatorio para ordernar

echo "<br>Array após sofrer alteração: ";

$cont_pares = 0;
$cont_impares = 0;
$pares = $array();
$impares = $array();

for ($k = 0; $k < sizeof($array); $k++) 
{
    if ($array[$k] % 2 == 0) 
    {
        $pares[$cont_pares] = $array[$k];
        $cont_pares++;
    } 
    else 
    {
        $impares[$cont_impares] = $array[$k];
        $cont_impares++;
    }
}

quicksort($pares, 0, sizeof($pares) - 1, "C");
quicksort($impares, 0, sizeof($impares) - 1, "D");

$k;
for ($k = 0; $k < sizeof($pares); $k++) 
{
    $array[$k] = $pares[$k];
}
for ($k = $k; $k<sizeof($pares) + sizeof($impares);$k++)
{
    $array[$k] = $impares[$k - sizeof($pares)];
}

printArray($array);

?>