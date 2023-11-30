<?php

$archivo = 'files_quarantine.txt';
$files_ok = [];

$stream= fopen($archivo, 'r');

if ($stream) {
    while (($linea = fgets($stream)) !== false) {
        // Separamos cada parte de la linea para luego obtener los datos
        $split_str = explode('-', $linea);

        // Vamos a recorrer $split_str[0] buscando solo aquellos caracteres alfabeticos que este una unica vez. Si solo aparece una vez, lo insertamos en una cadena. Una vez recorrido todo $split_str[0], compararemos la cadena resutlante con $split_str[1]. Si el resultado es true, insertaremos $split_str[1] en $files_ok y leeremos la sigueitne linea
        $cadena = '';
        for ($i=0; $i < strlen($split_str[0]); $i++) { 
            $caracter = $split_str[0][$i];
            if (substr_count($split_str[0], $caracter) == 1) {
                $cadena .= $caracter;
            }
        }

        // Ahora comparamos $cadena con $split_str[1]. Si el resultado es true (son iguales), la insertamos en $files_ok
        if (trim($cadena) === trim($split_str[1])) {
            array_push($files_ok, $split_str[1]);
        }

    }

    fclose($stream);
    
    // Imprimimos el resultado
    foreach ($files_ok as $key => $value) {
        echo $key + 1 . " - " . $value . "\n";
    }

    
} else {
    echo "No se pudo abrir el archivo.";
}


?>