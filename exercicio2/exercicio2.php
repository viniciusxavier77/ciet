<?php
include "util/joaozinho.class.php";

use ciet\exercicio2\util\Joaozinho\Joaozinho;

$j = new Joaozinho();

if ($j::foiMordido()) {
    echo "Joãozinho mordeu o seu dedo !";
} else {
    echo "Joaozinho não mordeu o seu dedo !";
}