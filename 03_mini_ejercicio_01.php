<?php

// Dado este array:
$frutas = [
    ["manzana", 2.5],
    ["ciruela", 3.3],
    ["cerezas", 4.5],
    ["kiwi", 3.8],
    ['mango', 4.6]
];
// $frutas[] = ["naranja", 2.5];
// $frutas[] = ["limón", 2.5];

// $frutas = [];


// ¿Cuál es la fruta más barata?
/*
if (count($frutas) === 0) {
    echo "No hay frutas en la lista";
} else {
    $frutaMasBarata = $frutas[0];

    for ($i = 1; $i < count($frutas); $i++) {
        if ($frutas[$i][1] < $frutaMasBarata[1]) {
            $frutaMasBarata = $frutas[$i];
        }
    }

    echo "La fruta más barata és : " . $frutaMasBarata[0];
}
*/
if (count($frutas) === 0) {
    echo "No hay frutas en la lista";
} else {
    $frutaMasBarata = $frutas[0];
    $frutasMasBaratas = [];

    foreach ($frutas as $fruta) {
        if ($fruta[1] < $frutaMasBarata[1]) {
            $frutaMasBarata = $fruta;
        }
    }

    foreach ($frutas as $fruta) {
        if ($frutaMasBarata[1] === $fruta[1]) {
            $frutasMasBaratas[] = $fruta[0];
        }
    }
    echo "La fruta más barata és : " . implode(", ", $frutasMasBaratas);
}


// ¿Cuál es la fruta más cara?

// ¿Cuál es el promedio de los precios?

$frutas = [];

/*
if (count($frutas) === 0) {
    echo "<br>No hay frutas en la lista";
} else {
    $suma = 0;

    foreach ($frutas as $fruta) {
        $suma += $fruta[1];
    }

    $promedio = $suma / count($frutas);

    echo "<br>El promedio de los precios es $promedio<br>";
}
*/


// try - catch
try {
    $suma = 0;

    foreach ($frutas as $fruta) {
        $suma += $fruta[1];
    }

    $promedio = $suma / count($frutas);

    echo "<br>El promedio de los precios es $promedio<br>";

} catch (Error) {
    // echo $err;
    echo "<br>No hay frutas en la lista<br>";
}


echo "<br>Estoy al final del programa<br>";

