<form action="ex1.php" method="post">
    <p>Número de posições no array: <input value="<?php echo definePosicoes(); ?>" type="number" name="numPosicoes" /></p>
    <p>Numero de inversões: <input value="<?php echo defineInversao() ?>" type="number" name="numInversoes" /></p>
    <p><input type="submit" /></p>
</form>

<?php

echo "<br>Array antes de sofrer alteração";
printArray(criarArray());

echo "<br>Array após sofrer alteração";
printArray(criarArray());

function defineInversao()
{
    $retorno = $_POST['numInversoes'] > $_POST['numPosicoes'] ? $_POST['numPosicoes'] : $_POST['numInversoes'];
    return ($retorno < 1? 0: $retorno);
}

function definePosicoes()
{
    $retorno = $_POST['numPosicoes'];
    return ($retorno < 1? 0: $retorno);
}

function criarArray()
{
    $retorno = array();

    for($k=0; $k<definePosicoes(); $k++)
    {
        $retorno[$k] = $k+1;
    }

    return $retorno;
}

function printArray($array){
    echo "<b>[";
    for($k=0; $k<sizeof($array); $k++)
    {
        echo $array[$k] . ((($k+1)==sizeof($array))? "": ",");
    }
    echo "]</b>";
}

?>