<?php

//Exemplo 1
function defineInversao()
{
    $retorno = $_POST['numInversoes'] > $_POST['numPosicoes'] ? $_POST['numPosicoes'] : $_POST['numInversoes'];
    return ($retorno < 1 ? 0 : $retorno);
}

function definePosicoes()
{
    $retorno = $_POST['numPosicoes'];
    return ($retorno < 1 ? 0 : $retorno);
}

function criarArray()
{
    $retorno = array();

    for ($k = 0; $k < definePosicoes(); $k++) {
        $retorno[$k] = $k + 1;
    }

    return $retorno;
}

function printArray($array)
{
    echo "<b>[";
    for ($k = 0; $k < sizeof($array); $k++) {
        echo $array[$k] . ((($k + 1) == sizeof($array)) ? "" : ",");
    }
    echo "]</b>";
}

function inverterArray()
{
    $array = criarArray();
    $num_trocas = defineInversao();
    $num_elementos = definePosicoes(); //poderia pegar o sizeof($array)

    $distancia = $num_elementos - 1;

    for ($i = 0; $i < $num_trocas; $i++) {
        $aux = $array[0];
        for ($k = 0; $k < $distancia; $k++) {
            $array[$k] = $array[$k + 1];
        }
        $array[$k] = $aux;
    }

    return $array;
}

//Exemplo 2
function criarArrayR()
{
    $retorno = array();

    for ($k = 0; $k < definePosicoes(); $k++) {
        $retorno[$k] = rand(0, definePosicoes());
    }

    return $retorno;
}

function quicksort(&$array, $esquerda, $direita)
{
    if ($esquerda < $direita) 
    {
        $pivo = divisoria($array, $esquerda, $direita);
        quicksort($array, $esquerda, $pivo - 1);
        quicksort($array, $pivo + 1, $direita);
    }
}

function divisoria(&$array, $esquerda, $direita)
{
    $i = $esquerda;
    $pivo = $array[$direita];
    for ($j = $esquerda; $j <= $direita; $j++) 
    {
        if (($array[$j] < $pivo && $array[$j]%2==0) || ($array[$j] > $pivo && $array[$j]%2==1)) 
        {
            $temp = $array[$i];
            $array[$i] = $array[$j];
            $array[$j] = $temp;
            $i++;
        }
    }

    $temp = $array[$direita];
    $array[$direita] = $array[$i];
    $array[$i] = $temp;
    return $i;
}
