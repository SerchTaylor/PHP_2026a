<?php

// Hay dos tipos de números:
// Integer (enteros)
// Double (decimales)

// Funciones matemáticas básicas:
// +, -, *, /, %, **(exponente)
echo 2**3;
echo "<br>";

// abs($number)
echo "El valor absoluto de -5 es " . abs(-5);
echo "<br>";

// Redondeo
echo "Redondeo de 3.1415 es " . round(3.1415);
echo "<br>";
echo "Redondeo de 3.1415 es " . round(3.1415, 2);
echo "<br>";

echo "Redondeo por abajo (floor) : " .floor(3.98);
echo "<br>"; 
echo "Redondeo por arriba (ceil) : " .ceil(3.14);
echo "<br>"; 

// Máximo - Mínimo
echo "Número mínimo de la serie : " . min(1, 2, 3, 4, 5);
echo "<br>"; 
echo "Número máximo de la serie : " . max(1, 2, 3, 4, 5);
echo "<br>"; 

// Generar un número aleatorio
echo "un número aleatorio entre 1 y 10 : " . rand(1, 10);
echo "<br>"; 