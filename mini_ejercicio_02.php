<?php

/*
Tenemos que hacer una aplicación para una frutería.
Disponemos de una cantidad inicial para invertir y un stock de productos
*/



$cashInicial = 500;
$impuestos = 0.10;
$gastos = 0.20;
$productos = [
    ["nombre" => "kiwi", "precioCompra" => 1.5, "precioVenta" => 2.8, "cantidadVendida" => 100, "stockActual" => 50],
    ["nombre" => "manzana", "precioCompra" => 0.8, "precioVenta" => 1.8, "cantidadVendida" => 200, "stockActual" => 18],
    ["nombre" => "fresa", "precioCompra" => 2.8, "precioVenta" => 4.8, "cantidadVendida" => 150, "stockActual" => 5]
];


$beneficio = beneficioActual($gastos, $impuestos, $productos);
$cash = $cashInicial + $beneficio;
echo "El beneficio actual es: " . beneficioActual($cash, $gastos, $impuestos, $productos) . "<br>";
echo "El cash actual es: $cash <br>";

function beneficioActual($gastos, $impuestos, $productos)
{
    $beneficio = 0;
    foreach ($productos as $producto) {
        $beneficio += ($producto["precioVenta"] - $producto["precioCompra"]) * $producto["cantidadVendida"];
    }
    $percentaje_costes = $gastos + $impuestos;
    $beneficio = $beneficio * (1 - $percentaje_costes);

    return $beneficio;
}

function venderProductos(&$productos, $nombre_producto, $cantidad_vendida, &$cash, $gastos, $impuestos)
{
    foreach ($productos as &$producto) {
        if ($producto["nombre"] === $nombre_producto) {
            echo "===================================================================================================================<br>";
            if ($producto["stockActual"] < $cantidad_vendida) {

                echo "No hay suficiente stock para vender $cantidad_vendida kg de $nombre_producto. Stock actual: " . $producto["stockActual"] . "kg <br>";
                return;
            }
            $producto["stockActual"] -= $cantidad_vendida;
            $producto["cantidadVendida"] += $cantidad_vendida;

            echo "El stock actual de $nombre_producto es: " . $producto["stockActual"] . "kg <br>";
            echo "La cantidad total vendida de $nombre_producto es: " . $producto["cantidadVendida"] . "kg <br>";
            $beneficio = beneficioActual($gastos, $impuestos, $productos);
            $cash += $beneficio;
            echo "El cash actual es: " . round($cash, 2) . "<br>";

            break;
        }
    }
}

venderProductos($productos, "kiwi", 30, $cash, $gastos, $impuestos);

venderProductos($productos, "fresa", 6, $cash, $gastos, $impuestos);

function comprarProductos(&$productos, $nombre_producto, $cantidad_comprada, $precio_compra, $precio_venta, &$cash, $gastos, $impuestos)
{
    $producto_nuevo = true;

    echo "===================================================================================================================<br>";

    foreach ($productos as &$producto) {


        if ($producto["nombre"] === $nombre_producto) {
            $producto_nuevo = false;
            $costo_compra = $producto["precioCompra"] * $cantidad_comprada;
            if ($cash < $costo_compra) {
                echo "No hay suficiente cash para comprar $cantidad_comprada kg de $nombre_producto. Cash actual: " . round($cash, 2) . "<br>";
                return;
            }
            $producto["stockActual"] += $cantidad_comprada;
            $cash -= $costo_compra;

            echo "El stock actual de $nombre_producto es: " . $producto["stockActual"] . "kg <br>";

            $beneficio = beneficioActual($cash, $gastos, $impuestos, $productos);
            $cash += $beneficio;
            echo "El cash actual es: " . round($cash, 2) . "<br>";

            break;
        }
    }
    if ($producto_nuevo) {
        if ($cash < $precio_compra * $cantidad_comprada) {
            echo "No hay suficiente cash para comprar $cantidad_comprada kg de $nombre_producto. Cash actual: " . round($cash, 2) . "<br>";
            return;
        }

        $producto_nuevo = ["nombre" => $nombre_producto, "precioCompra" => $precio_compra, "precioVenta" => $precio_venta, "cantidadVendida" => 0, "stockActual" => $cantidad_comprada];
        $productos[] = $producto_nuevo;
        $cash -= $precio_compra * $cantidad_comprada;

        echo "El stock actual de $nombre_producto es: " . $cantidad_comprada . "kg <br>";

        $beneficio = beneficioActual($cash, $gastos, $impuestos, $productos);
        $cash += $beneficio;
        echo "El cash actual es: " . round($cash, 2) . "<br>";
    }
}
comprarProductos($productos, "fresa", 10, 0, 0, $cash, $gastos, $impuestos);

comprarProductos($productos, "cereza", 100, 4.5, 9.8, $cash, $gastos, $impuestos);
