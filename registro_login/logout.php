<?php

// iniciar la sesión para pòder destruirla
session_start();

// vaciar lo que haya en $_SESSION
$_SESSION = [];

// destruir la sesión
session_destroy();

// redirigir el usuario al inicio
header('Location: login.html');

exit();