<?php
namespace ciet\exercicio2\util\Joaozinho;

use function rand;

class Joaozinho
{
    public static function foiMordido() {
        $numero = rand(0, 100);

        if ($numero <= 50 ) {
            return false;
        } else {
            return true;
        }
    }
}