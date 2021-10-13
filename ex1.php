<form action="ex1.php" method="post">
    <p>Número de posições no array: <input value="<?php echo $_POST['numPosicoes']; ?>" type="number" name="numPosicoes" /></p>
    <p>Numero de inversões: <input value="<?php echo defineInversao() ?>" type="number" name="numInversoes" /></p>
    <p><input type="submit" /></p>
</form>

<?php

echo "<br><pre>";
print_r($_POST);

function defineInversao()
{
    $retorno = $_POST['numInversoes'] > $_POST['numPosicoes'] ? $_POST['numPosicoes'] : $_POST['numInversoes'];
    return ($retorno < 1? 0: $retorno);
}

?>