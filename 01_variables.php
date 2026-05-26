<?php

/* Soy un
comentario
multilinea
*/

// Soy un comentario de una linea
# Yo también soy un comentario de una linea

$variable1 = "Soy un string";
$variable1 = "He cambiado de valor";

$VARIABLE1 = "SOY UN TEXTO EN MAYÚSCULAS";

echo $variable1 . "<br>";
print($VARIABLE1);

$yo = "Ferran";
$saludo = "Hola" . " " . $yo;
echo "<br>" . $saludo;

$variable1 = 1;

$variable1 = True;
$variable1 = true;

const PI1 = 3.14;
define("PI2", 3.14);
// PI1 = 6.28; // Es un error porque PI1 es una constante

echo "<br>";
$num1 = 1;
$num2 = 2;
echo "Suma de dos números: " . ($num1 + $num2);

echo "<br>";


$array_indexado = ['1', 2, True, [4, 5, 6]];
var_dump($array_indexado);
echo "<br>";
print_r($array_indexado);
echo "<br>";

echo gettype($variable1);
echo "<br>";
echo gettype(PI1);
echo "<br>";
$array_asociativo = ["nombre" => "Pepe"];
var_dump($array_asociativo);

$array_asociativo['nombre'] = "Maria";
echo "<br>";
echo $array_asociativo['nombre'];
$array_asociativo['edad'] = 25;
echo "<br>";
var_dump($array_asociativo);
echo "<br>";


foreach ($array_asociativo as $item) {
    echo $item . "<br>";
}

$arrayColores = ['rojo', 'verde', "azul"];
for ($i = 0; $i < count($arrayColores); $i++) {
    echo $arrayColores[$i] . "<br>";
}


echo "============================";
$iterador = 10;
while ($iterador <= 5) {
    echo $iterador . "<br>";
    $iterador++;
}

echo "============================";
echo "<br>";
$iterador = 10;
do {
    echo $iterador . "<br>";
    $iterador++;
} while ($iterador <= 5);

echo "============================";
echo "<br>";

$tiempo = "lluvioso";

if ($tiempo == "soleado") {
    echo "Me voy de paseo";
} else if ($tiempo == "lluvioso") {
    echo "A programar con PHP";
} else {
    echo "Me voy al cine";
}

echo "<br>";

switch ($tiempo) {
    case "soleado":
        echo "Me voy de paseo";
        break;
    case "lluvioso":
        echo "A programar con PHP";
        break;
    default :
        echo "Me voy al cine";
}

echo "<br>";

// echo ("1" === 1);

$num = 10.5;
echo gettype($num);
echo "<br>";
$num = (string)$num;
echo gettype($num);
echo "<br>";
$num = (int)$num;
echo gettype($num);
echo "<br>";

echo 'El número es $num';
echo "<br>";
echo "El número es $num"; // Similar a `${num}`
echo "<br>";

// MÉTODOS DE ARRAYS
print_r($arrayColores);
echo "<br>";
array_push($arrayColores, "blanco");
print_r($arrayColores);
echo "<br>";
array_unshift($arrayColores, "negro");
print_r($arrayColores);
echo "<br>";
array_pop($arrayColores);
print_r($arrayColores);
echo "<br>";
array_shift($arrayColores);
print_r($arrayColores);
echo "<br>";
unset($arrayColores[1]);
print_r($arrayColores);
echo "<br>";


$datosAlumno = ["nombre" => "Jordi", "edad" => 30, "poblacion" => "BCN"];
unset($datosAlumno['poblacion']);
$datosAlumno['ciudad'] = "Cornellà";
$datosAlumno['nombre'] = "Juan";
print_r($datosAlumno);

$nombre = $datosAlumno['nombre'];
echo "Nombre: $nombre <br>";
echo 'Nombre: ' . $nombre . '<br>';

echo "<br>";echo "<br>";
echo "<br>";echo "<br>";echo "<br>";
echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
echo "<br>";echo "<br>";echo "<br>";