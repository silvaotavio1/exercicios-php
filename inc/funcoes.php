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

function ordenaArray($array)
{
    $tam = sizeof($array);

    if($tam < 2)
    {
        return $array;
    }

    $pivo = $array[0];
    $aux = $pivo; //deixamos livre para troca da posicao zero
    $e = 0; //pergunta se a direita eh maior // se sim vai para a pos vazia e passa a bola // se não $e++ 
    $d = $tam - 1; //Pergunta se o numero eh menor q o pivo // Se sim vai para a pos vazia e passa a bola // se não $d -- 

    $bola = 'd';

    $cont = 0;

    while ($e <> $d) 
    {
        if ($bola == 'd') 
        {
            if ($array[$d] < $pivo) 
            {
                $array[$e] = $array[$d];
                $bola = 'e';
                $e++;
            }
            else
            {
                $d--;
            }
        }
        
        elseif ($bola == 'e') 
        {
            if ($array[$e] > $pivo) 
            {
                $array[$d] = $array[$e];
                $bola = 'd';
                $d--;
            }
            else
            {
                $e++;
            }
        }
        $cont++;

        if($cont > 5000)
            exit('erro');
    }

    echo "<br>$cont<br>";

    $array[$e] = $aux;

    return $array;
}

function quicksort(&$vet, $ini, $fim)
{
    $i = $ini;
    $j = $fim;
    $dir = 1;
    while ($i < $j) {
        if ($vet[$i] > $vet[$j]) {
            $aux = $vet[$i];
            $vet[$i] = $vet[$j];
            $vet[$j] = $aux;
            $dir = -$dir;
        }
        if ($dir == 1) {
            $j--;
        } else {
            $i++;
        }
    }
    $k = $i;
    if ($ini < $fim) {
        quicksort($vet, $ini, $k - 1);
    }
    if ($i < $fim) {
        quicksort($vet, $k + 1, $fim);
    }
}
