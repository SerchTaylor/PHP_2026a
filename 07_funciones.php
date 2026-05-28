<?php

saludar();
saludar2("Clark Kent");
echo saludar3("Clark Kent");
$saludo = saludar3("Clark Kent");
echo $saludo;

function saludar() {
    echo "Buenas tardes!"."<br>";
}

function saludar2 ($nombre) {
    echo "Buenas tardes ".$nombre."!"."<br>";
}

function saludar3($nombre) {
    return "Buenas tardes ".$nombre."!"."<br>";
}

// ===================================================================

$nombre = "Maria";

saludar4();

function saludar4() {
    GLOBAL $nombre;
    echo "Hola ".$nombre."<br>";
}

$saldo = 100;

function modificarSaldo($modificador, &$saldo) {
    $saldo += $modificador;
    return $saldo;
}

echo modificarSaldo(200, $saldo);
echo "<br>";
echo modificarSaldo(200, $saldo);
echo "<br>";

function mostrarAlumnos($nombre, $apellido) {
    static $posicion = 1;
    echo "<br>$posicion. $nombre $apellido";
    $posicion++;
}

mostrarAlumnos("Son", "Goku");
mostrarAlumnos("Steve", "Jobs");
mostrarAlumnos("Jeff", "Bezos");

// ===================================================

function sumar ($num1, $num2) {
    return $num1 + $num2;
}

$sumar2 = function ($num1, $num2) {
    return $num1 + $num2;
};

echo "<br>";
echo $sumar2(1, 3);
echo "<br>";



