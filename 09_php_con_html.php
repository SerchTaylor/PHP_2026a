<?php
// echo "Mensaje enviado desde PHP";
$nombre = "Michel";
$apellido = "Parker";

$hoy = new DateTime();
$mes = $hoy->format('m');
// echo "El mes es ".$mes;
$fechaCompleta = $hoy->format('d-m-Y H:i:s');

$arrayCoches = ['Mercedes', "SEAT", "Toyota", "Ford"];
array_push($arrayCoches, "Audi");
$arrayCoches[] = "BMW";

// print_r($arrayCoches);
$mascotas = [
    ["especie" => "perro", "nombre" => "Bup", "edad" => 3, "dueño" => "Peter"],
    ["especie" => "gato", "nombre" => "Mishi", "edad" => 2, "dueño" => "Louise"],
    ["especie" => "conejo", "nombre" => "Alabrasa", "edad" => 1, "dueño" => "Clark"],
    ["especie" => "pulpo", "nombre" => "Neptuno", "edad" => 1, "dueño" => "Neptuno"]
];
$mascotas[] = ["especie" => "vaca", "nombre" => "Mariana", "edad" => 4, "dueño" => "Michel"];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML</title>
    <style>
        body {
            padding: 5rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: .5rem;
            text-align: left;
        }
    </style>
    <script>

    </script>
</head>

<body>
    <h1>Soy el fichero 09</h1>
    <p><?php echo "Eres " . $nombre . " " . $apellido; ?></p>
    <p><?= "Eres " . $nombre . " " . $apellido; ?></p>
    <p style="color:darkred"><?= $fechaCompleta ?> </p>

    <h2>FOREACH</h2>
    <p>Marcas de coches</p>
    <ul>
        <?php foreach ($arrayCoches as $coche) { ?>
            <li> <?= $coche; ?> </li>
        <?php } ?>
        <p>Otra sintaxis</p>
        <?php foreach ($arrayCoches as $coche) : ?>
            <li> <?= $coche; ?> </li>
        <?php endforeach ?>
        <p>Otra más</p>
        <?php foreach ($arrayCoches as $coche) : ?>
            <?= "<li>" . $coche . "</li>"; ?>
        <?php endforeach ?>
    </ul>

    <h2>IF</h2>
    <?php if ($nombre === "Peter") { ?>
        <p><?= "Hola, Peter, te recuerdo que me debes 20€"; ?></p>
    <?php } else { ?>
        <p><?= "Hola, Pepi, gracias por el préstamo."; ?></p>
    <?php } ?>
    <p>otra forma de trabajar con if</p>
    <?php if ($nombre === "Peter") : ?>
        <p><?= "Hola, Peter, te recuerdo que me debes 20€"; ?></p>
    <?php  else : ?>
        <p><?= "Hola, Pepi, gracias por el préstamo."; ?></p>
    <?php endif ?>

    <h2>SWITCH</h2>
    <?php switch($nombre) { 
        case "Peter" :
            echo "<p>Me debes 20€</p>";
            break;
        case "Pepi" :
            echo "<p>¿Cómo estás?</p>";
            break;
        case "Clark":
            echo "¿Aún no te han echado del periódico?";
            break;
        default:
            echo "Hola, bienvenido/a;";
      } ?>

      <!-- 
        Invierno : diciembre, enero, febrero
        Primavera : marzo, abril, mayo
        Verano : junio, julio, agosto
        Otoño : septiembre, octubre, diciembre 

        El mensaje será : Estamos en primavera
        -->

        <h2>Tabla para las mascotas</h2>
        <table border="1">
            <tr>
                <th>Especie</th>
                <th>Nombre de la mascota</th>
                <th>Edad</th>
                <th>Nombre del dueño</th>
            </tr>
            <?php foreach($mascotas as $mascota) : ?>
                <tr>
                    <td><?= $mascota['especie'] ?></td>
                    <td><?= $mascota['nombre'] ?></td>
                    <td><?= $mascota['edad'] ?></td>
                    <td><?= $mascota['dueño'] ?></td>
                </tr>
            <?php endforeach ?>
        </table>

</body>

</html>