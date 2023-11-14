<?php

    $archivo = fopen('message_01.txt', 'r');

    if ($archivo) {
        // Lee el contenido del archivo
        $contenido = fread($archivo, filesize('message_01.txt'));
        
        // Cierra el archivo
        fclose($archivo);
        
        // Separa las palabras por espacios
        $palabras = explode(' ', $contenido);
        $conteoPalabras = array();
        
        // Itera sobre las palabras y haz lo que necesites con ellas
        foreach ($palabras as $palabra) {
            $palabra = trim($palabra);
            $palabra= strtolower($palabra);
            if (isset($conteoPalabras[$palabra])) {
                $conteoPalabras[$palabra]++;
            } else {
                $conteoPalabras[$palabra] = 1;
            }
        }

        // Muestro la cadena resultante
        $cadena = '';
        foreach ($conteoPalabras as $palabra => $conteo) {
            $cadena .= $palabra . $conteo;    
        }

        echo $cadena;

    } else {
        echo "No se pudo abrir el archivo.";
    }

?>