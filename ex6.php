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

$coord_x1 = array();
$coord_y1 = array();
$coord_x2 = array();
$coord_y2 = array();

for ($j = 1; $j <= 4; $j++) {
    $coord_x1[$j] = $_POST['x1' . $j];
    $coord_y1[$j] = $_POST['y1' . $j];
    $coord_x2[$j] = $_POST['x2' . $j];
    $coord_y2[$j] = $_POST['y2' . $j];
}

echo "<pre>";
print_r($coord_x1);
echo "<br>";
print_r($coord_y1);
echo "<br>";
print_r($coord_x2);
echo "<br>";
print_r($coord_y2);
echo "<br>";

if (empty($_POST['x11'])) {
    $coord_x1 = array();
}

echo "<br>Área da sobreposição: ";
echo sobreposicaoRetangulos($coord_x1, $coord_y1, $coord_x2, $coord_y2);
echo " m²";

?>