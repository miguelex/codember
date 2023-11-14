cadena = "&###@&*&###@@##@##&######@@#####@#@#@#@##@@@@@@@@@@@@@@@*&&@@@@@@@@@####@@@@@@@@@#########&#&##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@##@@&"
clave = 0
resultado = ""

for literal in cadena:
    if(literal =="#"): clave += 1 
    elif (literal == "@"): clave -=1 
    elif (literal == "*"): clave *= clave
    else: 
        resultado = resultado + str(clave)
        print (resultado)
