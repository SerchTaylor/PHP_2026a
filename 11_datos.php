<?php

echo "Datos del formulario";
print_r($_GET);
print_r($_POST);

if ($_GET) {
    echo "Datos enviados por GET";
    echo "<br>El nombre es " . $_GET['nombre'];
    echo "<br>El apellido es " . trim($_GET['apellido']);
    echo "<br>El email es " . $_GET['email'];
    echo "<br>La contraseña es " . $_GET['password'];
    echo "<br>La fecha es " . $_GET['fecha'];
    echo "<br>El color es " . $_GET['color'];
}
if ($_POST) {
    echo "<br>Datos enviados por POST";
    echo "<br>El nombre es " . $_POST['nombre'];
    echo "<br>El apellido es " . $_POST['apellido'];
    echo "<br>El email es " . $_POST['email'];
    echo "<br>La contraseña es " . $_POST['password'];
    echo "<br>La fecha es " . $_POST['fecha'];
    echo "<br>El color es " . $_POST['color'];
}
if ($_REQUEST) {
    echo "<br>Datos enviados por REQUEST";
    echo "<br>El nombre es " . $_REQUEST['nombre'];
    echo "<br>El apellido es " . $_REQUEST['apellido'];
    echo "<br>El email es " . $_REQUEST['email'];
    echo "<br>La contraseña es " . $_REQUEST['password'];
    echo "<br>La fecha es " . $_REQUEST['fecha'];
    echo "<br>El color es " . $_REQUEST['color'];
}


// $_GET