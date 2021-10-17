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

function quicksort(&$array, $esquerda, $direita, $ordem = "C")
{
    if ($esquerda < $direita) {
        $pivo = divisoria($array, $esquerda, $direita, $ordem);
        quicksort($array, $esquerda, $pivo - 1, $ordem);
        quicksort($array, $pivo + 1, $direita, $ordem);
    }
}

function divisoria(&$array, $esquerda, $direita, $ordem = "C")
{
    $i = $esquerda;
    $pivo = $array[$direita];
    for ($j = $esquerda; $j <= $direita; $j++) {
        if (($array[$j] < $pivo && $ordem == "C") || ($array[$j] > $pivo && $ordem == "D")) {
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
    return $ano * 365 + intval($ano / 4);
}

function diasMes($ano, $mes)
{
    $dias = 0;
    $mes = $mes - 1;

    for ($k = 0; $k < 12; $k++) {
        $dias_soma = 30;
        if ($k % 2 == 0 && $k < 6 && $k <> 2) {
            $dias_soma = 31;
        }
        if ($k % 2 == 1 && $k >= 6) {
            $dias_soma = 31;
        }
        if ($k == 2) {
            if ($ano % 4 == 0) {
                $dias_soma = 29;
            } else {
                $dias_soma = 28;
            }
        }

        if ($mes > $k) {
            $dias = $dias + $dias_soma;
        }
    }

    return $dias;
}


//Ex4
function printArrayL($array)
{
    if (isset($array)) {
        $letras = array('', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
        echo "<b>[";
        for ($k = 0; $k < sizeof($array); $k++) {
            echo $letras[$array[$k]] . ((($k + 1) == sizeof($array)) ? "" : ",");
        }
        echo "]</b>";
    }
}

function numeroCombinacoes($n, $k = 3)
{
    //n!
    $n <= 0 ? $n = 0 : null;

    $fatN = $n;
    for ($i = $n; $i > 1; $i--) {
        $fatN = $fatN * ($i - 1);
    }

    //k!
    $k < 3 ? $k = 0 : null;

    $fatD0 = $k;
    for ($i = $k; $i > 1; $i--) {
        $fatD0 = $fatD0 * ($i - 1);
    }

    //(n - k)!
    $j = $n - $k;
    $j <= 0 ? $j = 1 : null;

    $fatD1 = $j;
    for ($i = $j; $i > 1; $i--) {
        $fatD1 = $fatD1 * ($i - 1);
    }

    //k! / n!(n - k)!
    return intval($fatN / ($fatD0 * $fatD1));
}

function combinacoes($array, $k = 3)
{
    if ($k === 0) {
        return array(array());
    }
    if (count($array) === 0) {
        return array();
    }

    echo "<br><br>";

    $x = $array[0];
    echo '<br> $x: ';
    print_r($x);

    $array1 = cortarArray($array, 1, (sizeof($array) - 1));

    echo '<br> Antes da recursividade $array: ';
    print_r($array);
    $res1 = combinacoes($array1, $k - 1); //Fica aqui até $k == 0

    for ($i = 0; $i < sizeof($res1); $i++) {
        echo '<br> $res1[' . $i . ']: ';
        print_r($res1[$i]);
        $res1[$i] = juntarArrays(array($x), $res1[$i]);
        echo '<br> $res1[' . $i . ']: ';
        print_r($res1[$i]);
    }

    echo '<br> $array1: ';
    print_r($array1);
    $res2 = combinacoes($array1, $k);

    echo '<b><br><br><br>Final da function <br>$res1: ';
    print_r($res1);
    echo '<br> $res2: ';
    print_r($res2);
    echo "</b>";

    return juntarArrays($res1, $res2);
}

function cortarArray($array, $de, $ate) //Similar ao array_slice
{
    $arrayRetorno = array();
    $i = 0;
    for ($k = $de; $k <= $ate; $k++) {
        $arrayRetorno[$i] = $array[$k];
        $i++;
    }
    return $arrayRetorno;
}

function juntarArrays($x, $y)
{
    $arrayRetorno = array();
    $arrayRetorno = $x;
    $i = sizeof($x);

    for ($k = 0; $k < sizeof($y); $k++) {
        $arrayRetorno[$i] = $y[$k];
        $i++;
    }

    return $arrayRetorno;
}




//Ex5
function verificaSubTexto($texto, $subTexto)
{
    $cont = 0;
    $tamTexto = strlen($texto);
    $tamSubTexto = strlen($subTexto);

    $k = '';
    for ($k = 0; $k < $tamTexto - $tamSubTexto; $k++) {
        // echo "Elemento de comparaçao: " . substr($texto, $k, $tamSubTexto) . '<br>';
        // echo "Elemento de impressao: " . substr($texto, $k, 1) . '<br>';

        $aux = false;
        $comparacao = substr($texto, $k, $tamSubTexto);
        if ($comparacao == $subTexto) {
            $aux = true;
            $cont = $tamSubTexto - 1;
            echo "<b>" . $comparacao . "</b>";
        } elseif ($cont > 0) {
            $cont--;
        } else {
            echo substr($texto, $k, 1);
        }
    }

    // echo '<br> cont= ' . $cont . '<br>';
    echo substr(substr($texto, $k), $cont);

    // echo "fimstr: " . substr($texto, $k) . '<br><br><br>';
}


//Ex6
function sobreposicaoRetangulos($coordenadas1, $coordenadas2)
{
    if(!isset($coordenadas1))
    {
        $coordenadas1 = array(array(0, 0), array(2, 2), array(2, 0), array(0, 2));
    }
    if(!isset($coordenadas2))
    {
        $coordenadas2 = array(array(1, 0), array(1, 2), array(6, 0), array(6, 2));
    }
}