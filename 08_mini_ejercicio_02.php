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


function venderProducto($nombreProducto, $cantidadAVender) {

}
// ¿Cuál es el beneficio ahora?
// Muestra el contenido de $productos


// 3. Crea una función para comprar productos.
// Nota1 : No podemos gastar más dinero del que tenemos.
// Nota2 : Si el producto ya está en $productos 
// se incorporan los datos, pero NO duplicamos el producto.
// Nota3 : Si el producto no está lo añadimos.
// Nota4 : Hay que actualizar el $cash y el beneficio después de la compra.
function comprarProducto($productos, $nombreProducto, $cantidadAComprar, $precioCompra, $precioVenta, $unidad) {

}

comprarProducto()

// ¿Cuál es el beneficio ahora?
// ¿Cuánto queda en $cash?
// Muestra el contenido de $productos


// 4. Guardar los datos de los productos  para que tengan persistencia

// 5. Guardar las operaciones de compra-venta

// 6. Mostrar en una tabla de un fichero HTML las operaciones realizadas