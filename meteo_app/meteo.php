<?php

// Obtener la clave de acceso a OpenWeatherMap
require_once "KEY.php"; // la clave está en $API_KEY

// Datos de prueba de la URL
$city = "Barcelona";
$countryCode = "ES";
$units = "units=metric";
$lang = "lang=es";

$URL = "https://api.openweathermap.org/data/2.5/weather?q=$city,$countryCode&$units&$lang&appid=$API_KEY";
echo $URL;
echo "<br><br>";

$file = file_get_contents($URL);

if ($file === false) {
    echo "Error al obtener los datos de OpenWeather";
    exit();
}

$json_meteo = json_decode($file, true);

if ($json_meteo === null) {
    echo "Error al descodificar los datos de la URL";
    exit();
}

$description = $json_meteo["weather"][0]['description'];
$icon = $json_meteo["weather"][0]['icon'];
$temp = $json_meteo['main']['temp'];
$feels_like = $json_meteo['main']['feels_like'];
$temp_min = $json_meteo['main']['temp_min'];
$temp_max = $json_meteo['main']['temp_max'];
$humidity = $json_meteo['main']['humidity'];
$wind = $json_meteo['wind']['speed'];


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My meteo</title>
</head>
<body>

    <p><?= $city ?></p>
    <p><?= $temp ?></p>
    
</body>
</html>



