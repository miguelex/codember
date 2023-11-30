const fs = require("fs");

const archivo = "files_quarantine.txt";
const files_ok = [];

fs.readFile(archivo, "utf8", (err, data) => {
  if (err) {
    console.error("No se pudo abrir el archivo.", err);
    return;
  }

  const lineas = data.split("\n");

  lineas.forEach((linea) => {
    // Separamos cada parte de la línea para luego obtener los datos
    const split_str = linea.split("-");

    // Vamos a recorrer split_str[0] buscando solo aquellos caracteres alfabéticos que estén una única vez.
    // Si solo aparece una vez, lo insertamos en una cadena.
    // Una vez recorrido todo split_str[0], compararemos la cadena resultante con split_str[1].
    // Si el resultado es true, insertaremos split_str[1] en files_ok y leeremos la siguiente línea.
    let cadena = "";
    for (let i = 0; i < split_str[0].length; i++) {
      const caracter = split_str[0][i];
      if (split_str[0].split(caracter).length - 1 === 1) {
        cadena += caracter;
      }
    }

    // Ahora comparamos cadena con split_str[1].
    // Si el resultado es true (son iguales), la insertamos en files_ok.
    if (cadena.trim() === split_str[1].trim()) {
      files_ok.push(split_str[1]);
    }
  });

  // Imprimimos el resultado
  files_ok.forEach((value, key) => {
    console.log(key + 1 + " - " + value);
  });
});
