<?php

// Tipado dinámico
$variable = 1;
$variable = 1.2;
$variable = true;
$variable = True;

// Conversiones de tipo en caliente
$num1 = 3; // integer
$num2 = "2"; // string

echo $num1 + $num2;
echo "<br>";
echo $num1 . $num2;
echo "<br>";

// Métodos de Strings

$string = "Soy un string";

// strlen($string) -> Contar caracteres
echo 'La variable $string tiene '. strlen($string) . " caracteres";
echo "<br>";

// strtoupper($string) -> Convierte en mayúsculas
echo 'El string pasado a mayúsculas: ' . strtoupper($string);
echo "<br>";
$string = strtoupper($string);
echo $string;
echo "<br>";

// strtolower($string) -> Convierte en mayúsculas
echo 'El string pasado a minúsculas: ' . strtolower($string);
echo "<br>";
$string = strtolower($string);
echo $string;
echo "<br>";

// ucfirst($string) -> Poner en mayúsculas la primera letra del string
echo ucfirst($string);
echo "<br>";

// ucwords($string) -> Poner todas las iniciales de la palabras en mayúsculas
echo ucwords($string);
echo "<br>";

// strrev($string) -> Invertir el string
echo strrev($string);
echo "<br>";

// trim($string) -> Elimina los espacios al principio y al final
$string2 = "      String           ";
echo "El string original tiene " . strlen($string2) . " caracteres <br>";
$string2 = trim($string2);
echo "El string corregido con trim() tiene " . strlen($string2) . " caracteres <br>";
echo "<br>";
// rtrim($string) -> right trim -> quita espacios solo por la derecha
// ltrim($string) -> left trim -> quita espacios solo por la izquierda

// sustituir caracteres en el string
$ejemplo = "Abracadabra";
echo str_replace("a", "i", $ejemplo);
echo "<br>";

// explode() -> Pasar el string a array
$texto = "En un lugar de la Mancha de cuyo nombre";
$arrayTexto = explode(" ", $texto);
print_r($arrayTexto);
echo "<br>";

// implode() -> Pasar un array a string
$textoRecuperado = implode(" - ", $arrayTexto);
echo $textoRecuperado;
echo "<br>";

// Un formulario devuelve la fecha en formato internacional 2026-05-27 (YY-MM-DD)
// Necesitamos que aparezca así: Hoy es 27-05-2026
$fechaFormulario = "2026-05-27";
$arrayFecha = explode("-", $fechaFormulario);
print_r($arrayFecha);
$fechaCorregida = $arrayFecha[2] . "-" . $arrayFecha[1] . "-" . $arrayFecha[0];
echo $fechaCorregida;


