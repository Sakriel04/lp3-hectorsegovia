<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ejercicio de Fecha</h2><br><br><br>
    <?php
        date_default_timezone_set('America/Asuncion');
        $dia_ingles = date('D');

        if ($dia_ingles == 'Sun') {
            $dia_esp = 'Domingo';
        } elseif ($dia_ingles == "Mon"){
            $dia_esp = 'Lunes';
        } elseif ($dia_ingles == "Tue"){
            $dia_esp = 'Martes';
        } elseif ($dia_ingles == "Wed"){
            $dia_esp = 'Miércoles';
        } elseif ($dia_ingles == "Thu"){
            $dia_esp = 'Jueves';
        } elseif ($dia_ingles == "Fri"){
            $dia_esp = 'Viernes';
        } elseif ($dia_ingles == "Sat"){
            $dia_esp = 'Sábado';
        }

        echo "El día de la semana es $dia_esp";
    ?>
</body>
</html>