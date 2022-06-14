<!--
File: calc.php
Author: Tamás Domán
Copyright: 2022, Tamás Domán
Group: Szoft I N
Date: 2022-06-14
Github: https://github.com/DomanTom07/
Licenc: GNU GPL
-->

<?php

echo file_get_contents('templates/head.html');
echo file_get_contents('templates/nav.html');
$page = file_get_contents('templates/calc.html');

function calcVolume ($a, $b, $c) {
    $volume = (4 / 3) * pi() * $a * $b * $c;
    return $volume;
}

if (!empty($_GET['a']) and
    !empty($_GET['b']) and
    !empty($_GET['c']))
{
    if (is_numeric($_GET['a']) and
        is_numeric($_GET['b']) and
        is_numeric($_GET['c']))
    {
        $a = $_GET['a'];
        $b = $_GET['b'];
        $c = $_GET['c'];
    
        $volume = calcVolume($a, $b, $c);
    
        $page = str_replace('{{ result }}', $volume, $page);
    } else {
        $volume = "Hiba! A megadott adatok nem számok!";

        $page = str_replace('{{ result }}', $volume, $page);
    }
} else {
    $volume = "Hiba! Üresen hagyott mezők!";

    $page = str_replace('{{ result }}', $volume, $page);
}

echo $page;
echo file_get_contents('templates/foot.html');

?>