<?php

$num1 = 3.7;

if (is_double($num1)) {
    echo "La variable " . $num1 . " es un decimal";
} elseif (is_string($num1)) {
    echo "La variable " . $num1 . " es un string";
} elseif (is_integer($num1)) {
     echo "La variable " . $num1 . " es un entero";
} else {
    echo "El número NO es un decimal";
}

echo "<br>";

if (is_numeric($num1)) {
echo "la variable es un número";
}
