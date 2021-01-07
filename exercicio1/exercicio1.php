<?php
//Array de capitais
$arrayCapitais = array("Brasil" => "Brasília",
                       "EUA" => "Washington",
                       "Espanha" => "Madrid",
                       "Inglaterra" => "Londres",
                       "Argentina" => "Buenos Aires");

//Ordena por ordem alfabética
sort($arrayCapitais);

//Array de países, posições de acordo com a ordenação das capitais
$paises = array(0 => "Brasil",
                1 => "Argentina",
                2 => "Inglaterra",
                3 => "Espanha",
                4 => "EUA");

//Percorre o array e exibe o nome do país e capital
foreach ($arrayCapitais as $chave => $capital) {

    if ($paises[$chave] == "Brasil") {
        echo "A capital do ". $paises[$chave] . " é " . $capital. "<br>";
    } else if ($paises[$chave] == "EUA") {
        echo "A capital dos ". $paises[$chave] . " é " . $capital. "<br>";
    } else {
        echo "A capital da ". $paises[$chave] . " é " . $capital. "<br>";
    }
}


