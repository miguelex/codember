<?php

$archivo = 'encryption_policies.txt';
$bad_pass = [];

$stream= fopen($archivo, 'r');

if ($stream) {
    while (($linea = fgets($stream)) !== false) {
        // Separamos cada parte de la linea para luego obtener los datos
        $split_str = explode(' ', $linea);

        // Vamos a obtener los numeros maximos y minimos
        $limites = explode('-', $split_str[0]);
        $min = $limites[0];
        $max = $limites[1];

        // Vamos a obtener la letra que se debe buscar
        $letra = substr($split_str[1], 0, 1);

        // Vamos a obtener la contraseña
        $pass = $split_str[2];

        // Vamos a obtener la cantidad de veces que se repite la letra en la contraseña
        $cant = substr_count($pass, $letra);

        // Vamos a verificar si la cantidad de veces que se repite la letra esta entre los limites
        if ($cant < $min || $cant > $max) {
            // Si no esta entre los limites, entonces la contraseña es invalida
            // echo "La contraseña es invalida\n";
            array_push($bad_pass, $pass);
        }
    }

    fclose($stream);
    // Vamos a mostrar ahora todo el listado de contraseñas invalidas, indicando su orden en el array
    echo "Las contraseñas invalidas son:\n";
    foreach ($bad_pass as $key => $value) {
            echo $key + 1 . " - " . $value . "\n"; // El +1 no es necesario. Solo debes recordar que si tienes que encontrar la clave 41, entonces debe seleccionar la 41
    }

    
} else {
    echo "No se pudo abrir el archivo.";
}


?>