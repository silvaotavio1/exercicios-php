<?php
include("inc/funcoes.php");
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Exercicio 6</title>
</head>

<form action="ex6.php" method="post">
    <?php
    for ($i = 1; $i <= 2; $i++) {
        for ($j = 1; $j <= 4; $j++) {
            echo '<p>x[' . $i . '][' . $j . ']: <input value="' . $_POST['x' . $i . $j] . '" type="number" name="x' . $i . $j . '" />';
            echo 'y[' . $i . '][' . $j . ']: <input value="' . $_POST['y' . $i . $j] . '" type="number" name="y' . $i . $j . '" /></p>';
        }
        echo "<br><br>";
    }
    ?>
    <p>
        <button type="submit">Executar</button>
        <button type="button" onclick="window.open('/testephp/', '_self')">Voltar</button>
    </p>
</form>

</html>

<?php

$coordenadas1 = array();
$coordenadas2 = array();
$coordenadas = array($coordenadas1, $coordenadas2);

for ($i = 0; $i < 2; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $coordenadas[$i][$j] = array($_POST['x' . $i . $j], $_POST['y' . $i . $j]);
    }
}

if(!isset($_POST['x11']))
{
    $coordenadas[0] = null;
}
if(!isset($_POST['x21']))
{
    $coordenadas[1] = null;
}

echo "<br>Área da sobreposição: ";
sobreposicaoRetangulos($coordenadas[0], $coordenadas[1]);

?>