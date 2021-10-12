<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Menu Dropdown Horizontal - Linha de Código</title>
    <!-- Aqui chamamos o nosso arquivo css externo -->
    <link rel="stylesheet" type="text/css" href="estilo.css" />
</head>

<body>
    <nav>
        <ul class="menu">


            <li><a href="#">Exemplos</a>
                <ul><?php
                    for ($k = 1; $k <= 7; $k++) {
                        echo '<li><a href="ex' . $k . '.php">Ex ' . $k . '</a></li>';
                    }
                    ?>
                </ul>
            </li>
            <li><a href="https://github.com/silvaotavio1/exercicios-php">Reposiorio</a></li>
            <!-- <li><a href="#">Ex 1</a></li> -->
            <!-- 
	         	<ul>
	                  <li><a href="#">Web Design</a></li>
	                  <li><a href="#">SEO</a></li>
	                  <li><a href="#">Design</a></li>
	       		</ul>
			</li> -->

        </ul>
    </nav>
</body>

</html>