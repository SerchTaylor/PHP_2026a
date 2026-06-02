<?php


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Si registro.php detecta que se le ha enviado algo por POST
    // entra aquí

    $nombre_raw = $_POST['nombre'];
    $email_raw = $_POST['email'];
    $password_raw = $_POST['password'];
    $edad_raw = $_POST['edad'];
    $idioma_raw = $_POST['idioma'];

    print_r($_POST);
   



} else {
    // Si no hay datos envíados por el formulario
    header("Location: registro.html"); // redirigimos al formulario inicial
    exit();
}