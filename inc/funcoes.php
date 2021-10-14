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

function quicksort(&$array, $esquerda, $direita, $ordem="C")
{
    if ($esquerda < $direita) 
    {
        $pivo = divisoria($array, $esquerda, $direita, $ordem);
        quicksort($array, $esquerda, $pivo - 1, $ordem);
        quicksort($array, $pivo + 1, $direita, $ordem);
    }
}

function divisoria(&$array, $esquerda, $direita, $ordem="C")
{
    $i = $esquerda;
    $pivo = $array[$direita];
    for ($j = $esquerda; $j <= $direita; $j++) 
    {
        if (($array[$j] < $pivo && $ordem=="C") || ($array[$j] > $pivo && $ordem=="D")) 
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


//Ex3
function diferencaDatas()
{
    $dataini = $_POST['dataini'];
    $datafim = $_POST['datafim'];

    $diaini = substr($dataini, 0, 2);
    $mesini = substr($dataini, 3, 2);
    $anoini = substr($dataini, 6, 4);

    $diafim = substr($datafim, 0, 2);
    $mesfim = substr($datafim, 3, 2);
    $anofim = substr($datafim, 6, 4);

    $diasini = diasAno($anoini) + diasMes($anoini, $mesini) + $diaini;
    $diasfim = diasAno($anofim) + diasMes($anofim, $mesfim) + $diafim;

    return $diasfim - $diasini;
}

function diasAno($ano)
{
    $ano = $ano - 1;
    return $ano*365 + intval($ano/4);
}

function diasMes($ano, $mes)
{
    $dias = 0;
    $mes = $mes - 1;

    for($k=0;$k<12;$k++)
    {
        $dias_soma = 30;
        if($k%2==0 && $k<6 && $k <> 2)
        {
            $dias_soma = 31; 
        }
        if($k%2==1 && $k>=6)
        {
            $dias_soma = 31; 
        }
        if($k == 2)
        {
            if($ano%4 == 0)
            {
                $dias_soma = 29;
            }
            else
            {
                $dias_soma = 28;
            }
        }

        if($mes > $k)
        {
            $dias = $dias + $dias_soma;
        }
    }
    
   return $dias;

}


//Ex4
function arranjoSimples($k, $n=3)
{
    $fatN=0;
    for($i=$k;$i>0;$i--)
    {
        $fatN = $fatN * $i;
    }
    $k==0?$fatN=1:null;

    $j = $k - $n;
    $fatD=0;
    for($i=$j;$i>0;$i--)
    {
        $fatD = $fatD * $i;
    }
    $j==0?$fatD=1:null;

    return $fatN / $fatD;
}