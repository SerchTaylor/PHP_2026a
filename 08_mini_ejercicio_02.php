<?php

// Vamos a trabajar para una frutería.

$metalico = 500;
$impuestos = 0.15; // porcentaje de la venta
$gastos = 0.25; // porcentaje de la venta

$productos = [
    [
        "nombre" => "kiwi",
        "precioCompra" => 1.5,
        "precioVenta" => 2.8,
        "cantidadVendida" => 150,
        "stockActual" => 20,
        "unidad" => "kg"
    ],
    [
        "nombre" => "manzana",
        "precioCompra" => 0.8,
        "precioVenta" => 1.7,
        "cantidadVendida" => 200,
        "stockActual" => 120,
        "unidad" => "kg"
    ],
    [
        "nombre" => "fresa",
        "precioCompra" => 2.5,
        "precioVenta" => 4.9,
        "cantidadVendida" => 180,
        "stockActual" => 5,
        "unidad" => "kg"
    ],
];

// 1. ¿Cuál es el beneficio actual?
function obtenerBeneficio() {}

$beneficio = obtenerBeneficio();
echo "El beneficio actual es de $beneficio €";

// 2. Crea una función para vender productos.
// Nota1: el producto debe existir en el array $productos.
// Si no es así, muestra un mensaje indicándolo.
// Nota2: acuérdate de actualizar el stock.
// Nota3: no podemos vender el producto si no hay suficiente stock.


function venderProducto() {

}
// ¿Cuál es el beneficio ahora?